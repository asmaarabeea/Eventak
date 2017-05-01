@extends('layouts.admin')

@section('content')
<div class="row ">
	<div class=" col-md-offset-1" class="" style="margin-right:100px">
	<div class='col-sm-4'>
		<p style="font-size:30px;"><strong>Add Category</strong></p>
	</div>
	<div class='col-sm-8'>
	<button type="button" class="btn btn-info " data-toggle="modal" data-target="#myModal">
			<span class="glyphicon glyphicon-plus"></span>
	</button>
	</div>
		    <table class="table table-striped" style="width:100%">
		        <thead>
		            <tr>
		                <th>Category name</th>
		                <th>Image</th>
		            </tr>
		        </thead>
		        <tbody>
		         @foreach($categories as $category)
		             <tr>
		                <td>{{$category->name}}</td>
		                <td><img src="{{$category->image}}" width="40px" height="40px" "></td>
		                <td>
		                 
		                        <!-- Edit -->
								<a role="button" class="btn btn-default edit" data-toggle="modal" 	data-target="#editModal" id="{{$category->id}}">
								<input type="hidden" class="{{$category->id}}" value="{{$category->name}}">
	                            <i class="glyphicon glyphicon-pencil" > </i>
		                      	</a>
		                      	<!--delete -->
		                  <button class="btn" role="button" type="button" data-toggle="modal" data-target="#{{$category->id}}" >
                                    <i class="glyphicon glyphicon-trash " aria-hidden="true" style="color:red; margin-left:10px"></i>
                                </button>

		                </td>         
		            </tr>
		        @endforeach    
		        </tbody>
		    </table>
        </div>
	</div>

   <script type="text/javascript">
   		var cat_id;
  		$('.edit').on('click', function(){
  			var id = $(this).attr("id");
  			var name = $('.'+id).val();
  			$('.cat_name').val(name);
  			cat_id=id;
  		});


  		$('.edit_cat').on('click', function(){
  			var name_cat = $('.cat_name').val();
  			console.log(name_cat+ cat_id );
  			$.ajax({
                url : "{{url('editCategory/cat')}}",
                method: 'post',
                data:{"id" : cat_id, "cat" : name_cat, _token : '{{ csrf_token() }}'},
                success: function(data){
                    window.location.reload();
                },
                error: function(error){
                    console.log(error);
                }
            });

  		});
  </script> 


@endsection

{{-- Add Category --}}
    <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"></button>
            <h4 class="modal-title">Add New</h4>
        </div>

    <div class="modal-body">
        <form action="#" method="post"  enctype="multipart/form-data">
        Name <input type="text" name="cat"/><br><br>
            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
            <input type="file" name="image" id="image" />
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-default">Add</button>
    </div>  
        </form>      
    </div>
    </div>
    </div>

{{-- Edit Category --}}
    <div class="modal fade" id="editModal" role="dialog">
	    <div class="modal-dialog">
	    <!-- Modal content-->
	    <div class="modal-content">
	        <div class="modal-header">
	            <button type="button" class="close" data-dismiss="modal"></button>
	            <h4 class="modal-title">Edit One</h4>
	        </div>

	    <div class="modal-body">
	        Name <input type="text" name="cat"  class="cat_name" value=""/><br><br>
	            {{ csrf_field() }}
	            <input type="file" name="image" id="image" value="" />
	    </div>
	     
	    <div class="modal-footer">
	        <button type="click" class="btn btn-default edit_cat">Save</button>
	    </div>  
	    </div>
	    </div>
    </div>


	@foreach($categories as $category)

	    <div class="modal fade" id="{{$category->id}}" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" aria-hidden="true"></button>
            <h4 class="modal-title">Delete Category</h4>
          </div>
          <div class="modal-body">
            <p>Are you sure about this ?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default"><a href="">Cancel</a></button>
            
            <a class="btn btn-danger" href="{{URL('delete/category')}}/{{$category->id}}">Delete</a> 
          </div>
        </div>
      </div>
      </div>

	@endforeach