@extends('admin.layouts.app_en')
@section('title')
    Products
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="flexbox padd-10 bb-1">
                    <h4 class="mb-0">Products Lists</h4>
                    <a href="#" class="btn gredient-btn" data-toggle="modal" data-target="#addproduct" title="Add Products">
                        Add Products
                    </a>
                </div>
                @include('website.notfi')
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="data-table-advance" class="table table-lg table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name In Arabic</th>
                                <th>Image</th>
                                <th>Current Price</th>
                                <th>Description in Arabic</th>
                                <th>free </th>
                                <th>view in store</th>
                                <th>Qty</th>
                                <th>Category name </th>
                                <th>Sub Category name</th>
                                <th>Brand name</th>
                                <th>Date Created</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach($products as $pro)
                                <tr>

                                    <td>{{$i++}}</td>
                                    <td> <a href="{{url('17$es12/singleproduct/'.$pro->id)}}">{{$pro->name_ar}} </a></td> 
                                    <td><a href="#"><img src="{{asset('uploads/files/'.$pro->img)}}" class="avatar" alt="Avatar"></a></td>
                                    <td>{{\App\AdminModel\Product::Price($pro->id)}}</td>
                                    <td>{!! substr($pro->description_ar,0,50) !!}</td>
                                    <td>
                                        @if($pro->checkfree == 1)
                                        <input type="checkbox" checked onclick="updtfree({{$pro->id}} , 0 )">
                                        @else
                                         <input type="checkbox" onclick="updtfree({{$pro->id}} , 1 )">
                                        @endif
                                    </td>
                                        <td>
                                        @if($pro->checkview == 1)
                                        <input type="checkbox" checked onclick="updtview({{$pro->id}} , 0 )">
                                        @else
                                         <input type="checkbox" onclick="updtview({{$pro->id}} , 1 )">
                                        @endif
                                    </td>
                                    <td>{{$pro->qty}}</td>
                                    <td>{{$pro->category->name_en}}</td>
                                    <td> {{App\AdminModel\Category::find($pro->sub_id)->name_en}}</td>
                                    @if(count($pro->brand) > 0)
                                    <td>{{$pro->brand->name_ar}}</td>
                                    @else
                                    <td>لا يوجد</td>
                                    @endif
                                    <td>{{$pro->created_at}}</td>
                                    <td>

                                        <a href="#" class="settings"  onclick="ShowEdit({{$pro->id}} , {{$pro->category->id}})" title="Settings" data-toggle="tooltip"><i class="ti-settings"></i></a>
                                        <a href="#" class="delete"  onclick="delCat({{$pro->id}})" title="Delete" data-toggle="tooltip"><i class="ti-trash"></i></a>
                                        <a href="{{url('17$es12/improduct/'.$pro->id)}}"><button class="btn btn-sm btn-success">view images</button></a>
                                    </td>
                                </tr>

                            @endforeach
                            @php
                                $i++;
                            @endphp
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
    <script>
        function  ShowEdit(id , catid) {
           
           
            $.get("{{ url('17$es12/products/Getinfo') }}?id="+id, function(data, status){
                $("#id_product").val(id);
                $("#name_ar").val(data.name_ar);
                $("#name_en").val(data.name_en);
                $("#o_price").val(data.o_price);
                 $("#qty_type").val(data.qty_type);
                   $("#sub_id").val(data.sub_id);
                $('#compose-textarea3').next('input').next('iframe').contents().find('.wysihtml5-editor').html(data.description_ar);
                $('#compose-textarea4').next('input').next('iframe').contents().find('.wysihtml5-editor').html(data.description_en);
                $("#qty_edit").val(data.qty);
                $("#category_id").val(data.category_id);
                $("#brand_id").val(data.brand_id);
                $("#editproduct").modal();
            });
        }

        function delCat(id){
            $("#id_pro_del").val(id);
            $("#remove_modal").modal();
        }

        function Delete() {
            var id    = $("#id_pro_del").val();
            $.get("{{ url('17$es12/products/delete') }}?id="+id, function(data, status){
                location.reload();
                swal({
                    position: 'top-center',
                    type: 'success',
                    title: 'deleted successfully',
                    showConfirmButton: false,
                    timer: 1500
                });
            });
        }
    //   function getsubs(id) {
    //   console.log(id);
    //     $.ajax({
    //         type: "GET",
    //         url: '{{URL::to("admin/categories/getsub")}}',
    //         dataType: "html",
    //         data: {
    //             id : id
    //         },
    //         success: function (response) {
    //             var data = eval('(' + response + ')');
    //             if (data.length > 0) {
    //                 document.getElementById('sub_id_add').innerHTML = '';
    //                 var x = document.createElement('option');
    //                 x.value = 0;
    //                 x.disabled = true;
    //                 x.selected = true;
    //                 x.appendChild(document.createTextNode('select sub '));
    //                 document.getElementById('sub_id_add').appendChild(x);

    //                 for (var i = 0; i < data.length; i++) {
    //                     var x = document.createElement('option');
    //                     x.value = data[i].id;
    //                     x.appendChild(document.createTextNode(data[i].name_en));
    //                     document.getElementById('sub_id_add').appendChild(x);
    //                 }

    //             } else {
    //                 document.getElementById('sub_id_add').innerHTML = '';
    //             }
    //         },
    //         error: function (e) {
    //             document.getElementById('sub_id_add').innerHTML = '';
    //         }
    //     });
    // }
    
    //  function getsubsedit(id) {
    //   console.log(id);
    //     $.ajax({
    //         type: "GET",
    //         url: '{{URL::to("admin/categories/getsub")}}',
    //         dataType: "html",
    //         data: {
    //             id : id
    //         },
    //         success: function (response) {
    //             var data = eval('(' + response + ')');
    //             if (data.length > 0) {
    //                 document.getElementById('sub_id').innerHTML = '';
    //                 var x = document.createElement('option');
    //                 x.value = 0;
    //                 x.disabled = true;
    //                 x.selected = true;
    //                 x.appendChild(document.createTextNode('select sub '));
    //                 document.getElementById('sub_id').appendChild(x);

    //                 for (var i = 0; i < data.length; i++) {
    //                     var x = document.createElement('option');
    //                     x.value = data[i].id;
    //                     x.appendChild(document.createTextNode(data[i].name_en));
    //                     document.getElementById('sub_id').appendChild(x);
    //                 }

    //             } else {
    //                 document.getElementById('sub_id').innerHTML = '';
    //             }
    //         },
    //         error: function (e) {
    //             document.getElementById('sub_id').innerHTML = '';
    //         }
    //     });
    // }
    
    function updtfree(pro , id)
    {
         $.get("{{ url('updtfree') }}?id="+id+'&pro='+pro, function(data, status){
             if(data == 1){
             location.reload();
             }
         });
    }
    
    function updtview(pro , id)
    {
       $.get("{{ url('updtview') }}?id="+id+'&pro='+pro, function(data, status){
             if(data == 1){
             location.reload();
             }
         });  
    }
    
    </script>
    <!-- Add Product Popup -->
    <div class="add-popup modal fade" id="addproduct" tabindex="-1" role="dialog" aria-labelledby="addproduct">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header gredient-bg">
                    <ul class="card-actions icons right-top">
                        <li>
                            <a href="javascript:void(0)" class="text-white" data-dismiss="modal" aria-label="Close">
                                <i class="ti-close"></i>
                            </a>
                        </li>
                    </ul>
                    <h4 class="modal-title">Add Producr</h4>
                    <div class="user-avatar-wrapper">
                        <figure>
                            <div class="icon-upload">
                                <label for="file-input">
								<span class="edit-avatar">
									<span class="no-avatar app_primary_lighten_bg animated zoomIn"></span>
								</span>
                                </label>
                                <input id="file-input" type="file">
                            </div>
                        </figure>
                    </div>
                </div>
                <form action="{{url('17$es12/products/addcat')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}

                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label">Product Name In English</label>
                            <div class="input-group">
                                <span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
                                <input type="text" name="name_en" class="form-control no-bl" value="" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Product Name In Arabic</label>
                            <div class="input-group">
                                <span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
                                <input type="text" name="name_ar" class="form-control no-bl" value="" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Product  Price</label>
                            <div class="input-group">
                                <span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
                                <input type="text" name="o_price" class="form-control no-bl" value="" required>
                            </div>
                        </div>


                        <div class="form-group">
									<textarea id="compose-textarea" placeholder="description in arabic" name="description_ar" class="form-control" style="height: 300px" required>

									</textarea>
                        </div>

                        <div class="form-group">
									<textarea id="compose-textarea2"placeholder="description in english"  name="description_en" class="form-control" style="height: 300px">

									</textarea>
                        </div>

                        <div class="form-group">
                            <label class="control-label">  Qty  </label>
                            <div class="input-group">
                                <span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
                                <input type="text" name="qty" id="qty" class="form-control no-bl" value="" requierd>
                            </div>
                        </div>
                        
                         <div class="form-group">
                            <label class="control-label">  Qty Type  </label>
                            <div class="input-group">
                                <span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
                                <input type="text" name="qty_type"  class="form-control no-bl" value="" >
                            </div>
                        </div>
                       <div class="form-group">
                            <label for="exampleSelect1"> select Category</label>
                            <select class="form-control" name="category_id" requierd  onchange="getsubs(this.value)">
                                @foreach(App\AdminModel\Category::where('parent',0)->get() as $cat)
                                <option value="{{$cat->id}}">{{$cat->name_en}}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleSelect1"> select Sub Category</label>
                            <select class="form-control" id="sub_id_add" name="sub_id" requierd >
                                @php
                                 $cat = App\AdminModel\Category::where('parent',0)->first();
                                @endphp
                                @foreach(App\AdminModel\Category::where('parent' ,'!=', 0)->get() as $cat)
                                <option value="{{$cat->id}}">{{$cat->name_en}}</option>
                                @endforeach
                            </select>
                        </div>
                        
                         <div class="form-group">
                            <label for="exampleSelect1"> select Brand</label>
                            <select class="form-control" name="brand_id"  >
                                <option  selected disabled >no brand</option>
                                @foreach(App\AdminModel\Brand::all() as $brand)
                                <option value="{{$brand->id}}">{{$brand->name_en}}</option>
                                @endforeach
                            </select>
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
            </div>
        </div>
    </div>
    <!-- End Product Popup -->

    <!-- Edit Category -->
    <div class="add-popup modal fade" id="editproduct" tabindex="-1" role="dialog" aria-labelledby="editproduct">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header gredient-bg">
                    <ul class="card-actions icons right-top">
                        <li>
                            <a href="javascript:void(0)" class="text-white" data-dismiss="modal" aria-label="Close">
                                <i class="ti-close"></i>
                            </a>
                        </li>
                    </ul>
                    <h4 class="modal-title">Edit Product</h4>
                    <div class="user-avatar-wrapper">
                        <figure>
                            <div class="icon-upload">
                                <label for="file-input">
								<span class="edit-avatar">
									<span class="no-avatar app_primary_lighten_bg animated zoomIn"></span>
								</span>
                                </label>
                                <input id="file-input" type="file">
                            </div>
                        </figure>
                    </div>
                </div>
                <form action="{{url('17$es12/products/update')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}

                    <div class="modal-body">

                        <input type="hidden" name="id" id="id_product">
                        <div class="form-group">
                            <label class="control-label">Product Name In English</label>
                            <div class="input-group">
                                <span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
                                <input type="text" name="name_en" id="name_en" class="form-control no-bl" value="" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Product Name In Arabic</label>
                            <div class="input-group">
                                <span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
                                <input type="text" name="name_ar" id="name_ar" class="form-control no-bl" value="" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Product  Price</label>
                            <div class="input-group">
                                <span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
                                <input type="text" name="o_price" id="o_price" class="form-control no-bl" value="" required>
                            </div>
                        </div>

                        <div class="form-group"> 
                        
                        
									<textarea id="compose-textarea3" name="description_ar" placeholder="description in arabic" class="form-control" style="height: 300px">

									</textarea>
                        </div>

                        <div class="form-group">
									<textarea id="compose-textarea4" name="description_en" placeholder="description in english" class="form-control" style="height: 300px">

									</textarea>
                        </div>

                        <div class="form-group">
                            <label class="control-label">  Qty  </label>
                            <div class="input-group">
                                <span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
                                <input type="text" name="qty" id="qty_edit" class="form-control no-bl" value="" required="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label">  Qty Type  </label>
                            <div class="input-group">
                                <span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
                                <input type="text" name="qty_type" id="qty_type" class="form-control no-bl" value="" >
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleSelect1"> select  Category</label>
                            <select class="form-control"  name="category_id" id="category_id"   required>
                                 <option value="" name="category_id" requierd ></option>
                                @foreach(App\AdminModel\Category::where('parent',0)->get() as $cat)
                                    <option value="{{$cat->id}}">{{$cat->name_en}}</option>
                                @endforeach
                            </select>
                        </div>
                        
                          
                           
                          <div class="form-group">
                            <label for="exampleSelect1"> select Sub Category</label>
                            <select class="form-control" id="sub_id" name="sub_id" requierd >
                                  <option value=""  name="sub_id" requierd ></option>
                                @foreach(App\AdminModel\Category::where('parent' ,'!=', 0)->get() as $cat)
                                <option value="{{$cat->id}}">{{$cat->name_en}}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        
                         <div class="form-group">
                            <label for="exampleSelect1"> select Brand</label>
                            <select class="form-control" name="brand_id" id="brand_id" >
                                @foreach(App\AdminModel\Brand::all() as $brand)
                                <option value="{{$brand->id}}">{{$brand->name_en}}</option>
                                @endforeach
                            </select>
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
                        <button class="btn gredient-btn" type="submit">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end edit category -->

    <!-- Remove modal -->
    <div id="remove_modal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h5 class="modal-title">Confirm action</h5>
                </div>

                <div class="modal-body">
                    You are about to delete this line. Are you sure?
                    <input type="hidden" id="id_pro_del" class="form-control" value="">
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="Delete()">Yes, delete</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">No thanks</button>
                </div>
            </div>
        </div>
    </div>
    <!-- /remove modal -->


    </div>
    <!-- /.content-wrapper-->
   
@endsection


