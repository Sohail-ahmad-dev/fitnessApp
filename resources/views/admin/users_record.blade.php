<style>
	.profile_img{
		width:30px;
		border-radius: 100%;
	}
</style>
@extends('admin/layouts/default')

@section('title', 'Admin ')
        <!-- Main Slider -->
@section('content')
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="crms-title row bg-white mb-4">
                		<div class="col  p-0">
                			<h3 class="page-title">
			                <span class="page-title-icon bg-gradient-primary text-white me-2">
			                  <i class="la la-table"></i>
			                </span> Basic Tables</h3>
                		</div>
                		<div class="col p-0 text-end">
                			<ul class="breadcrumb bg-white float-end m-0 ps-0 pe-0">
								<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
								<li class="breadcrumb-item active">Basic Tables</li>
							</ul>
                		</div>
                	</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-lg-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title mb-0">Users Record</h4>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-striped mb-0">
											<thead>
												<tr>
													<th>Image</th>
													<th>First Name</th>
													<th>Last Name</th>
													<th>Email</th>
													<th>Address</th>
													<th>Phone Number</th>
													<th>Status</th>
												</tr>
											</thead>
											<tbody>
												@if (!empty($users))
													@foreach($users as $user)
													<tr>
														<td>
															<img class="profile_img" src="{{ !empty (asset('upload/images/'. $user->image)) ? asset('upload/images/'. $user->image) :  "N/A"}}" alt="{{ $user->first_name}}">
														</td>
														<td>
															{{!empty($user->first_name)? $user->first_name : "N/A"}}
														</td>
														<td>
															{{!empty($user->last_name) ? $user->last_name : "N/A" }}
														</td>
														<td>
															{{!empty($user->email) ? $user->email : "N/A"}}
														</td>
														<td>
															{{!empty($user->address) ? $user->address : "N/A"}}
														</td>
														<td>
															{{!empty($user->phone_number) ? $user->phone_number : "N/A"}}
														</td>
														<td>
															<select class="form-control {{ $user->status == '1' ? 'text-success' : 'text-danger' }}" id="status-{{ $user->id }}" onchange="updateStatus({{ $user->id }})">
																<option value="1" {{ $user->status == '1' ? 'selected' : '' }}>Active</option>
																<option value="0" {{ $user->status == '0' ? 'selected' : '' }}>In Active</option>
															</select>
														</td>
													</tr>
													@endforeach
												@endif
												
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				
				</div>			
			
@endsection
<script>
	setTimeout(() => {
		function updateStatus(id) {
			alert(123)
			var status = document.getElementById('status-'+id).value;
			$.ajax({
				url: "{{ route('admin.users.updateStatus') }}",
				type: 'POST',
				data: {
					_token: "{{ csrf_token() }}",
					id: id,
					status: status
				},
				success: function(response) {
					if (response.status == 'success') {
						alert('User status updated successfully!');
					} else {
						alert('An error occurred. Please try again.');
					}
				}
			});
		}
	}, 1500);
</script>