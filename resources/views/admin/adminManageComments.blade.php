@extends('layouts.admin')

@section('content')

<div class="row ">
    <div class=" col-md-offset-1" style="margin-right: 100px;">
<div class=""> 
    <table class="table table-striped "  style="width:100%;">
    	<thead>
		<tr>
		<th style="padding: 20px;"><strong>Event</strong></th>
		<th style="padding: 20px;"><strong>User Name</strong></th>
		<th style="padding: 20px;"><strong>User Image</strong></th>
		<th style="padding: 20px;"><strong>Comments</strong></th>
		<th style="padding: 20px;"><strong>Approval</strong></th>
		</tr>
	</thead>
	<tbody>

	@forelse($comments as $comment)
		<tr>
			<td style="width: 15%;padding: 15px;"><strong>{{$comment->event->title}}</strong></td>
			<td style="width: 15%;padding: 15px;"><strong>{{$comment->user->name}}</strong></td>
			<td style="width: 7%;"><img src="{{asset($comment->user->image)}}" style= "width:60px ;height:60px";></td>
			<td style="padding: 15px;">{{$comment->comment}}</td>
			<td>
			<form action="{{url('/toggle-approve')}}" method="POST">
				{{csrf_field()}}
				<input <?php if($comment->approve == 1) {echo "checked";} ?> type="checkbox" name="approve">
				<input type="hidden" name="commentId" value="{{$comment->id}}">
			<input class="btn btn-primary" type="submit" value="Done">
			</form>
			</td>
		</tr>
		@empty
		<h4>No Data</h4>
		@endforelse
	</tbody>
    </table>
        </div>
    </div>
</div>
  
@endsection




