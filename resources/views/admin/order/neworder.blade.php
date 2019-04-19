@extends('admin.layouts.app_en')
@section('title')
    New Order
@endsection
@section('style')
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
@endsection
@section('content')
@php
 $getorders = App\Order::all();
@endphp
    <!-- row -->
    @include('website.notfi')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="flexbox padd-10 bb-1">
                    <h4 class="mb-0">New Order </h4>
                  
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="data-table-advance" class="table table-lg table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>client name</th>
                                <th>client address</th>
                                <th>total</th>
                                <th>method</th>
                                <th>Date Created</th>
                                <th>Status</th>
                                <th>invoice</th>  
                                <th>change state</th>
                                <th>action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach($getorders as $order)
                                <tr>
                                    <td>{{$order->id}}</td>
                                    <td>{{$order->user->name}}</td>
                                    <td>{{$order->user->address}}</td>
                                    <td>{{$order->total}}</td>
                                    <td>{{$order->payment}}</td>
                                    <td>{{$order->created_at}}</td>
                                    <td>
                                          @if($order->state == 1)<div class="label cl-warning bg-warning-light">open</div>
                                            @elseif( $order->state == 2)<div class="label cl-warning bg-warning-light">process</div>
                                              @elseif( $order->state == 3)<div class="label cl-warning bg-warning-light">On Way</div>
                                                 @elseif($order->state == 4)<div class="label cl-success bg-success-light">paied</div>
                                                   @elseif($order->state == 5)<div class="label cl-danger bg-danger-light">canceled</div>
                                      @endif</td>
                                    <td style="display:inline">
                                        <a href="{{url('17$es12/order/invoice/'.$order->id)}}" target="_blank" rel="noopener noreferrer" > <button class="btn btn-success btn-md" >Details</button></a>
                                    </td>
                                    <td>
                                        <select class="form-control" style="width: 40%;" style=" border-style: solid !important; border-color: red !important;" onchange="orderchang(this.value,{{$order->id}});">
   
                                            <option value="1" @if($order->state == 1) selected @endif>Open</option>
                                            <option value="2"  @if($order->state == 2) selected @endif>Process</option>
                                            <option value="3"  @if($order->state == 3) selected @endif>On Way</option>
                                            <option value="4"  @if($order->state == 4) selected @endif>Cash Done</option>
                                            <option value="5"  @if($order->state == 5) selected @endif>Cancel</option>
                                        </select>
                                   </td>
                                   <td style="display:inline">
                                        <a href="{{url('17$es12/order/delete/'.$order->id)}}"  > <button class="btn btn-danger btn-md" >Delete</button></a>
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
  <script>
      function orderchang(id,order)
      {
           console.log(id);
            console.log(order);
           var id = id ;
        $.get("{{ url('processorder') }}?id="+id+"&order="+order, function(data, status) {
            location.reload();
        });
      }
  </script>
@endsection


