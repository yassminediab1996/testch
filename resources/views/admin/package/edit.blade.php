  @extends('admin.layouts.app_en')
@section('title')
  Edit  Package
@endsection
@section('content')

                <form action="{{url('17$es12/package/edit')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}

                    <div class="modal-body">

                        <input type="hidden" name="id" value="{{$getpac->id}}">
                        <div class="form-group">
                            <label class="control-label">Package Name</label>
                            <div class="input-group">
                                <span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
                                <input type="text" name="name_ar" class="form-control no-bl" value="{{$getpac->name_ar}}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Price</label>
                            <div class="input-group">
                                <span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
                                <input type="text" name="price" class="form-control no-bl" value="{{$getpac->price}}" required>
                            </div>
                        </div>
                       <div class="form-group">
								<textarea id="compose-textarea" name="description" placeholder="description" class="form-control" style="height: 300px">
                                      {{$getpac->description}}
								</textarea>
                         </div>
                         <div class="form-group">
                            <label class="control-label">minumun number</label>
                            <div class="input-group">
                                <span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
                                <input type="text" name="min_num" class="form-control no-bl" value="{{$getpac->min_num}}" required>
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="control-label">Discount</label>
                            <div class="input-group">
                                <span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
                                <input type="text" name="discount" class="form-control no-bl" value="{{$getpac->discount}}" required>
                            </div>
                        </div>
                           <div class="form-group">
                            <label class="control-label">Sex </label>
                            <div class="input-group">
                                <select name="sex" class="form-control" value="{{$getpac->sex}}">
                                    @if($getpac->sex == 1) )
                                    <option value="1"  selected="selected" >male</option>
                                    <option value="2">fmale</option>
                                    @else
                                    <option value="1"  >male</option>
                                    <option value="2"  selected="selected">fmale</option>
                                    @endif
                                </select>
                           </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label">Age Range </label>
                            <div class="input-group">
                                <select name="age" class="form-control" value="{{$getpac->age}}">
                                  
                                    @if($getpac->age == "18-24")
                                      <option  value="18-24"  selected="selected">18-24</option>
                                      <option value="25-34"  >25-34</option>
                                      <option value="35-65" >35-65</option>
                                    @elseif($getpac->age == "25-34")
                                      <option  value="18-24"  >18-24</option>
                                      <option value="25-34" selected="selected" >25-34</option>
                                      <option value="35-65" >35-65</option>
                                      @elseif($getpac->age == "35-65") 
                                      <option  value="18-24"  >18-24</option>
                                      <option value="25-34"  >25-34</option>
                                      <option value="35-65"selected="selected" >35-65</option>
                                     @endif
                                </select>
                           </div>
                        </div>
                        @php
                         $productselec = array();
                         $productselec = explode(',',$getpac->products);
                 
                        @endphp
                         <div class="form-group">
                            <label class="control-label">choose products</label>
                            <div class="input-group">
                                <select name="products[]" class="form-control" multiple style="height: 130px;">
                                    @foreach(explode(',',$getpac->products) as $edpro)
                                       <option selected="selected" value="{{$edpro}}" style="color: green;">{{App\AdminModel\Product::find($edpro)->name_ar}}</option>
                                    @endforeach
                                    @foreach(App\AdminModel\Product::all() as $product)
                                     @if(!in_array($product->id,$productselec))
                                      <option value="{{$product->id}}">{{$product->name_ar}}</option>
                                      @endif
                                    @endforeach
                                </select>
                           </div>
                        </div>
                    	<div class="form-group">
        					<label class="control-label">image</label>
        					<div class="input-group">
        						<span class="input-group-addon br br-light no-br"><i class="ti-credit-card"></i></span>
        
        						<input  type="file" id="myFile" name="file" accept='image/*' class="file-input" data-show-caption="false" data-show-upload="true" >
        					</div>
        				</div>
                    </div>
                    <div class="modal-footer">

                        <button class="btn btn-dark btn-flat" data-dismiss="modal" aria-label="Close">Cancel</button>
                        <button class="btn gredient-btn" type="submit">Add</button>
                    </div>
                </form>
            
    @endsection