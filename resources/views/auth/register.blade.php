@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default panel-transparent">
                
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" placeholder="Enter your full name here" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" placeholder="Enter your email here" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" placeholder="Enter your password here" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" placeholder="Enter your password again" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        
                         <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Gender : </label>

                            <div class=" col-md-6" >
                            <div class="form-control">
                                <label for="male">
                                    <input id="male" type="radio" value="male" name="gender" style="margin-left:50px";> Male
                                </label>
                                <label for="female">
                                    <input id="female" type="radio" value="female" name="gender" style="margin-left:80px";> Female
                                </label>
                               
                                @if ($errors->has('gender'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                              </div>
                            </div>
                        </div>    
                       
                        
                        <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                        <div class="form-group">
                       
                            <label for="image" class="col-md-4 control-label">Upload Your Image :</label>  <div class="col-md-6 ">
                            <input type="file" id="image" class="form-control" name="image" >
                            
                               @if ($errors->has('image'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                @endif
                              </div>
                        </div></div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-default">
                                    Register
                                </button>
                            </div>
                        </div>
                         </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
