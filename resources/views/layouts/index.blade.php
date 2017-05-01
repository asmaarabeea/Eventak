
<!DOCTYPE html>

<html>
<head>
<title>Eventak | Home</title>
<meta charset="utf-8">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">

<link href="https://fonts.googleapis.com/css?family=Eagle+Lake" rel="stylesheet"> 
<link href="https://fonts.googleapis.com/css?family=Cookie" rel="stylesheet">
<style>
.hii {

font-family: 'Eagle Lake', cursive;font-size: 600%;
}

.hiii {
font-family: 'Cookie', cursive;font-size: 200%;
}
</style>

</head>
@yield('styles')
<body id="top" class="bgded fixed" style="background-image:url('css/images/background_1.jpg');">
<div class="wrapper row0">
<header id="header" class="clear">
    <div id="logo">
      <p class="hii">Eventak</p>
      
    </div> 
<br>
<br>
<p class="hiii" >We aren't to lead events but to follow them ^_^</p>
  </header>
</div>
<div class="wrapper row1">
  <nav id="mainav" class="clear">
    <ul class="clear">
      <li class="active" ><a href="">Home</a></li>
      @if ((Auth::guest()))
      <li><a href="{{ URL('register') }}">Sign up</a></li>
      <li><a href="{{ URL('login') }}">Login</a></li>


          @elseif (!(Auth::guest()))
          <li ><a class="drop">{{Auth::user()->name}}'s Profile</a>
        <ul>
        <li><a  href="{{URL('userprofile')}}" >My Profile</a></li>
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


  </nav>
</div>
<div class="wrapper">
  <div id="slider"> 
    <div id="slidewrap">
      <div class="heading"><span id="slidecaption"></span></div>
    </div>
  </div>
</div>
<div class="wrapper row3">
  <main id="container" class="clear"> 
    <!-- container body --> 
    <ul class="nospace center clear">
    @foreach($categories as $cat)
        <li class="one_quarter" >
        <a href="{{URL('event/name')}}/{{$cat->id}}"><img class="circle pad5 borderedbox push30" src="{{asset($cat->image)}}" ></a>
        <h6 class="push10" style="font-family: 'Eagle Lake', cursive;">{{$cat->name}}</h6>
        <p class="nospace push10"></p>
        </li>
    @endforeach
    </ul>
    <!-- /container body -->
    <div class="clear"></div>
  </main>
</div>
@yield('content')
<div class="wrapper row4">
  <footer id="footer" class="clear" > 
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

    @if(!(Auth::guest()))
    <div class="one_third first" style="margin-left: 250px">
 
        <h1>Your Feedback is valuable to us</h1>
        <hr style="margin-bottom:15px ;">

        <form action="{{ url('contact')}}" method="POST">
          {{ csrf_field() }}
          
          <br>
          <div class="form-group">
            <label name="subject">Subject:</label>
            <input id="subject" name="subject" class="form-control">
          </div>
          <br>

          

          <div class="form-group">
            <label name="message">Message:</label>
            <textarea id="message" name="message" class="form-control"></textarea>
          </div>
          <br>

          <input type="submit" value="Send Message">
        </form>
      
    </div>
    @endif

  </footer>
</div>
<div class="wrapper row5">
</div>

<!-- JAVASCRIPTS --> 
<script src="layout/scripts/jquery.min.js"></script> 
<script src="layout/scripts/supersized/supersized.min.js"></script> 
<script>

jQuery(function ($) {
    $.supersized({
        slides: [{
            image: 'css/images/slider1.jpg',
            title: '<span class="heading">You can create your event now</span> <a href="{{URL('create')}}">Click here</a>'
        }, {
            image: 'css/images/slider3.jpg',
            title: '<span class="heading">You can create your event now</span> <a href="{{URL('create')}}">Click here</a>'
        }, {
            image: 'css/images/slider2.jpg',
            title: '<span class="heading">You can create your event now</span> <a href="{{URL('create')}}">Click here</a>'
        }]
    });
});
</script>
@yield('scripts')
</body>
</html>
