  @extends('admin.layouts.app_en')
@section('title')
  Add  Package
@endsection
@section('content')
   
                <form action="{{url('17$es12/package/add')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}

                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label">Package Name</label>
                            <div class="input-group">
                                <span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
                                <input type="text" name="name_ar" class="form-control no-bl" value="" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Price</label>
                            <div class="input-group">
                                <span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
                                <input type="text" name="price" class="form-control no-bl" value="" required>
                            </div>
                        </div>
                       <div class="form-group">
							<textarea id="compose-textarea" name="description" placeholder="description" class="form-control" style="height: 300px">
							</textarea>
                        </div>
                         <div class="form-group">
                            <label class="control-label">minumun number</label>
                            <div class="input-group">
                                <span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
                                <input type="text" name="min_num" class="form-control no-bl" value="" required>
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="control-label">Discount</label>
                            <div class="input-group">
                                <span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
                                <input type="text" name="discount" class="form-control no-bl" value="" required>
                            </div>
                        </div>
                           <div class="form-group">
                            <label class="control-label">Sex </label>
                            <div class="input-group">
                                <select name="sex" class="form-control">
                                    <option value="1">male</option>
                                    <option value="2">fmale</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label">Age Range </label>
                            <div class="input-group">
                                <select name="age" class="form-control">
                                    <option value="18-24">18-24</option>
                                    <option value="25-34">25-34</option>
                                    <option value="35-65">35-65</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label">choose products</label>
                            <div class="input-group">
                                <select name="products[]" class="form-control" multiple style="height: 130px;">
                                    @foreach(App\AdminModel\Product::all() as $product)
                                      <option value="{{$product->id}}">{{$product->name_ar}}</option>
                                    @endforeach
                                </select>
                           </div>
                        </div>
                    	<div class="form-group">
        					<label class="control-label">image</label>
        					<div class="input-group">
        						<span class="input-group-addon br br-light no-br"><i class="ti-credit-card"></i></span>
        
        						<input required type="file" id="myFile" name="file" accept='image/*' class="file-input" data-show-caption="false" data-show-upload="true" >
        					</div>
        				</div>
                    </div>
                    <div class="modal-footer">

                        <button class="btn btn-dark btn-flat" data-dismiss="modal" aria-label="Close">Cancel</button>
                        <button class="btn gredient-btn" type="submit">Add</button>
                    </div>
                </form>
            
    @endsection