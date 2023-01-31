function stateUpdateUser(id){
    var status = document.getElementById('userStatus-'+id).value;
    $.ajax({
        url: base_url+"/admin/updateStatus",
        type: 'POST',
        data: {
            _token: csrf,
            id: id,
            status:status
        },
        success: function(response) {
            if (response.status == 'success') {
                status == 1 ? 
                    $('#userStatus-'+id).css('color', '#23ad44') : 
                    $('#userStatus-'+id).css('color', '#f62d51');
                Swal.fire(
                    'User Status',
                    status == 1 ?'Now User Status Active.': 'Now User Status In Active.',
                    'success'
                )
                
            } else {
                alert('An error occurred. Please try again.');
            }
        }
    });
}
        
function deleteUser(id) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You want to Delete this User?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url:  base_url+"/admin/users/"+id,
                type: 'DELETE',
                data: {
                    _token: csrf,
                },
                success: function(response) {
                    if (response.status == 'success') {
                        Swal.fire(
                            'Deleted!',
                            'User has been deleted.',
                            'success'
                        ).then((resultData) => {
                            if (resultData.isConfirmed) {
                                location.reload(true);
                            }
                        });
                        $('#user-'+id).remove();
                    } else {
                        Swal.fire(
                            'Error!',
                            'An error occurred. Please try again.',
                            'error'
                        )
                    }
                }
            });
        }
    });
}

function deletePost(id) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You want to Delete this User?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url:  base_url+"/fitness-posts/"+id,
                type: 'DELETE',
                data: {
                    _token: csrf,
                },
                success: function(response) {
                    if (response.status == 'success') {
                        Swal.fire(
                            'Deleted!',
                            'User has been deleted.',
                            'success'
                        ).then((resultData) => {
                            if (resultData.isConfirmed) {
                                location.reload(true);
                            }
                        });
                        $('#user-'+id).remove();
                    } else {
                        Swal.fire(
                            'Error!',
                            'An error occurred. Please try again.',
                            'error'
                        )
                    }
                }
            });
        }
    });
}

function deleteWorkout(id) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You want to Delete this User?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url:  base_url+"/guided-workouts/"+id,
                type: 'DELETE',
                data: {
                    _token: csrf,
                },
                success: function(response) {
                    if (response.status == 'success') {
                        Swal.fire(
                            'Deleted!',
                            'User has been deleted.',
                            'success'
                        ).then((resultData) => {
                            if (resultData.isConfirmed) {
                                location.reload(true);
                            }
                        });
                        $('#user-'+id).remove();
                    } else {
                        Swal.fire(
                            'Error!',
                            'An error occurred. Please try again.',
                            'error'
                        )
                    }
                }
            });
        }
    });
}

function deleteExercise(id) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You want to Delete this User?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url:  base_url+"/exerciseDelete/"+id,
                type: 'DELETE',
                data: {
                    _token: csrf,
                },
                success: function(response) {
                    if (response.status == 'success') {
                        Swal.fire(
                            'Deleted!',
                            'User has been deleted.',
                            'success'
                        ).then((resultData) => {
                            if (resultData.isConfirmed) {
                                location.reload(true);
                            }
                        });
                        $('#user-'+id).remove();
                    } else {
                        Swal.fire(
                            'Error!',
                            'An error occurred. Please try again.',
                            'error'
                        )
                    }
                }
            });
        }
    });
}


function deleteExerciseSeconds(id) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You want to Delete this User?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url:  base_url+"/secondsDelete/"+id,
                type: 'DELETE',
                data: {
                    _token: csrf,
                },
                success: function(response) {
                    if (response.status == 'success') {
                        Swal.fire(
                            'Deleted!',
                            'User has been deleted.',
                            'success'
                        ).then((resultData) => {
                            if (resultData.isConfirmed) {
                                location.reload(true);
                            }
                        });
                        $('#user-'+id).remove();
                    } else {
                        Swal.fire(
                            'Error!',
                            'An error occurred. Please try again.',
                            'error'
                        )
                    }
                }
            });
        }
    });
}

function deleteEquipment(id) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You want to Delete this Equipment?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url:  base_url+"/equipment/"+id,
                type: 'DELETE',
                data: {
                    _token: csrf,
                },
                success: function(response) {
                    if (response.status == 'success') {
                        Swal.fire(
                            'Deleted!',
                            'Equipment has been deleted.',
                            'success'
                        ).then((resultData) => {
                            if (resultData.isConfirmed) {
                                location.reload(true);
                            }
                        });
                        // $('#user-'+id).remove();
                    } else {
                        Swal.fire(
                            'Error!',
                            'An error occurred. Please try again.',
                            'error'
                        )
                    }
                }
            });
        }
    });
}


function deleteWorkoutPlans(id) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You want to Delete this Data?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url:  base_url+"/workoutPlans/"+id,
                type: 'DELETE',
                data: {
                    _token: csrf,
                },
                success: function(response) {
                    if (response.status == 'success') {
                        Swal.fire(
                            'Deleted!',
                            'User has been deleted.',
                            'success'
                        ).then((resultData) => {
                            if (resultData.isConfirmed) {
                                location.reload(true);
                            }
                        });
                        $('#user-'+id).remove();
                    } else {
                        Swal.fire(
                            'Error!',
                            'An error occurred. Please try again.',
                            'error'
                        )
                    }
                }
            });
        }
    });
}

function deleteChallenges(id) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You want to Delete this Data?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url:  base_url+"/challenges/"+id,
                type: 'DELETE',
                data: {
                    _token: csrf,
                },
                success: function(response) {
                    if (response.status == 'success') {
                        Swal.fire(
                            'Deleted!',
                            'User has been deleted.',
                            'success'
                        ).then((resultData) => {
                            if (resultData.isConfirmed) {
                                location.reload(true);
                            }
                        });
                        $('#user-'+id).remove();
                    } else {
                        Swal.fire(
                            'Error!',
                            'An error occurred. Please try again.',
                            'error'
                        )
                    }
                }
            });
        }
    });
}

function exerciseIdAppend(id){
    $("input[name='excercise_id']").val(id);
}
function exerciseSecondsEdit(id){
   
    $.ajax({
        url:  base_url+"/exercise/secondsEdit/"+id,
        type: 'POST',
        data: {
            _token: csrf,
        },
        success: function(response) {
            var data = JSON.parse(response)
            // console.log(data);
            $("#updateModal input[name='excercise_id']").val(data.excercise_id);
            $("#updateModal input[name='value']").val(data.value);
            $("#updateModal input[name='rest_value']").val(data.rest_value);
        }
    });
}
function secondsUpdate(){
    var data = $("#updateExerciseData").serializeArray();
    // data.preventDefault();
    // console.log(data);
    $.ajax({
        url: '/exercise/secondsUpdate/' + data[1].value,
        type: 'PUT',
        data: data,
        success: function(result) {
            console.log(result);
            location.reload(true);
        }
    });
    return false;
}

//days count

var countDays = 2;
function daysCount(multiDrop){
    console.log($(".workoutPlan_box").children(),$(".workoutPlan_box").children().length);
    countDays = $(".workoutPlan_box").children().length + 1;
    var dayval = countDays ++;
    var daysData = '';
    var daysData = `<div class="row"><label class="col-form-label col-md-2">Day ${dayval}</label><div class="col-md-10 inputBox mb-2"><input type="text" name="days-${dayval}" class="form-control" value="${dayval}"><label class="col-form-label col-md-6">Select Excercise List</label><div class="col-md-12"><select class="workoutPlans_dropdown-${dayval} form-control" name="exercise_list-${dayval}">`;
    for (let i = 0; i < multiDrop.length; i++) {
        daysData += `<option value=${multiDrop[i]['id']}>${multiDrop[i]['title']}</option>`
    }
    daysData += `</select></div></div></div>`
    // console.log(daysData);
    $(".workoutPlan_box").append(daysData);
    $(`.workoutPlans_dropdown-${dayval}`).CreateMultiCheckBox({ defaultText : 'Select Below' });
  return false;
}


//workout select dropdown
$(document).ready(function () {
    // console.log($(".equipments_dropdown"));
    if($(".equipments_dropdown").length)
        $(".equipments_dropdown").CreateMultiCheckBox({ defaultText : 'Select Below' });
    if($(".workoutPlans_dropdown").length)
        $(".workoutPlans_dropdown").CreateMultiCheckBox({ defaultText : 'Select Below' });
});
$(document).ready(function () {
    $(document).on("click", ".MultiCheckBox", function () {
        var detail = $(this).next();
        detail.show();
    });

    $(document).on("click", ".MultiCheckBoxDetailHeader input", function (e) {
        e.stopPropagation();
        var hc = $(this).prop("checked");
        $(this).closest(".MultiCheckBoxDetail").find(".MultiCheckBoxDetailBody input").prop("checked", hc);
        $(this).closest(".MultiCheckBoxDetail").next().UpdateSelect();
    });

    $(document).on("click", ".MultiCheckBoxDetailHeader", function (e) {
        var inp = $(this).find("input");
        var chk = inp.prop("checked");
        inp.prop("checked", !chk);
        $(this).closest(".MultiCheckBoxDetail").find(".MultiCheckBoxDetailBody input").prop("checked", !chk);
        $(this).closest(".MultiCheckBoxDetail").next().UpdateSelect();
    });

    $(document).on("click", ".MultiCheckBoxDetail .cont input", function (e) {
        e.stopPropagation();
        $(this).closest(".MultiCheckBoxDetail").next().UpdateSelect();

        var val = ($(".MultiCheckBoxDetailBody input:checked").length == $(".MultiCheckBoxDetailBody input").length)
        $(".MultiCheckBoxDetailHeader input").prop("checked", val);
    });

    $(document).on("click", ".MultiCheckBoxDetail .cont", function (e) {
        var inp = $(this).find("input");
        var chk = inp.prop("checked");
        inp.prop("checked", !chk);

        var multiCheckBoxDetail = $(this).closest(".MultiCheckBoxDetail");
        var multiCheckBoxDetailBody = $(this).closest(".MultiCheckBoxDetailBody");
        multiCheckBoxDetail.next().UpdateSelect();

        var val = ($(".MultiCheckBoxDetailBody input:checked").length == $(".MultiCheckBoxDetailBody input").length)
        $(".MultiCheckBoxDetailHeader input").prop("checked", val);
    });

    $(document).mouseup(function (e) {
        var container = $(".MultiCheckBoxDetail");
        if (!container.is(e.target) && container.has(e.target).length === 0) {
            container.hide();
        }
    });
});

var defaultMultiCheckBoxOption = { defaultText: 'Select Below'};

jQuery.fn.extend({
    CreateMultiCheckBox: function (options) {

        var localOption = {};
        localOption.width = (options != null && options.width != null && options.width != undefined) ? options.width : defaultMultiCheckBoxOption.width;
        localOption.defaultText = (options != null && options.defaultText != null && options.defaultText != undefined) ? options.defaultText : defaultMultiCheckBoxOption.defaultText;
        localOption.height = (options != null && options.height != null && options.height != undefined) ? options.height : defaultMultiCheckBoxOption.height;

        this.hide();
        this.attr("multiple", "multiple");
        var divSel = $("<div class='MultiCheckBox'>" + localOption.defaultText + "<span class='k-icon k-i-arrow-60-down'><svg aria-hidden='true' focusable='false' data-prefix='fas' data-icon='sort-down' role='img' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 320 512' class='svg-inline--fa fa-sort-down fa-w-10 fa-2x'><path fill='currentColor' d='M41 288h238c21.4 0 32.1 25.9 17 41L177 448c-9.4 9.4-24.6 9.4-33.9 0L24 329c-15.1-15.1-4.4-41 17-41z' class=''></path></svg></span></div>").insertBefore(this);
        divSel.css({ "width": localOption.width });

        var detail = $("<div class='MultiCheckBoxDetail'><div class='MultiCheckBoxDetailHeader'><input type='checkbox' class='mulinput' value='-1982' /><div>Select All</div></div><div class='MultiCheckBoxDetailBody'></div></div>").insertAfter(divSel);
        detail.css({ "width": parseInt(options.width) + 10, "max-height": localOption.height });
        var multiCheckBoxDetailBody = detail.find(".MultiCheckBoxDetailBody");

        this.find("option").each(function () {
            var val = $(this).attr("value");
            var select = $(this).attr("selected");

            if (val == undefined)
                val = '';
                
            multiCheckBoxDetailBody.append(`<div class='cont'><div><input type='checkbox' class='mulinput'  value=${val} ${select === 'selected' ? 'checked' :''} /></div><div>${$(this).text()}</div></div>`);
        });

        multiCheckBoxDetailBody.css("max-height", (parseInt($(".MultiCheckBoxDetail").css("max-height")) - 28) + "px");
    },
    UpdateSelect: function () {
        var arr = [];

        this.prev().find(".mulinput:checked").each(function () {
            arr.push($(this).val());
        });

        this.val(arr);
    },
});

//addWorkoutPlans
function addWorkoutPlans(action,id){
    var formData = new FormData();
    var workoutdata = $("#editWorkoutPlans").serializeArray();

    var fileInput = document.querySelector('input[name="upload_url"]');
    formData.append('upload_url', fileInput.files[0]);

    console.log(fileInput);
    
    var days = []; 
    var exercise_list = [];
    var equipment = '';

    var orignalData = workoutdata.filter(elm =>{
        if(elm.name.includes('exercise_list'))
            exercise_list.push(elm)
        if(elm.name.includes('days'))
            days.push(elm)
        if(elm.name.includes('equipment'))
            equipment += (elm.value+',')
        if(elm.name.includes('exercise_list') || elm.name.includes('days') || elm.name.includes('equipment')){
        }else{
            return elm
        }
    });
    
    equipment = equipment.slice(0, -1);
    orignalData.push({name:'days',value:JSON.stringify(days)});
    orignalData.push({name:'exercise_list',value:JSON.stringify(exercise_list)});
    orignalData.push({name:'equipment',value:equipment});
    orignalData.forEach(el => {
        formData.append(el.name, el.value);
    });
    
    var url = action === 'add' ? base_url+"/workoutPlans/insert": base_url+"/workoutPlans/"+id
    
    var _token = $("#editWorkoutPlans input[name='_token']").val() || $("#addWorkoutPlans input[name='_token']").val()


    $.ajax({
        headers: {
            'X-CSRF-TOKEN': _token,
        },
        url: url,
        type: "POST",
        data: formData,
        contentType: false,
        processData:false,
        cache: false,
        success: function(result) {
            const data = parseInt(result);
            if(data){
                window.location.href = '/workoutPlans'
            }
        }
    });

    return false;
    // console.log(orignalData);
}

function editDaysExercise(data,exerciseData){
    console.log(data,exerciseData);

    var html = '';
    
    data.forEach(elm => {
        html += `<div class="row"><label class="col-form-label col-md-2">Day ${elm.day}</label>
            <div class="col-md-10 inputBox mb-2">
                <input type="text" name="days-${elm.day}" class="form-control" value="${elm.day}">
                <label class="col-form-label col-md-6">Select Excercise List</label>
                <div class="col-md-12">
                    <select class="multi workoutPlans_dropdown-${elm.day}" class="form-control" name="exercise_list-${elm.day}">`;

        exerciseData.forEach(el => {
            html += `<option value="${el.id}">${el.title}</option>`;
        });
        // elm.exercise_list.forEach(el => {
        //     html += `<option value="${el.id}" selected>${el.title}</option>`;
        // });
        html += `</select>
        </div>
        </div></div>`;
    });

    $(".workoutPlan_box").html(html);

    data.forEach(function(el){
        el.exercise_list.forEach(e => {
            $(`.workoutPlans_dropdown-${el.day}`).each(function(){
                $(this).children().each(function(i,elm){
                    if(parseInt(elm.value) === e.id){
                        elm.setAttribute("selected",true)
                    }
                })
            })
        })
    });

    
    $(`.multi`).each(function(){
        $(this).CreateMultiCheckBox({ defaultText : 'Select Below' })
    })
    
    
}

function equipmentDrop (equipment) {
    console.log(equipment);

    for (let i = 0; i < equipment.length; i++) {
        $(`.equipments_dropdown1`).each(function(){
            $(this).children().each(function(i,elm){
                console.log(elm.innerText,equipment[i]);
                if(elm.innerText === equipment[i]){
                    elm.setAttribute("selected",true)
                }
            })
        })
    }
    // equipments_dropdown
    $('.equipments_dropdown1').CreateMultiCheckBox({ defaultText : 'Select Below' })
}