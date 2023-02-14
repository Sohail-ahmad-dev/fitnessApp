<?php

namespace App\Http\Controllers;

use App\Models\Challenges;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Crypt;
use App\Models\User;
use App\Models\Workout_Plans;
use Hash;
use Session;
use Illuminate\Support\Facades\Auth;
use App\Models\Equipment;
use App\Models\Exercise;
use App\Models\JoinChallenge;
use App\Models\Activity_calendar;

class UserController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6'
        ]);
        if ($validator->fails()) {
            return redirect('/register')
                ->withErrors($validator)
                ->withInput();
        }

        $data = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'password_save' => Crypt::encrypt($request->password),
            'role' => '0',
            'status' => '1'
        ];
   
        $user = User::insert($data);
        return redirect('login')->with('success', 'Registration Completed, now you can login');
      
      
    }
    public function login()
    {
            return view('auth.login');
    }
    public function validate_login(Request $request)
    {
        $request->validate([
            'email' =>  'required',
            'password'  =>  'required'
        ]);
        $credentials = $request->only('email', 'password');
        
        $users = User::where('email',$request->email)->first();
        
            if(Auth::attempt($credentials))
            {
                if(!empty($users) && $users->role == '1'){
                    return redirect('admin/dashboard');
                }
                
                if(!empty($users) && $users->role == '0' && $users->status == '1'){
                    return redirect('dashboard');
                }
            }
        return redirect('login')->with('success', 'Login details are not valid');

    }

    public function dashboard()
    {
        return view('home.index');
    }
    public function inbox()
    {
        if(Auth::check())
        {
            return view('inbox.index');
        }

        return redirect('login')->with('success', 'you are not allowed to access');
    }
    public function logout()
    {
        Session::flush();

        Auth::logout();

        return Redirect('login');
    }
    public function edit(){
        if(Auth::check()){
            $item = User::find(Auth::id());
            $item['password_save'] = Crypt::decrypt($item->password_save);
            return view('auth.userProfile_update',compact('item'));
        }
        return redirect('login')->with('success', 'Login details are not valid');
    }
    public function update(Request $request){
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'password' => 'min:6|required'
        ]);
        $item = User::find(Auth::id());
        $data = $request->all();
        if(Crypt::decrypt($item->password_save) !== $data['password']){
            $data['password'] = Hash::make( $data['password']);
            $data['password_save'] = Crypt::encrypt($data['password']);
        }else{
            $data['password_save'] = $item->password_save;
            $data['password'] = $item->password;
        }
        
        
        if (!$request->hasFile('image')) {
            $data['image'] = $item->image;
        } else {
            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move(public_path('upload/images'), $image_name);
            $data['image'] = $image_name;
        }
        
       
        
        $user = Auth::user();
        $user->update($data);
        $user->save();
    
        return redirect('dashboard');
    }

    // Workout Start
    public function workout()
    {
        $workouts = [];
        $createdData = [];

        $categories = Workout_Plans::select('category')->whereHas('user', function ($query) {
            $query->where('role', 1);
        })->get();
        
        $createdData = Workout_Plans::where('user_id',Auth::id())->get()->toArray();

        $categories = !empty($categories) ? $categories->toArray(): [];

        $categories = array_unique(array_map(function ($i) { return $i['category']; }, $categories));
        
        if(count($categories) > 0){

            foreach ($categories as $val) {

                $data = Workout_Plans::where('category',$val)->whereHas('user', function ($query) {
                    $query->where('role', 1);
                })->get();
                $data = !empty($data) ? $data->toArray(): [];
                array_push($workouts,[
                    'category' => $val,
                    'data' => $data,
                ]);
                
            }

        }

        // dd($data);
        return view('workout.index',compact('workouts','createdData'));
    }

    public function workoutDetail($id,$name=null)
    {
        $data = Workout_Plans::find($id)->toArray();

        $days = json_decode($data['days']);

        $exercise_list = json_decode($data['exercise_list']);
        // echo "<pre>";

        $daysData = [];

        foreach ($days as $ke => $val) {
            
            $exerciseData = [];
            $index = 0;
            $day = 1;
            foreach ($exercise_list as $k => $vl) {
                
                if($vl->name == 'exercise_list-'.$val->value){
                    $index = intval($val->value) - 1;
                    $id = $vl->value;
                    $day = $val->value;

                    $exerciseData[] = Exercise::find($id)->toArray();
                    
                }


            }
            $daysData[$index] = [
                'day' => $val->value,
                'workout_list' => $exerciseData,
            ];
            // dd($exerciseData);
            
        }
        
        // dd($daysData);

        return view('workout.workoutDetail', compact('data','daysData'));
    }

    public function workoutCreate()
    {
        $exerciseData = Exercise::all();
        $equipment = Equipment::all();
        return view('workout.form', compact('exerciseData','equipment'));
    }
    public function workoutCalendar($id)
    {
        $data = Workout_Plans::find($id)->toArray();
        // dd($data);
        return view('workout.calendar', compact('data'));
    }
    public function workoutInsert(Request $req){

        $start_date = $req->start_date;
        $end_date = $req->end_date;

        $existOrNot =
        Activity_calendar::where('workout_id','=',$req->id)->first();
        // dd($existOrNot);
        if(!empty($existOrNot)){

            $existOrNot->workout_id = $req->id;
            $existOrNot->calendar_date = $req->start_date;
            $existOrNot->end_date = $req->end_date;
            $resp = $existOrNot->save();

        }else{

            $resp = Activity_calendar::insert([
                'calendar_date' => $req->start_date,
                'end_date' => $req->end_date,
                'workout_id' => $req->id
            ]);

        }
        
        return redirect()->route('user.calendar');
    }

    // Workout End


    // challenges Start
    public function challenges()
    {
        $joined = [];
        $challenges = [];

        $joinedData = JoinChallenge::where("user_id",Auth::id())->get()->toArray();

        if(!empty($joinedData) && count($joinedData) > 0){

            foreach ($joinedData as $k => $val) {

                $challenges = Challenges::where('id','<>',$val['challenge_id'])->get();

                $joined = Challenges::where('id',$val['challenge_id'])->get();

            }

        }else{
            $challenges = Challenges::all();
        }

        // dd($joined,$challenges);
        
        return view('challenges.index',compact('challenges','joined'));
    }
    public function challengesDetail($id,$name=null)
    {
        $challenges = Challenges::find($id)->toArray();
        $participants = JoinChallenge::where("challenge_id",$id)->count();

        $leaveId = JoinChallenge::where([
            "challenge_id" => $id,
            "user_id" => Auth::id()
        ])->first();
            // dd($leaveId);

        $join = JoinChallenge::where("challenge_id",$id)->where("user_id",Auth::id())->first();
        if(!empty($join)){
            $join = 'Joined';
        }

        return view('challenges.detail',compact('challenges','participants','join','leaveId'));
    }

    public function challengeJoin(Request $req)
    {
        // dd($req->all());
        $data = JoinChallenge::insert([
            'challenge_id' => $req->challenge_id,
            'user_id' => $req->user_id,
        ]);
        return redirect()->back();
    }

    public function challengeLeave(Request $req)
    {
        $id = $req->id;
        $exercise = JoinChallenge::findOrFail($id);
        $exercise->delete();

        return redirect()->route('user.challenges');
    }
    // challenges End

    // Exercise List Start

    public function exercise()
    {
        $exercises = Exercise::all()->toArray();
        // dd($exercises);
        return view('exercise.index', compact('exercises'));
    }

    public function exerciseToday(Request $request)
    {
        $exercise_id = $request->exercise_id;
        $ids = explode(',',$exercise_id);
        $ids = json_encode($ids);
        $resp = '0';
        $date = !empty(Session::get('calendarDate')) ? Session::get('calendarDate') : date('Y-m-d');

        $existOrNot = Activity_calendar::whereDate('calendar_date','=',$date)->first();

        if(!empty($existOrNot)){

            $existOrNot->activity_id = $ids;
            $resp = $existOrNot->save();

        }else{

            $resp = Activity_calendar::insert([
                'calendar_date' => $date,
                'activity_id' => $ids
            ]);

            Session::forget('calendarDate');

        }

        echo $resp;
        // dd($resp);
    }

    public function todayActivity(Request $request)
    {
        $exercises = [];
        $date = date('Y-m-d');

        $activityCalendar = Activity_calendar::whereDate('calendar_date',
        $date)->pluck('activity_id')->toArray();

        $ids = array_reduce($activityCalendar, function ($carry, $item) {
        return array_merge($carry, json_decode($item));
        }, []);

        $exercises = Exercise::whereIn('id', $ids)->get()->toArray();

        
        return view('exercise.todaysExercise',compact('exercises'));
    }
    
    // Exercise List End

    // Activity Calendar Start

    public function calendar()
    {
        $data = [];
        $activityCalendar = Activity_calendar::whereDate('calendar_date','=',
        date('Y-m-d'))->where('activity_id','!=', null)->get()->toArray();

        $workoutCalendar = Activity_calendar::whereDate('calendar_date', '<=',date('Y-m-d'))->whereDate('end_date','>=', date('Y-m-d'))->where('workout_id','!=', null)->get()->toArray();

        if(!empty($workoutCalendar)){
            $workoutPlan = Workout_Plans::where('id',$workoutCalendar[0]['workout_id'])->get()->toArray();
            $data['workoutPlan'] = !empty($workoutPlan[0]) ? $workoutPlan[0] : [];
            $data['workoutPlanId'] = !empty($workoutPlan[0]) ? $workoutCalendar[0]['id'] : '';
        }
        
        
        if(!empty($activityCalendar)){
            $data['calendar'] = $activityCalendar[0]['id'];
        }

        $ids = array_reduce($activityCalendar, function ($carry, $item) {
            return array_merge($carry, json_decode($item['activity_id']));
        }, []);

        $data['exercises'] = Exercise::whereIn('id', $ids)->get()->toArray();
        // dd($data);

        return view('calendar.index',compact('data'));
    }
    public function calendarActivity(Request $request)
    {

        $data = [];
        $activityCalendar = Activity_calendar::whereDate('calendar_date','=',$request->date)->where('activity_id','!=', null)->get()->toArray();

        $workoutCalendar = Activity_calendar::whereDate('calendar_date', '<=',$request->date)->whereDate('end_date','>=',$request->date)->where('workout_id','!=', null)->get()->toArray();

        if(!empty($workoutCalendar)){
            $workoutPlan = Workout_Plans::where('id',$workoutCalendar[0]['workout_id'])->get()->toArray();

            $data['workoutPlan'] = !empty($workoutPlan[0]) ? $workoutPlan[0] : [];
            $data['workoutPlanId'] = !empty($workoutPlan[0]) ? $workoutCalendar[0]['id'] : '';
        }


        if(!empty($activityCalendar)){
            $data['calendar'] = $activityCalendar[0]['id'];
        }

        $ids = array_reduce($activityCalendar, function ($carry, $item) {
            return array_merge($carry, json_decode($item['activity_id']));
        }, []);

        $data['exercises'] = Exercise::whereIn('id', $ids)->get()->toArray();
        // dd($workoutCalendar);

        // dd($data);

        // dd($exercises);

        echo json_encode($data);
        exit;

    }
    public function calendarDestroy(Request $req)
    {
        $id = $req->id;
        $activityCalendar = Activity_calendar::findOrFail($id);
        $activityCalendar->delete();
    
        return redirect()->route('user.calendar');
    }

    public function calendarDateAssign(Request $request)
    {
        Session::put('calendarDate',$request->calendarDate);
    }
    public function workoutDestroy(Request $request)
    {
        $id = $req->id;
        $workout_Plans = Workout_Plans::findOrFail($id);
        $workout_Plans->delete();

        return redirect()->route('user.calendar');
    }
    // Activity Calendar End
    
}
