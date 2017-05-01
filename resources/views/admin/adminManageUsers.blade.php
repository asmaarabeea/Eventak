@extends('layouts.admin')

@section('content')

<div class="row ">
    <div class=" col-md-offset-1" style="margin-right: 100px;">
<div class=""> 
    <table class="table table-striped "  style="width:100%;">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Image</th>
            </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
             <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->gender}}</td>
                <td><img src="{{$user->image}}" width="40px" height="40px" "></td>  
                     
                        <td>
                 
                           <button class="btn" role="button" type="button" data-toggle="modal" data-target="#{{$user->id}}" >
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


@foreach($users as $user)

      <div class="modal fade" id="{{$user->id}}" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" aria-hidden="true"></button>
            <h4 class="modal-title">Delete User</h4>
          </div>
          <div class="modal-body">
            <p>Are you sure about this ?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default"><a href="">Cancel</a></button>
            
            <a class="btn btn-danger" href="{{URL('adminManageUsers')}}/{{$user->id}}">Delete</a> 
          </div>
        </div>
      </div>
      </div>

@endforeach