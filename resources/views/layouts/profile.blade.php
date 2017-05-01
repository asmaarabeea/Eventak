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
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">

    <style type="text/css"> 
    .unread{
        background-color: #e5e5e5;
    }
    </style>

    <link href="{{ asset('css/base.css') }}" rel="stylesheet" /> 
    <link href="{{ asset('css/style1.css') }}" rel="stylesheet" />

</head>
<body>

<div class="wrapper clearfix"> 
    
    <div class="sidebar" style="background: url({{asset('css/images/sidebar-5.jpg')}}); ">  
    	<div class="sidebar-wrapper">
            <ul class="nav">
                <li>
                     <img class="avatar border-gray" src="{{asset($user->image)}}"  style='margin-left: 60px; width:120px; height:120px; border-radius:100% ;'/>
                </li>
                <br>
                <li >
                    <a href="{{URL('/')}}">
                        <i class="fa fa-home" aria-hidden="true"></i>
                        <p>Home</p>
                    </a>
                </li>

                <li @if($active == 'userprofile') class="active" @endif>
                    <a href="{{URL('/userprofile')}}">
                        <i class="fa fa-address-card-o" aria-hidden="true"></i>
                        <p>My Events</p>
                    </a>
                </li>

                <li @if($active == 'editprofile') class="active" @endif>
                    <a href="{{URL('editProfile')}}">
                        <i class="fa fa-cog" aria-hidden="true"></i>
                        <p>Edit Profile</p>
                    </a>
                </li>
                <li @if($active == 'eventprofileintrested') class="active" @endif>
                    <a href="{{URL('event/profile/interested')}}">  
                        <i class="fa fa-gratipay" aria-hidden="true"></i>
                        <p>Interested Events</p>
                    </a>
                </li>
                <li @if($active == 'eventprofileaccepted') class="active" @endif>
                    <a href="{{URL('event/profile/accepted')}}">
                        <i class="fa fa-check-circle-o" aria-hidden="true"></i>
                        <p>Accepted Events</p>
                    </a>
                </li>
                <li @if($active == 'eventprofilewaiting') class="active" @endif>
                    <a href="{{URL('event/profile/waiting')}}">
                        <i class="fa fa-pause" aria-hidden="true"></i>
                        <p>Waiting Events</p>
                    </a>
                </li>
                <li @if($active == 'eventprofilerejected') class="active" @endif>
                    <a href="{{URL('event/profile/rejected')}}">
                        <i class="fa fa-window-close" aria-hidden="true"></i>
                        <p>Rejected Events</p>
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
                    <ul class="nav navbar-nav navbar-left">
                     <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-globe"></i>
                                <b class="caret"></b>
                                 <span class="notification">{{count(auth()->user()->unreadNotifications)}}</span>
                            </a>
                            <ul class="dropdown-menu">
                                @foreach (auth()->user()->notifications as $notify)
                                 <li><a href="{{URL('/details')}}/{{$notify->data['id']}}" class="{{$notify->read_at == null ? 'unread' : ''}} ">{{$notify->data['title']}} <?php $notify->markAsRead() ;?></a></li>
                                @endforeach
                            </ul>
                    </li>
                        <li>

                         <div class="con">
                        <form id="search" action="#" method="post">
                            <div id="label"><label for="search-terms" id="search-label">search</label></div>
                            <div id="input"><input type="text" name="search-terms" id="search-terms" placeholder="Enter search terms..."></div>
                        </form>
                        </div>

                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="{{URL('create')}}">
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

 <script >
    $(document).ready(function() {
        $("#search-terms").on('keyup', function(){
            var current_query = $("#search-terms").val();
            $("#event #s").hide();
            $("#event #s").each(function(){
                var current_title_keyword = $(this).attr("data-title-keyword").toLowerCase();
                if(current_title_keyword.indexOf(current_query.toLowerCase()) >= 0){
                    $(this).show();              
                      }
            });    
        });
     });
  </script>

    <script src="{{URL::asset('js/classie.js')}}" type="text/javascript"></script>
    <script src="{{URL::asset('js/search.js')}}" type="text/javascript"></script>

</html>