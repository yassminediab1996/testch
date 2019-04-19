@extends('admin.layouts.app_en')
@section('title')
    Prescreption
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="flexbox padd-10 bb-1">
                    <h4 class="mb-0">Prescription Lists</h4>
                    <a href="{{url('17$es12/prescription/viewadd')}}" ><button class="btn btn-success btn-md"> Add Prescription</button>
                   
                    </a>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="data-table-advance" class="table table-lg table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name Of Patient</th>
                                <th>Name Of Doctor</th>
                                <th>Date Created</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach($presciption as $pres)
                                <tr>

                                    <td>{{$i++}}</td>
                                    <td>{{$pres->patient->name}}</td>
                                    <td>{{$pres->doctor->name}}</td>
                                       <td>{{$pres->created_at}}</td>
                                   <td>
                                        <a href="#" ><button  class="btn btn-defualt btn-md" onclick="GetDocInfo({{$pres->id}})" >View Drugs</button></a>
                                        <a href="{{url('17$es12/prescription/viewedit/'.$pres->id)}}" ><button  class="btn btn-primary btn-md"  >Edit Prescription</button></a>
                                        <a href="#" class="delete"  onclick="delCat({{$pres->id}})" title="Delete" data-toggle="tooltip"><i class="ti-trash"></i></a>
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
        // function  ShowEdit(id) {
        //     $.get("{{ url('admin/offer/Getinfo') }}?id="+id, function(data, status){
        //         $("#id_offer").val(id);
        //         $("#deadline_offer").val(data.deadline_offer);
        //         $("#percentage").val(data.percentage);
        //         $("#product_id").val(data.product_id);
        //         $("#editproduct").modal();
        //     });
        // }
        function GetDocInfo(id)
        {
               $.get("{{ url('17$es12/prescription/GetDocInfo') }}?id="+id, function(data, status){
                  $("#Detail_modal1 .modal-body").html(data);
              });
             $("#Detail_modal1").modal();
        }
        
      
        function delCat(id){
            $("#id_offer_del").val(id);
            $("#remove_modal").modal();
        }

        function Delete() {
            var id    = $("#id_offer_del").val();


            $.get("{{ url('17$es12/prescription/delete') }}?id="+id, function(data, status){
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
                    <h4 class="modal-title">view drugs</h4>
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
                <!-- table -->
                  <div class="card-body">
                    <div class="table-responsive">
                        <table id="data-table-advance" class="table table-lg table-hover">
                            <thead>
                            <tr>
                               
                                <th>Name Of Drug</th>
                                <th>Time Of Drugs</th>
                            </tr>
                            </thead>

                            <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach($presciption as $pres)
                                <tr>

                                  
                                    
                                     @if(count(explode(',',$pres->drugs)) > 0)
                                      @foreach(explode(',',$pres->drugs) as $grug)
                                       <td>{{$grug}}</td>
                                       
                                       @endforeach
                                       @else
                                       {{$pres->drugs}}
                                       @endif
                                        
                                      @if(count(explode(',',$pres->times)) > 0)
                                      @foreach(explode(',',$pres->times) as $time)
                                       <td>{{$time}}</td>
                                       @endforeach
                                        @else
                                       {{$pres->times}}
                                       @endif
                                       
                                    
                                </tr>

                            @endforeach
                            @php
                                $i++;
                            @endphp
                            </tbody>
                        </table>

                    </div>
                </div>
                <!-- table -->
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
                    <h4 class="modal-title">Edit Offer</h4>
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
                <form action="{{url('17$es12/offer/update')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}

                    <div class="modal-body">

                        <input type="hidden" name="id" id="id_offer">
                        <div class="form-group">
                            <label class="control-label">Offer Percentage</label>
                            <div class="input-group">
                                <span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
                                <input type="text" name="percentage" id="percentage" class="form-control no-bl" value="" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Deadline Of Offer</label>
                            <div class="input-group">
                                <span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
                                <input type="date" name="deadline_offer" id="deadline_offer" class="form-control no-bl" value="" required>
                            </div>
                        </div>



                        <div class="form-group">
                            <label for="exampleSelect1"> select Product</label>
                            <select class="form-control" name="product_id" id="product_id">
                                @foreach(App\AdminModel\Product::all() as $cat)
                                    <option value="{{$cat->id}}">{{$cat->name_en}}</option>
                                @endforeach
                            </select>
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
                    <input type="hidden" id="id_offer_del" class="form-control" value="">
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="Delete()">Yes, delete</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">No thanks</button>
                </div>
            </div>
        </div>
    </div>
    <!-- /remove modal -->
  <div id="Detail_modal1" class="modal fade" role="dialog">
        <div class="modal-dialog" style="width: 90%">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h5 class="modal-title">view Drugs</h5>
                </div>

                <div class="modal-body">

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- /.content-wrapper-->
@endsection


