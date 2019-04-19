@extends('admin.layouts.app_en')
@section('title')
    New Order
@endsection
@section('style')
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
@endsection
@section('content')
<style>
body {
  font-family: "Lato", sans-serif;
}

.sidenav {
  float: right;
    height: 100%;
    display: none;
    position: absolute;
    z-index: 1;
    top: 250;
    right: 0;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
    width: 400px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  width: 400px !imporatnt;
  font-size: 36px;
  margin-left: 50px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;    }
  .sidenav a {font-size: 18px;}
}
</style>
  <div id="mySidenav" class="sidenav" style=" background-color:white;    width: 400px; !important">
      <a href="javascript:void(0)" class="closebtn" style="color:black !important;" onclick="closeNav()">&times;</a>
      <div id="get_details"></div>
  </div>
    <!-- row -->
    @include('website.notfi')
    <div class="row" id="all">
        <div class="col-md-12">
            <div class="card">
                <div class="flexbox padd-10 bb-1">
                    <h4 class="mb-0">All Orders </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="data-table-advance" class="table table-lg table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>client name</th>
                                <th>client Phone</th>
                                <th>Delivery Date</th>
                                <th>Status</th>
                                <th>change state</th>
                                <th>Details</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $c = 1;
                            @endphp
                            @foreach($getall as $all)
                            @php
                             $mon = App\Ondemand_order::find($all->ondemand_id);
                            
                             $time = strtotime($mon->updated_at);
                            $final = date("Y-m-d", strtotime("+1 month", $time));
                            @endphp
                                <tr>
                                    <td>{{$c}}</td>
                                    <td>{{$mon->name}}</td>
                                    <td>{{$mon->phone}}</td>
                                   	@php
								     $time = strtotime($mon->updated_at);
   								     $count = date("m", $time) - date('m'); // get diff in month
                                     if ($count < 1){
                                        $final = date("Y-m-d", strtotime("+".($count*-1)." month", $time));
                                     }else{
                                      $final = date("Y-m-d",$time);
                                     }
    								 $now = DateTime::createFromFormat('Y-m-d', date('Y-m-d')); 
                                     $dateToCompare = DateTime::createFromFormat('Y-m-d', $final); //match format of db datetime
                                     $diff = $now->diff($dateToCompare);
								@endphp
								<td>{{$final}}</td>

							     <td>
                                        @if($all->state == 0)<div class="label cl-warning bg-warning-light">open</div>
                                          @elseif($all->state == 1)<div class="label cl-warning bg-warning-light">confirm</div>
                                            @elseif( $all->state == 2)<div class="label cl-warning bg-warning-light">preparing</div>
                                              @elseif( $all->state == 3)<div class="label cl-warning bg-warning-light">delevering</div>
                                                 @elseif($all->state == 4)<div class="label cl-success bg-success-light">paied</div>
                                                  @elseif($all->state == 6)<div class="label cl-success bg-danger-light">undone</div>
                                                   @elseif($all->state == 5)<div class="label cl-danger bg-danger-light">canceled</div>
                                      @endif</td>
                                  
                                    <td>
                                        <select class="form-control" style="width: 40%;" style=" border-style: solid !important; border-color: red !important;" onchange="orderchang(this.value,{{$all->id}} , {{$mon->id}});">
                                           @php
                                             $arr = array();
                                             for($i = $all->state ; $i > 0  ; $i--)
                                             {
                                                 $arr[] = $i;
                                             }
                                        
                                          @endphp
                                          
                                        @if($all->state == 0)
                                           <option value="0"  @if($all->state == 0) selected   @endif >Open</option>
                                            <option value="1"  @if($all->state == 1) selected @endif>confirm</option>
                                            <option value="2"  @if($all->state == 2) selected  @endif  disabled >preparing</option>
                                            <option value="3"  @if($all->state == 3) selected  @endif  disabled >delevering</option>
                                            <option value="4"  @if($all->state == 4) selected  @endif   disabled > Done</option>
                                            <option value="4"  @if($all->state == 6) selected  @endif   disabled > Undone</option>
                                            <option value="5"  @if($all->state == 5) selected  @endif >Cancel</option>
                                        @else
                                            <option value="0"  @if($all->state == 0) selected  @endif @if(in_array('0',$arr))  disabled @endif>Open</option>
                                            <option value="1"  @if($all->state == 1) selected  @endif @if(in_array('1',$arr))  disabled @endif>confirm</option>
                                            <option value="2"  @if($all->state == 2) selected  @endif @if(in_array('2',$arr))  disabled @endif>preparing</option>
                                            <option value="3"  @if($all->state == 3) selected  @endif @if(in_array('3',$arr))  disabled @endif>delevering</option>
                                            <option value="4"  @if($all->state == 4) selected  @endif @if(in_array('4',$arr))  disabled @endif> Done</option>
                                            <option value="6"  @if($all->state == 6) selected  @endif @if(in_array('6',$arr))  disabled @endif>Undone</option>
                                            <option value="5"  @if($all->state == 5) selected  @endif @if(in_array('5',$arr))  disabled @endif>Cancel</option>
                                      @endif
                                        </select>
                                   </td>
                                   <td>
                                       <a href="#" onclick="openNav({{$mon->id}})" style="float:right;margin-top: 20px;">
                                          <button class="btn btn-success btn-md">details</button>
                                       </a>
                                       
                                   </td>
                                   
                                </tr>
                                 @php $c= $c +1; @endphp
                            @endforeach
                         
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script>
      function orderchang(id,order , mon)
      {
          
           var id = id ;
        $.get("{{ url('17$es12/pharmacy_ondemand/chngmon') }}?id="+id+"&order="+order+"&monid="+mon, function(data, status) {
            if(data == 1)
            {
                console.log('done');
                $("#id").val(id);
                $("#order").val(order);
                $("#monid").val(mon);
                $("#addproduct").modal();
            }
            else if(data == 2){
                   $("#id_cancel").val(id);
                   $("#order_cancel").val(order);
                   $("#monid_cancel").val(mon);
                   $("#pop_cancel").modal();
            }
             else if(data == 3){
                   $("#id_undone").val(id);
                   $("#order_undone").val(order);
                   $("#monid_undone").val(mon);
                   $("#undone_cancel").modal();
            }
            else{
              location.reload();
            }
        });
      }
  </script>
        <script type="text/javascript">
  $( document ).ready(function() {
   
});
    function openNav(id) {
        document.getElementById("mySidenav").style.width = "500px";
        document.getElementById("mySidenav").style.display = "block";
        document.getElementById("all").style.width = "60%";
        $.get("{{ url('17$es12/pharmacy_ondemand/get_details_mon') }}?id="+id, function(data, status) {
            $( "#get_details" ).empty();
            $( "#get_details" ).append(data);
        });
        
    }
    
    function closeNav() {
      document.getElementById("mySidenav").style.width = "0";
      document.getElementById("all").style.width = "97%";

    }
</script>
        <!-- Add Product Popup -->
        <div class="add-popup modal fade" id="addproduct" tabindex="-1" role="dialog" aria-labelledby="addproduct">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header " style="    background: #26af48;">

                        <ul class="card-actions icons right-top">
                            <li>
                                <a href="javascript:void(0)" class="text-white" data-dismiss="modal" aria-label="Close">
                                    <i class="ti-close"></i>
                                </a>
                            </li>
                        </ul>
                        <h4 class="modal-title">Add more details</h4>
                        <div class="user-avatar-wrapper">
                           
                        </div>
                    </div>
                    <form action="{{url('17$es12/pharmacy_ondemand/adddetails')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
    
                        <div class="modal-body">
                            <input type="hidden" name="id" id="id">
                            <input type="hidden" name="order" id="order">
                            <input type="hidden" name="monid" id="monid">
                            <div class="form-group">
                                <label class="control-label">Date</label>
                                <div class="input-group">
                                    <span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
                                    <input type="date" name="date" class="form-control no-bl" value="" required>
                                </div>
                            </div>
                            
                             <div class="form-group">
                                <label class="control-label">Total</label>
                                <div class="input-group">
                                    <span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
                                    <input type="number" name="total" class="form-control no-bl" value="" required>
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
        <!-- End Product Popup -->
        <div class="add-popup modal fade" id="pop_cancel" tabindex="-1" role="dialog" aria-labelledby="addproduct">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="    background: #26af48;">
                        <ul class="card-actions icons right-top">
                            <li>
                                <a href="javascript:void(0)" class="text-white" data-dismiss="modal" aria-label="Close">
                                    <i class="ti-close"></i>
                                </a>
                            </li>
                        </ul>
                        <h4 class="modal-title">Add  Your Reason</h4>
                        <div class="user-avatar-wrapper">
                           
                        </div>
                    </div>
                    <form action="{{url('17$es12/pharmacy_ondemand/resone_cancel')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
    
                        <div class="modal-body">
                            <input type="hidden" name="id" id="id_cancel">
                            <input type="hidden" name="order" id="order_cancel">
                            <input type="hidden" name="monid" id="monid_cancel">
                            <div class="form-group">
                                <label class="control-label">Reasone</label>
                                <div class="input-group">
                                    <span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
                                    <textarea type="text" name="resone" class="form-control no-bl" value="" required></textarea>
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
        
          <!-- End Product Popup -->
        <div class="add-popup modal fade" id="undone_cancel" tabindex="-1" role="dialog" aria-labelledby="addproduct">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="    background: #26af48;">
                        <ul class="card-actions icons right-top">
                            <li>
                                <a href="javascript:void(0)" class="text-white" data-dismiss="modal" aria-label="Close">
                                    <i class="ti-close"></i>
                                </a>
                            </li>
                        </ul>
                        <h4 class="modal-title">Add  Your Reason</h4>
                        <div class="user-avatar-wrapper">
                           
                        </div>
                    </div>
                    <form action="{{url('17$es12/pharmacy_ondemand/resone_undone')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
    
                        <div class="modal-body">
                            <input type="hidden" name="id" id="id_undone">
                            <input type="hidden" name="order" id="order_undone">
                            <input type="hidden" name="monid" id="monid_undone">
                            <div class="form-group">
                                <label class="control-label">Reasone</label>
                                <div class="input-group">
                                    <span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
                                    <textarea type="text" name="resone" class="form-control no-bl" value="" required></textarea>
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
        
@endsection


