@extends('admin.layouts.app_en')
@section('title')
    Case
@endsection

@section('content')
 @if($getdonets->count() > 0)
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="flexbox padd-10 bb-1">
                    <h4 class="mb-0">User Donates in {{$getdonets[0]->case->name_ar}}</h4>
                   
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="data-table-advance" class="table table-lg table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Donator</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th> Amount</th>
                                <th>Date Created</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach($getdonets as $case)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$case->name}}</td>
                                    <td>{{$case->email}}</td>
                                    <td>{{ $case->phone}}</td>
                                    <td>{{$case->qty}}</td>
                                    <td>{{$case->created_at}}</td>
                                    <td>
                                        <a href="#" class="delete"  onclick="delCat({{$case->id}})" title="Delete" data-toggle="tooltip"><i class="ti-trash"></i></a>
                                        @if($case->approval == 0)
                                        <button  class="btn btn-success btn-md" onclick="updatecase({{$case->id}} , 1)" >approval</button>
                                        @else 
                                         <button  class="btn btn-danger btn-md" onclick="updatecase({{$case->id}} , 0)" >unapproval</button>
                                        @endif
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
    @else
   <h1>لا يوجد متبرعين لهذه  الحاله</h1>  
    @endif
    @endsection
    <script>
        function updatecase(id , ap)
        {
             $.get("{{ url('17$es12/case/updatecase') }}?id="+id+'&ap='+ap, function(data, status){
                if(data == 1)
    			{
                    location.reload();
    			}
            });
        }
        
         function delCat(id){
            $("#id_caseuser_del").val(id);
            $("#remove_modal").modal();
        }

        function Delete() {
            var id    = $("#id_caseuser_del").val();


            $.get("{{ url('17$es12/case/deleteusercase') }}?id="+id, function(data, status){
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
                    <input type="hidden" id="id_caseuser_del" class="form-control" value="">
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="Delete()">Yes, delete</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">No thanks</button>
                </div>
            </div>
        </div>
    </div>