
    @foreach($comments as $com)
      <p style="margin-left: 20px;
    margin: 20px;
    border-radius: 1%;
    border: 1px solid #eee;
    height: 30px;    padding: 0 10px;">{{$com->comment}}</p>
    @endforeach
    <form action="{{url('17$es12/contact/addcomment')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
         <input type="hidden" name="id" value="{{$com->contact_id}}">
            <div class="modal-body">
          <div class="form-group">
			<label class="control-label">write your Comment</label>
			<div class="input-group">
				<span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
				<input type="text" name="comment" class="form-control no-bl" value="" required>
			</div>
		</div>
        </div>
        <div class="modal-footer">

            <button class="btn btn-dark btn-flat" data-dismiss="modal" aria-label="Close">Cancel</button>
            <button class="btn gredient-btn" type="submit">Add</button>
        </div>
  </form>