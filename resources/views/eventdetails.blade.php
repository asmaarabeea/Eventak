<!DOCTYPE html>
<html >
<head>
<title>Event | Details</title>


 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
      </script>
        <style type="text/css">
    ul li:hover > ul{display:block;}
    #list { 
    background-color: yellow;
}
  
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 70%;
     margin-right: 200px;
    margin-left: 200px;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    
    
}

tr:nth-child(even) {
    background-color: #dddddd;
    
}
</style>
 <link rel="stylesheet" href="{{ asset('css/detailsStyle.css') }}">
</head>
<body id="top">
<!-- NAV -->
@if($event && $event->approved == "accepted")
        <nav class="navbar navbar-default navbar-fixed">
        <a class="navbar-brand " href="{{URL('/')}}" style="color:#00004d;font-weight: bold;">Eventak</a>
       @if ((Auth::guest()))
            <ul class="nav navbar-nav " style="color:#00004d;font-weight: bold;">
          
              <li ><a href="{{URL('login')}}">Login</a></li>
              <li><a href="{{URL('register')}}">Sign up</a></li>
            </ul>
        @elseif (!(Auth::guest()))
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
             

            <ul class="nav navbar-nav navbar-right">
        
            <ul class="nav navbar-nav">
                <li>
                 <a href="{{URL('create')}}" style="color:#00004d;font-weight: bold;">
                     Create Event
                 </a>
             </li>

        @if (!(Auth::guest()))
          <li class="dropdown active">
            <a href="" style="color:#00004d;font-weight: bold;">
              {{Auth::user()->name}}'s Profile
              <b class="caret"></b>
            </a>
            <ul class="dropdown-menu">
              <li><a href="{{URL('userprofile')}}">My Profile</a></li>
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

      @endif


            
        </ul>
    </div>
</div>
@endif
</nav>

<div class="row">
<div class="wrapper">
  <div id="intro" class="col-sm-8">
    <ul>
      <a href="#"><img src="{{ asset($event->image) }}" height="370" width="700" alt="" /></a>
    </ul>
  </div>
<div class="col-sm-4">
<br>
<br>
        <h1>{{$event->title}}</h1>
    <br>
       <p><i class="fa fa-calendar-check-o" aria-hidden="true"></i>
		<strong>Date and Time</strong></p>

		<p> {{$event->date}} , {{$event->start_time}}  To {{$event->end_time}} </p>
		<br>
		<p><i class="fa fa-location-arrow" aria-hidden="true"></i>
		<strong>Location</strong></p>
		<p>{{$event->location->title}}</p>
		<br>

    <!-- AHMED -->
    @if(($event->user_type == 'admin'))

    @else
        @if ((Auth::guest()) && (!Auth::guard('admin')->check()) && ($event->user_type == 'user'))
        <a href="#">
            <p>
                <i class="fa fa-user-circle" aria-hidden="true"></i>
                <a href="{{URL('/user/view/user/profile')}}/{{$event->user_id}}"> {{$event->createEvent->name}}</a>
           </p>
        </a>
        <br>
        <br>
        @elseif (!(Auth::guest()) && ($event->user_id == Auth::id()) && (!Auth::guard('admin')->check()))
        <a href="#">
            <p>
                <i class="fa fa-user-circle" aria-hidden="true"></i>
                <a href="{{URL('/userprofile')}}"> {{$event->createEvent->name}}</a>
           </p>
        </a>
        <br>
        <br>
        @elseif(!(Auth::guest()) && ($event->user_type == 'user') && (!Auth::guard('admin')->check()))
            Created By
            <a href="#">
                <p>
                    <i class="fa fa-user-circle" aria-hidden="true"></i>
                    <a href="{{URL('/user/view/user/profile')}}/{{$event->user_id}}">{{$event->createEvent->name}}</a>
                </p>
            </a>
        <br>
        <br>
        @elseif(!(Auth::guest()) && ($event->user_type == 'admin') && (!Auth::guard('admin')->check()))

        {{-- @elseif(!(Auth::guest()) && (Auth::guard('admin')->check()))
         Created By<a href="#"><p><i class="fa fa-user-circle" aria-hidden="true"></i>
                <a href="{{URL('/profile/user')}}/{{$event->user_id}}">{{$event->createEvent->name}}</a>
           </p></a> --}}
        <br>
        <br>
        @endif
    @endif
    
    @if (!(Auth::guest()))
		<p id="rcorners1"><font size="4">If You Interest ....  </font>

      @if(isset($event_user) && $event_user->interested == 1)
      <a id="interested" class="fa fa-heart"  style="font-size:25px;color:#0277BD;text-decoration: none;" href="#"></a>
      @else
      <a  id="interested" class="fa fa-heart-o" style="font-size:25px;color:#0277BD;text-decoration: none;" href="#" ></a>
      @endif
    </p>
    @endif
  </div>
</div>
</div>

<div class="wrapper"> 
  <!-- Content Box -->
  <div class="homecontent">
        <h2 class="title"><i class="fa fa-book" aria-hidden="true"> </i> Event's Description</h2>
        <p>{{$event->description}}</p>
        
     
  </div>
  <!-- / Content Box --> 
</div>
@if (!(Auth::guest()))
<form id='form' action="{{url('/comment')}}/{{$event->id}}" method="POST">
  {{csrf_field()}}
<div class="wrapper col2">
  <div id="projects">
    <h2>List your comment here</h2>
    <ul>
      <li> <label for="message"><br />
            <textarea id="message" name="comment" value="comment" cols="100" rows="2" placeholder="Write a comment ..."  onkeydown="if (event.keyCode == 13 && !event.shiftKey){ this.form.submit(); return false; }"></textarea>
          </label>
     {{-- <input class="btn btn-defualt" type="submit" name="done" value="Done"> --}}
          </li>

    </ul>
    <div class="clear"></div>
  </div>
</div>

<table>
@forelse($comments as $comment)
  <tr>

  <td style="width: 7%;"><img src="{{asset($comment->user->image)}}" style= "width:60px ;height:60px";></td>
    <td style="width: 15%;padding: 15px;"><strong>{{$comment->user->name}}</strong></td>
    <td style="padding: 15px;">{{$comment->comment}}</td>
     @empty
  </tr>
   @endforelse 
</table>
@endif

@else
<div style="background-image: url('../img/5.jpg'); height: 662px">
 <div class="container">
  <div class="panel-group">
    <div class="panel panel-primary col-sm-6 col-sm-offset-3" style="margin-top: 220px;">
      <div class="panel-heading ">Sorry , This Event Has No Longer Exists</div>
      <div class="panel-body"><a href="{{URL('/userprofile')}}">Back</a></div>
    </div>
</div>
</div>


@endif

</body>
 <script type="text/javascript">

@if($event)
      $('#interested').on('click',function(event){
            event.preventDefault();
            $.ajax({
                url : "{{url('/details')}}/{{$event->id}}",
                method: 'post',
                data:{"interested" : "interested", _token: '{{ csrf_token() }}'},
                success: function(data){
                    console.log(data);
                    if(data.success === 0){
                      $('#interested').removeClass('fa-heart').addClass('fa-heart-o');
                    }else{
                      $('#interested').removeClass('fa-heart-o').addClass('fa-heart');
                    }
                },
                error: function(error){
                    console.log(error);
                }

            });

      });
@endif
    </script>

{{-- <script type="text/javascript">
  
  
       $('#form').on('submit',function(event){
                event.preventDefault();
                window.location.reload();
             })  ;
</script> --}}
    <script src="{{URL::asset('js/jquery-1.10.2.js')}}" type="text/javascript"></script>
    <script src="{{URL::asset('js/bootstrap.min.js')}}" type="text/javascript"></script>

</html>
