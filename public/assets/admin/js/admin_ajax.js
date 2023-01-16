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