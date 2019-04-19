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
 $getorders = App\Order::where('state',2)->get();
@endphp
    <!-- row -->
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
                                <th>Date Created</th>
                                <th>Action</th>
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
                                    <td>{{$order->created_at}}</td>
                                    <td>
                                       <a href="{{url('17$es12/order/invoice/'.$order->id)}}"> <button class="btn btn-danger btn-md" >Details</button></a>
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
  
@endsection


