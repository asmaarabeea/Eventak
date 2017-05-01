@extends('layouts.profile')

@section('content')

 <div class="content">
    <div class="container-fluid">
      <div class="row" id="event">
              
        @foreach ($events as $event)
           @if(!(Auth::guest()) && ($event->user_type == 'user') && (!Auth::guard('admin')->check()))
              <div id="s" data-title-keyword="{{$event->title}}" class="col-md-4">
                  <div class="card">
                      <div class="header">
                        <div class="post-img-content">   
                          <a href="{{URL('details')}}/{{$event->id}}"> <img src="{{asset($event->image)}}" style= "width:290px ;height:200px"; border-radius:50% ;></a>
                        </div>
                        <br>
                        <div style="height:100px;width:320px ;  word-break:break-all">
                          <a href="{{URL('details')}}/{{$event->id}}"><p><strong>{{$event->title}}</strong></p>
                          </a>
                        </div>
                         <div>
                           <?php $count= 0; ?>
                            @foreach($event_user as $e)
                                @if($event->id == $e->event_id)
                                   <?php ++$count; ?>
                                @endif

                            @endforeach
                            <p>@if($count>0)

                          <i class="fa fa-heart" aria-hidden="true" style="font-size:20px;color:#4d4dff;"><strong style="margin-left: 10px;">{{$count}}</strong></i>
                                    @endif
                                    </p>
                        </div>
                         <a href="{{URL('details')}}/{{$event->id}}" type="button" class="btn btn-default" id="details" name="details" style="margin-right:10px">Show details</a>

                            @if(!(Auth::guest()) && ($event->user_type != 'admin') && ($event->user_id == Auth::id()) && (!Auth::guard('admin')->check()))

                                <a href="{{URL('/edit')}}/{{$event->id}}" type="button" class="btn btn-default" id="details" name="details" style="margin-right:10px">Edit Event</a>

                                <button class="btn btn-danger" role="button" type="button" data-toggle="modal" data-target="#{{$event->id}}" >
                                    <i class="glyphicon glyphicon-trash " aria-hidden="true" style="color:red; margin-left:10px"></i>
                                </button>
            @endif
                            </div> <br>
                    </div> 
                </div>
              @endif
              @endforeach
          </div>
      </div>
  </div>
@endsection

@foreach($events as $event)

    <div class="modal fade" id="{{$event->id}}" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" aria-hidden="true"></button>
            <h4 class="modal-title">Delete Event</h4>
          </div>
          <div class="modal-body">
            <p>Are you sure about this ?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default"><a href="">Cancel</a></button>
            
            <a class="btn btn-danger" href="{{URL('delete')}}/{{$event->id}}">Delete</a> 
          </div>
        </div>
      </div>
      </div>

@endforeach

 

