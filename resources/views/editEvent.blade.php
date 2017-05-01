
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
	<!-- <script src="js/jquery-2.1.3.min.js" type="text/javascript"></script> -->
	<!-- //js -->
	<!-- <link href="css/style.css" rel="stylesheet" type="text/css" media="all" /> -->

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="{{ asset('css/style.css') }}"></head>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-clockpicker.min.css') }}">

	<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/themes/redmond/jquery-ui.css">
	<link rel="stylesheet" href="http://jqueryui.com/resources/demos/style.css">

	<body>
		<nav class="navbar navbar-default ">
			<a class="navbar-brand " href="{{URL('/')}}">Eventak</a>
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

				<div class="agileits_main_grid w3_agileits_main_grid">
					<h1 class="w3layouts_head">Edit Your Amazing Event</h1>

					<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
						<div class="wthree_grid">
							<label for="name">Name * </label>
							<input id="name" type="text" name="title" value="{{$event->title}}">
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
									<select class="form-control" id="location" name="location" required="">
										@foreach($locations as $location)
										@if($event->location_id == $location->id)
										<option value="{{$location->id}}" selected> 
											{{$location->title}}
										</option>
										@else
										<option value="{{$location->id}}"> 
											{{$location->title}}
										</option>
										@endif
										@endforeach
									</select>
								</div>
							</div>
						</div>
						<div class="col-md-6 pr-0">
							<div class="agileits_main_grid w3_agileits_main_grid">
								<div class="wthree_grid">
									<label for="category">Category * </label>
									<select id="category" class="form-control" name="category" required="">
										@foreach($categories as $category)
										@if($event->category_id == $category->id)
										<option value="{{$category->id}}" selected>
											{{$category->name}}
										</option>
										@else
										<option value="{{$category->id}}">
											{{$category->name}}
										</option>
										@endif
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
										<input type="text" id="start_time" class="form-control" name="start_time" value="{{$event->start_time}}">
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
										<input type="text" id="end_time" class="form-control" name="end_time" value="{{$event->end_time}}">
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
								<textarea id="description" class="form-control" rows="10" cols="70" name="description">{{$event->description}}</textarea>
								
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
									<input id="date" class="form-control" name="date" value="{{$event->date}}">
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
									<input id="end_date" class="form-control" name="end_date" value="{{$event->end_date}}">
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


						<div class="wthree_grid">
							<div>
								<label for="image">Event Cover Photo * </label>
								<input type="file" id="image" class="form-control" name="image" >
							</div>
							
							<div class="w3_main_grid">

								<div class="w3_main_grid_right">
									<input type="submit" name="cancel" value="cancel" style="margin-left: 20px;">
								</div>
								
								<div class="w3_main_grid_right">
									<input type="submit" name="save" value="save" >
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