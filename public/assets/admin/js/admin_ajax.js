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
    var dayval = countDays ++;
    var daysData = '';
    var daysData = `<div class="row"><label class="col-form-label col-md-2">Day ${dayval}</label><div class="col-md-10 inputBox mb-2"><input type="text" name="days-${dayval}" class="form-control" value="${dayval}"><label class="col-form-label col-md-6">Select Excercise List</label><div class="col-md-12"><select class="workoutPlans_dropdown-${dayval} form-control" name="">`;
    for (let i = 0; i < multiDrop.length; i++) {
        daysData += `<option value=${multiDrop[i]['id']}>${multiDrop[i]['title']}</option>`
    }
    daysData += `</select></div></div></div>`
    console.log(daysData);
    $(".workoutPlan_box").append(daysData);
    $(`.workoutPlans_dropdown-${dayval}`).CreateMultiCheckBox({ defaultText : 'Select Below' });
  return false;
}


//workout select dropdown
$(document).ready(function () {
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

            if (val == undefined)
                val = '';

            multiCheckBoxDetailBody.append("<div class='cont'><div><input type='checkbox' class='mulinput' value='" + val + "' /></div><div>" + $(this).text() + "</div></div>");
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
function addWorkoutPlans(){
    var workoutdata = $("#addWorkoutPlans").serializeArray();
    console.log(workoutdata);
    return false;
}