<style>
    h3{
        margin-left: 20px;
    }
    p{
        margin-left: 20px;
    }
</style>
	@php
								     $time = strtotime($get_monthly->date);
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
<h4 style="margin-left: 30%;">More Details</h4>
<div style="">
    <p><strong>Name : </strong>{{$get_monthly->name}}</p>
     <p><strong>Address : </strong>{{$get_monthly->address}}</p>
      <p><strong>Client Phone : </strong>{{$get_monthly->phone}}</p>
    <p><strong>Delivery date : </strong>{{$final}}</p>
 <img src="{{asset('uploads/files/'.$get_monthly->img)}}" >