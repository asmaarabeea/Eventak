@extends('layouts.admin')

@section('content')
    <div class="row ">
        <div class=" col-md-offset-1" class="" style="margin-right:100px">
    <div class='col-sm-4'>
        <p style="font-size:30px;"><strong>Add Location</strong></p>
    </div>
    <div class='col-sm-8'>
    <button type="button" class="btn btn-info " data-toggle="modal" data-target="#myModal">
            <span class="glyphicon glyphicon-plus"></span>
    </button>

    </div>
                <table class="table table-striped "  style="width:100%;">
                    <thead>
                        <tr>
                            <th>Location Name </th>              
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($locations as $location)        
                         <tr>
                            <td>{{$location->title}}</td>
                            <td>

                          <button class="btn" role="button" type="button" data-toggle="modal" data-target="#{{$location->id}}" >
                                    <i class="glyphicon glyphicon-trash " aria-hidden="true" style="color:red; margin-left:10px"></i>
                                </button>

                            </td>  
                        </tr>
                    @endforeach                   
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"></button>
            <h4 class="modal-title">Add New Location</h4>
        </div>

    <div class="modal-body">
        <form action="#" method="post" >
        Name <input type="text" name="location"/><br><br>
            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
           
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-default">Add</button>
    </div>  
        </form>      
    </div>
    </div>
    </div>


@foreach($locations as $location)

    <div class="modal fade" id="{{$location->id}}" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" aria-hidden="true"></button>
            <h4 class="modal-title">Delete Location</h4>
          </div>
          <div class="modal-body">
            <p>Are you sure about this ?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default"><a href="">Cancel</a></button>
            
            <a class="btn btn-danger" href="{{URL('adminmanagelocation')}}/{{$location->id}}">Delete</a> 
          </div>
        </div>
      </div>
      </div>

@endforeach