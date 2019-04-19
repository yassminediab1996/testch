@extends('admin.layouts.app_en')
@section('title')
    Products
@endsection
@section('content')
    @php
      $productimage =   App\AdminModel\ImageProduct::where('product_id',$id)->get();
    @endphp
    <!-- row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="flexbox padd-10 bb-1">
                    <h4 class="mb-0">عرض صور منتج
    </h4>
    <a href="#" class="btn gredient-btn" data-toggle="modal" data-target="#addproduct" title="Add Products">

                        اضافة صور للمنتج
                    </a>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="data-table-advance" class="table table-lg table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>صورة المنتج</th>
                                <th>تاريخ</th>
                                <th></th>
                            </tr>
                            </thead>

                            <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach($productimage as $pro)
                                <tr>

                                    <td>{{$i++}}</td>
                                    <td><a href="#"><img src="{{asset('uploads/files/'.$pro->img)}}" class="avatar" alt="Avatar"></a></td>
                                    <td>{{$pro->created_at}}</td>
                                    <td>
                                        <a href="#" class="delete"  onclick="delCat({{$pro->id}})" title="Delete" data-toggle="tooltip"><i class="ti-trash"></i></a>
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


        function delCat(id){
            $("#id_proimg_del").val(id);
            $("#remove_modal").modal();
        }

        function Delete() {
            var id    = $("#id_proimg_del").val();
            $.get("{{ url('17$es12/improduct/delete') }}?id="+id, function(data, status){
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
                    <h4 class="modal-title">اضافة صوره للمنتج</h4>
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
                <form action="{{url('17$es12/improduct/add')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}

                    <div class="modal-body">
                        <input type="hidden" name="product_id" value="{{$id}}">

                        <div class="form-group">
                            <label class="control-label">الصورة</label>
                            <div class="input-group">
                                <span class="input-group-addon br br-light no-br"><i class="ti-credit-card"></i></span>

                                <input required type="file" id="myFile" name="file" accept='image/*' class="file-input" data-show-caption="false" data-show-upload="true" >
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">

                        <button class="btn btn-dark btn-flat" data-dismiss="modal" aria-label="Close">Cancel</button>
                        <button class="btn gredient-btn" type="submit">اضافه</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Product Popup -->



    <!-- Remove modal -->
    <div id="remove_modal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h5 class="modal-title">مسح</h5>
                </div>

                <div class="modal-body">
                    هل انت متاكد من اتمام عمليه المسح ؟
                    <input type="hidden" id="id_proimg_del" class="form-control" value="">
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="Delete()">نعم, </button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">لا شكرا </button>
                </div>
            </div>
        </div>
    </div>
    <!-- /remove modal -->


    <!-- /.content-wrapper-->
@endsection


