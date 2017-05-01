
<!DOCTYPE html>
<html>
<head>
<title>Event Category</title>
<meta charset="utf-8">
<link href="{{asset('layout/styles/layout.css')}}" rel="stylesheet" type="text/css" media="all">
    <script type="text/javascript" src="{{URL::asset('js/jquery-3.1.1.js')}}">
    </script>

<link href="https://fonts.googleapis.com/css?family=Eagle+Lake" rel="stylesheet"> 
<link href="https://fonts.googleapis.com/css?family=Cookie" rel="stylesheet">

<style> 
input[type=text] {
    width: 130px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    background-color: white;
    background-image: url('searchicon.png');
    background-position: 10px 10px; 
    background-repeat: no-repeat;
    padding: 12px 20px 12px 40px;
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
}
input[type=text]:focus {
    width: 100%;
}

.hii {

font-family: 'Eagle Lake', cursive;font-size: 600%;
}

.hiii {
font-family: 'Cookie', cursive;font-size: 200%;
}

</style>
</head>
<body id="top" class="bgded fixed" style="background-image:url({{asset('css/images/background_1.jpg')}});">
<div class="wrapper row0">
  <header id="header" class="clear"> 
    <div id="logo">
      <p class="hii" ><a href="/">Eventak</a></p>
      </div>
      <br>
      <br>
      <p class="hiii" >We aren't to lead events but to follow them ^_^ </p>
    
  </header>
</div>
<div class="wrapper row1">
  <nav id="mainav" class="clear"> 
    <ul class="clear">
      <li class="active"><a href="{{ URL('/') }}">Home</a></li>
      @if ((Auth::guest()))
      <li><a href="{{ URL('register') }}">Sign up</a></li>
      <li><a href="{{ URL('login') }}">Login</a></li>

          @elseif (!(Auth::guest()))
          <li><a class="drop">{{Auth::user()->name}}'s Profile</a>
        <ul>
          <li><a href="{{URL('userprofile')}}">My Profile</a></li>
          <li><a href="{{URL('editProfile')}}">Account Settings</a></li>
          <!-- <li><a href="{{URL('logout')}}">Sign out</a></li> -->
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
        
        @endif
                  
        </ul>
      </li>
    </ul>
  </nav>
</div>
<div class="wrapper row2">
  <div id="breadcrumb"> 
    <ul>
      <input class="search" id="search" type="text" name="search" placeholder="Search.." >
    </ul>
  </div>
</div>
<div class="wrapper row3">
  <main id="container" class="clear"> 
    <!-- container body --> 
    <div id="gallery">
      <figure>
<ul class="nospace clear">
    <div id="event">
    <br>
        @foreach($events as $event)
            <li data-title-keyword="{{$event->title}}" data-location-keyword="{{$event->location->title}}" data-date-keyword="{{$event->date}}" class="one_quarter" >
                <div class="post-img-content" >
                      <a href="{{URL('details')}}/{{$event->id}}"><img src="{{ asset($event->image)}}" alt="" style=' width:200px; height:200px;'></a>
                      <br><br>
                      <h6 class="nospace push10">{{$event->title}}</h6>
                      <p class="nospace push10">{{$event->location->title}}</p>
                      <p class="nospace push10">{{$event->date}}</p>
                      <p class="nospace"><a href="{{URL('details')}}/{{$event->id}}">Event Details</a></p>
                </div>
             </li>
        @endforeach
       
    </div>
        </ul>

      </figure>
    </div>
    <div class="clear"></div>
  </main>
</div>
    <div class="wrapper row4">
      <footer id="footer" class="clear"> 
         <div class="one_third first" style="margin-left:50px;" >
      <h1>about</h1>
      <hr style="margin-bottom:20px ;">
      <br>
      <address class="push30">
      Company Name : Eventak<br>
      <br>
      Town : Alexandria<br>
    
      </address>
      <ul class="nospace">
        <li class="push10"><span class="icon-phone"></span> +00 (000) 000 0000</li><br>
        <li><span class="icon-envelope-alt"></span> eventak.iti@gmail.com</li>
      </ul>
     
    </div>
   
      </footer>
    </div>
<div class="wrapper row5">
</div>
</body>

  <script >
    $(document).ready(function() {
        $("#search").on('keyup', function(){
            var current_query = $("#search").val();
            $("#event li").hide();
            $("#event li").each(function(){
                
                var current_title_keyword = $(this).attr("data-title-keyword").toLowerCase();
                var current_location_keyword = $(this).attr("data-location-keyword").toLowerCase();
                var current_date_keyword = $(this).attr("data-date-keyword").toLowerCase();
                // console.log(current_keyword);
                if(current_title_keyword.indexOf(current_query.toLowerCase()) >= 0 | current_location_keyword.indexOf(current_query.toLowerCase()) >= 0 | current_date_keyword.indexOf(current_query.toLowerCase()) >= 0 ){
                    $(this).show();              
                }
            });    
        });
     });
  </script>

</html>
