
<!DOCTYPE html>
<html>
<head>
	<title>Amazing Event</title>
	<style type="text/css">
		ul li:hover > ul{display:block;}
		.pl-0 {
			padding-left: 0!important;
		}
		.pr-0 {
			padding-right: 0!important;
		}
	</style>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="{{ asset('css/style.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-clockpicker.min.css') }}">
	<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/themes/redmond/jquery-ui.css">
	<link rel="stylesheet" href="http://jqueryui.com/resources/demos/style.css">
</head>
<body>
	<nav class="navbar navbar-default ">
		<a class="navbar-brand " href="{{URL('/')}}" style="color:#00004d;font-weight: bold;">Eventak</a>

		@if (!(Auth::guest()) && (!Auth::guard('admin')->check()))
		<ul class="nav navbar-nav">

			<li class="dropdown active">
				<a href="" style="color:#00004d ;font-weight: bold;">{{Auth::user()->name}}'s Profile

					<b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a  href="{{URL('userprofile')}}">My Profile</a></li>
						<li><a href="{{URL('editProfile')}}">Account Settings</a></li>
						<li>
							<a href="{{ route('logout') }}"
							onclick="event.preventDefault();
							document.getElementById('logout-form').submit();">
							Logout
						</a>
						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							{{ csrf_field() }}
						</form>
					</li>
				</ul>
			</li>
		</ul>

		@elseif (Auth::guard('admin')->check())
		<ul class="nav navbar-nav">

			<li class="dropdown active">
				<a href="" style="color:#00004d ;font-weight: bold;">{{Auth::user()->name}}'s Profile

					<b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a  href="{{URL('dash')}}">My Profile</a></li>
						<li><a href="{{URL('editadminprofile')}}">Account Settings</a></li>
						<li>
							<a href="{{ route('logout') }}"
							onclick="event.preventDefault();
							document.getElementById('logout-form').submit();">
							Logout
						</a>
						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							{{ csrf_field() }}
						</form>
					</li>
				</ul>
			</li>
		</ul>

		@endif
	</nav>

	<div class="main"> <br><br>
		<!-- <h1 class="w3layouts_head">Create Your Amazing Event</h1> -->
		<div class="w3layouts_main_grid">
			<form method="post" class="w3_form_post" enctype="multipart/form-data">
				{{csrf_field()}}

				@if(Auth::guard('web')->check())
				<input type="hidden" name="user_type" value="user">
				@else
				<input type="hidden" name="user_type" value="admin">
				@endif

				<div class="flash-message">
					@foreach (['danger', 'warning', 'success', 'info'] as $msg)
					@if(Session::has('alert-' . $msg))
					<p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>
					@endif
					@endforeach
				</div> 
				<div class="agileits_main_grid w3_agileits_main_grid">
					<h1 class="w3layouts_head">Create Your Amazing Event</h1>

					<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
						<div class="wthree_grid">
							<label for="name">Name * </label>
							<input type="text" name="title" placeholder="Enter Event Name" v-model="post.title" value="{{ old('title') }}">
						</div>
						<br>
						@if ($errors->has('title'))
						<div class="alert alert-danger">
							<strong>{{ $errors->first('title') }}</strong>
						</div>
						@endif

					</div>
				</div>

				<!--hidden till choise other-->
				<!-- <input type="hidden" name="location" placeholder="" required=""> -->
				<div class="row">
					<div class="col-md-12">
						<div class="col-md-6 pl-0">
							<div class="agileits_main_grid w3_agileits_main_grid">
								<div class="wthree_grid">
									<label for="location">Location * </label>
									<select id="location" name="location" v-model="post.location" class="form-control">
										<option disabled selected>Select Event Location</option>
										@foreach($locations as $location)
										<option value="{{$location->id}}" @if(old('location') == $location->id) {{ 'selected' }} @endif> 
											{{$location->title}}
										</option>
										@endforeach
									</select>
								</div>
							</div>
						</div>
						<div class="col-md-6 pr-0">
							<div class="agileits_main_grid w3_agileits_main_grid">
								<div class="wthree_grid">
									<label for="category">Category * </label>
									<select id="category" class="form-control" name="category" v-model="post.category">
										<option disabled selected>Select Event Category</option>
										@foreach($categories as $category)
										<option value="{{$category->id}}" @if(old('category') == $category->id) {{ 'selected' }} @endif>
											{{$category->name}}
										</option>
										@endforeach
									</select>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12">
						<div class="col-md-6 pl-0">

							<div class="form-group{{ $errors->has('start_time') ? ' has-error' : '' }}">
								<div class="wthree_grid">

									<label for="start_time">Start Time * </label>
									<div class="input-group clockpicker">
										<input type="text" id="start_time" class="form-control" name="start_time" value="@if( old('start_time')) {{old('start_time')}} @else 00:00 @endif ">
										<span class="input-group-addon">
											<span class="glyphicon glyphicon-time"></span>
										</span>
									</div>

									<br>
									@if ($errors->has('start_time'))
									<div class="alert alert-danger">
										<strong>{{ $errors->first('start_time') }}</strong>
									</div>
									@endif

									<script src="{{URL::asset('js/jquery.min.js')}}" type="text/javascript"></script>

									<script src="{{URL::asset('js/bootstrap-clockpicker.min.js')}}" type="text/javascript"></script>
									<script type="text/javascript">
										$('.clockpicker').clockpicker()
										.find('input').change(function(){
											console.log(this.value);
										});
										var input = $('#single-input').clockpicker({
											placement: 'bottom',
											align: 'left',
											autoclose: true,
											'default': 'now'
										});
									</script>
								</div>
							</div>
						</div>
						<div class="col-md-6 pr-0">
							<div class="form-group{{ $errors->has('end_time') ? ' has-error' : '' }}">
								<div class="wthree_grid">

									<label for="end_time">End Time * </label>
									<div class="input-group clockpicker">
										<input type="text" id="end_time" class="form-control" name="end_time" value="@if( old('end_time')) {{old('end_time')}} @else 00:00 @endif ">
										<span class="input-group-addon">
											<span class="glyphicon glyphicon-time"></span>
										</span>
									</div>

									<br>
									@if ($errors->has('end_time'))
									<div class="alert alert-danger">
										<strong>{{ $errors->first('end_time') }}</strong>
									</div>
									@endif

									<script src="{{URL::asset('js/jquery.min.js')}}" type="text/javascript"></script>

									<script src="{{URL::asset('js/bootstrap-clockpicker.min.js')}}" type="text/javascript"></script>
									<script type="text/javascript">
										$('.clockpicker').clockpicker()
										.find('input').change(function(){
											console.log(this.value);
										});
										var input = $('#single-input').clockpicker({
											placement: 'bottom',
											align: 'left',
											autoclose: true,
											'default': 'now'
										});
									</script>
								</div>
							</div>
						</div>


						<div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
							<div class="wthree_grid">
								<label for="description">Description * </label>
								<textarea class="form-control" id="description" rows="10" cols="70" name="description" v-model="post.description" placeholder="Add Event Description" >{{ old('description') }}</textarea>
							</div>
							<br>
							@if ($errors->has('description'))
							<div class="alert alert-danger">
								<strong>{{ $errors->first('description') }}</strong>
							</div>
							@endif
						</div>

<div class="row">
		<div class="col-md-12">
			<div class="col-md-6 pl-0">
				<div class="agileits_w3layouts_main_grid w3ls_main_grid">
					<div class="agileinfo_grid">

						<div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
							<div class="wthree_grid">
								<label for="date">Start Date * </label>
								<div>
									<input id="date" class="form-control" name="date" v-model="post.date" value="@if( old('date')) {{ old('date') }} @endif ">
								</div>
							</div>
							<br>
							@if ($errors->has('date'))
							<div class="alert alert-danger">
								<strong>{{ $errors->first('date') }}</strong>
							</div>
							@endif
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6 pr-0">
					<div class="agileits_w3layouts_main_grid w3ls_main_grid">
					<div class="agileinfo_grid">

						<div class="form-group{{ $errors->has('end_date') ? ' has-error' : '' }}">
							<div class="wthree_grid">
								<label for="end_date">End Date * </label>
								<div>
									<input id="end_date" class="form-control" name="end_date" v-model="post.date" value="@if( old('end_date')) {{ old('end_date') }} @endif ">
								</div>
							</div>
							<br>
							@if ($errors->has('end_date'))
							<div class="alert alert-danger">
								<strong>{{ $errors->first('end_date') }}</strong>
							</div>
							@endif
						</div>
					</div>
				</div>
		</div>
		</div>
		</div>


						<div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
							<div class="wthree_grid">
								<div>
									<label for="image">Event Cover Photo * </label>
									<input type="file" id="image" class="form-control" name="image" >
								</div>
							</div>
							<br>
							@if ($errors->has('image'))
							<div class="alert alert-danger">
								<strong>{{ $errors->first('image') }}</strong>
							</div>
							@endif
						</div>

						<div class="w3_main_grid">

							<div class="w3_main_grid_right">
								<input type="submit" name="cancel" value="cancel" style="margin-left: 20px;">
							</div>

							<div class="w3_main_grid_right">
								<input type="submit" name="create" value="create" >
							</div>
						</div>
					</form>
				</div>
			</div>

			<script>
				$( function() {
					$('#date').datepicker({ dateFormat: 'yy-mm-dd' }).val();
				} );
			</script>

			<script>
				$( function() {
					$('#end_date').datepicker({ dateFormat: 'yy-mm-dd' }).val();
				} );
			</script>

		</body>
			<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
			<script src="{{URL::asset('js/jquery-1.10.2.js')}}" type="text/javascript"></script>
 			<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	

		</html>