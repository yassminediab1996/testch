<form>
    <div class="form-group" >
       
         <strong > name :</strong> {{$getmounth->name}}
         <br>
         <strong > address :</strong> {{$getmounth->address}}
         <br>
         <strong > phone :</strong> {{$getmounth->phone}}
         <br>
         <strong > date :</strong> {{$getmounth->date}}
         <br>
    </div>
</form>
<a ><img src="{{asset('uploads/files/'.$getmounth->img)}}"   alt="Avatar"></a>

@if($getmounth->type_id != null)
<h3>data of partner</h3>
 @php
   $get = App\AdminModel\Partner::find($getmounth->type_id);
 @endphp
<form>
    <div class="form-group" >
       
         <strong > name :</strong> {{$get->name}}
         <br>
         <strong > address :</strong> {{$get->address}}
         <br>
         <strong > phone :</strong> {{$get->phone}}
         <br>
         <strong > email :</strong> {{$get->email}}
         <br>
    </div>
</form>
@endif

						