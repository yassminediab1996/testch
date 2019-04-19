    @extends('admin.layouts.app_en')
@section('title')
    pharmacy
@endsection
@section('content')
   <!-- row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="flexbox padd-10 bb-1">
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="data-table-advance" class="table table-lg table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name of pharmacy</th>
                                <th>lat</th>
                                <th>lng</th>
                                <th>address</th>
                               
                                <th>count</th>
                                <th>created at</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach($getmaps as $case)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$case->name}}</td>
                                    <td>{{$case->lat}}</td>
                                    <td>{{$case->lng}}</td>
                                    <td>{{$case->address}}</td>
                                   
                                    <td>
                                    @php
                                      $count = App\AdminModel\PharmMon::where('parmact',$case->id)->count();
                                    @endphp
                                    {{$count}}
                                    </td>
                                    <td>{{$case->created_at}}</td>
                                    
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
    @endsection