<style>
    h3{
        margin-left: 20px;
       
    }
</style>
<h2 style="margin-left: 30%;">More Details</h2>
<h3 >name : {{$get_monthly->name}}</h3> 
<h3>address : {{$get_monthly->address}}</h3> 
<h3>email : {{$get_monthly->email}}</h3>
<h3>date : {{$get_monthly->date}}</h3>
<h3>prescription :</h3> <img src="{{asset('uploads/files/'.$get_monthly->img)}}" >