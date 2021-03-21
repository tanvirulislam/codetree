    	<div class="modal-header">
    		<h2 class="modal-title" id="exampleModalLabel">Update Logo Information</h2>
    		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    	</div>
    	<div class="modal-body">
    		@if(!empty($logos->image))
    		<img src="{{ asset('/')}}{{$logos->image}}" alt="{{$logos->name}}" class="img-rounded" style="width:100px;height:100px;">
    		@else
    		<img src="{{ asset('/')}}public/admin/defaultIcon/no_image.png" alt="No-image" class="img-rounded" style="width:100px;height:100px;">
    		@endif

    		<form method="post" action="{{route('admin.logo.update')}}" enctype="multipart/form-data">
    			@csrf
    			<div class="form-row">
    				<div class="form-group col-md-12">
    					<label>Change Image</label>
    					<input type="file" class="form-control-file" name="image">
    					<input type="hidden" name="id" value="{{$logos->id}}">
    				</div>

    				<div class="form-group col-md-6">
    					<label>Name</label>
    					<input type="text" class="form-control" name="name" value="{{$logos->name}}">
    				</div>
    				<br>
    			<div class="form-row">
    				<input type="submit" class="btn btn-primary" style="float:right;" value="Update">

    			</div>

    		</form>
    	</div>


