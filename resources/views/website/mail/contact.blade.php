name :  {{$get->name}}
<br>
email : {{$get->email}}
<br>
message : {{$get->message}}
<br>
type : @if($get->user_type == 1) patient @elseif($get->user_type == 2) pharmacy @elseif($get->user_type == 3) company @elseif($get->user_type == 4) from store @endif