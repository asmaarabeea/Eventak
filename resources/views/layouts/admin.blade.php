<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="front/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Eventak @if(isset($title))| {{ $title }} @endif</title>
    <!-- Bootstrap core CSS     -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" /> 

    <!-- Animation library for notifications   -->
    <link href="{{ asset('css/animate.min.css') }}" rel="stylesheet"/>

    <link href="{{asset('css/light-bootstrap-dashboard.css')}}" rel="stylesheet"/>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="{{ asset('css/demo.css') }}" rel="stylesheet" />
    
    <!-- <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <!--   <link href="{{asset('/css/pe-icon-7-stroke.css')}}" rel="stylesheet" /> -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <script type="text/javascript" src="{{URL::asset('js/jquery-3.1.1.js')}}">
    </script>

    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
      </script>
</head>
<body>

<div class="wrapper clearfix"> 
    
    <div class="sidebar" style="background: url({{asset('css/images/sidebar-5.jpg')}});">  
    	<div class="sidebar-wrapper">
            <ul class="nav">
                <li>
                     <img class="avatar border-gray" src="{{asset('images/Eventak.png')}}"  style='margin-left: 60px; width:120px; height:120px; border-radius:100% ;'/>
                </li>
                <br>
                <li >
                    <a href="{{URL('/')}}">
                        <i class="fa fa-home" aria-hidden="true"></i>
                        <p>Home</p>
                    </a>
                </li>

                <li >
                    <a href="{{URL('dash')}}">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <p>My dashboard </p>
                    </a>
                </li>
            
                <li >
                    <a href="{{URL('editadminprofile')}}">
                        <i class="fa fa-cog" aria-hidden="true"></i>
                        <p>Edit Profile</p>
                    </a>
                </li>

                <li >
                    <a href="{{URL('/admin/manage/waitings')}}">
                        <i class="fa fa-pause" aria-hidden="true"></i>
                        <p>Waiting To Be Approved</p>
                    </a>
                </li>
            
            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse">
               
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="{{URL('adminCreateEvent')}}">
                                Create Event
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                {{Auth::user()->name}}'s Profile
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    @yield('content')
                
                </div>
            </div>
        </div>  
    </div>
</div>



</body>
    <script src="{{URL::asset('js/jquery-1.10.2.js')}}" type="text/javascript"></script>
	<script src="{{URL::asset('js/bootstrap.min.js')}}" type="text/javascript"></script>

    <script>
  $('#confirmDelete').on('show.bs.modal', function (e) {
      $message = $(e.relatedTarget).attr('data-message');
      $(this).find('.modal-body p').text($message);
      $title = $(e.relatedTarget).attr('data-title');
      $(this).find('.modal-title').text($title);

      // Pass form reference to modal for submission on yes/ok
      var form = $(e.relatedTarget).closest('form');
      $(this).find('.modal-footer #confirm').data('form', form);
  });

  <!-- Form confirm (yes/ok) handler, submits form -->
  $('#confirmDelete').find('.modal-footer #confirm').on('click', function(){
      $(this).data('form').submit();
  });

</script>

</html>
