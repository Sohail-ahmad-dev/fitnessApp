<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Crypt;
use App\Models\User;
use Hash;
use Session;
use Illuminate\Support\Facades\Auth;

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
        if(Auth::check())
        {
            return view('auth.user_profile');
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
    
}

