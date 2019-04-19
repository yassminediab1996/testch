@extends('admin.layouts.app_en')
@section('title')
    Package
@endsection
@section('content')
	<style>
		select{
			Font-family: 'FontAwesome';
		}
	</style>
    <!-- row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="flexbox padd-10 bb-1">
                    <h4 class="mb-0">Package Lists</h4>
                    <a href="{{url('17$es12/package/add')}}" class="btn gredient-btn" title="Add Category">
                        Add Package
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="data-table-advance" class="table table-lg table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name In Arabic</th>
                                <th>Image</th>
                                <th>Desc</th>
                                <th>Price</th>
                                <th>discount</th>
                                <th>min_num</th>
                                <th>sex</th>
                                <th>age range</th>
                                <th>products</th>
                                <th>Date Created</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach($packages as $pac)
                                <tr>
                                    <td>{{$i++}}</td>
                             
                                    <td>{{$pac->name_ar}}</td>
                                    <td><a href="#"><img src="{{asset('uploads/files/'.$pac->img)}}" class="avatar" alt="Avatar"></a></td>
                                    <td>{!!  $pac->description !!}</td>
                                    <td>{{$pac->price}}</td>
                                    <td>{{$pac->discount}}</td>
                                    <td>{{$pac->min_num}}</td>
                                    <td>@if($pac->sex == 1) man @else famale @endif</td>
                                    <td>{{$pac->age}}</td>
                                    <td>
                                    
                                    @if($pac->products != null)
                                     @foreach(explode(',' ,$pac->products) as $pro)
                                     
                                      {{App\AdminModel\Product::find($pro)->name_ar}}
                                      <br>
                                    
                                     @endforeach
                                    @endif
                                    </td>
                                    <td>{{$pac->created_at}}</td>
                                    <td>
                                        <a href="{{url('17$es12/package/edit/'.$pac->id)}}" class="settings"   title="Settings" ><i class="ti-settings"></i></a>
                                        <a href="#" class="delete"  onclick="delCat({{$pac->id}})" title="Delete" data-toggle="tooltip"><i class="ti-trash"></i></a>
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
            $("#id_pac_del").val(id);
            $("#remove_modal").modal();
        }

        function Delete() {
            var id    = $("#id_pac_del").val();


            $.get("{{ url('17$es12/package/delete') }}?id="+id, function(data, status){
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
                    <input type="hidden" id="id_pac_del" class="form-control" value="">
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
