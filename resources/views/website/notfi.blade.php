<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@if(count($errors))
    @foreach($errors->all() as $error)
        @php 
            echo "<script>";
            echo ' swal("عفوا","' . $error .'","error");';
            echo '</script>';
        @endphp
    
    @endforeach
    
@endif

@if(session()->has('success_message'))
        @php 
            echo "<script>";
            echo ' swal("حسنا","' . session('success_message') .'","success");';
            echo '</script>';
           session()->forget('success_message');
        @endphp
 
@endif

@if(session()->has('success_message2'))
        @php 
            echo "<script>";
            echo ' swal("حسنا","' . session('success_message2') .'","success");';
            echo '</script>';
           session()->forget('success_message2');
        @endphp
     
@endif
@if(session()->has('error_message'))
         @php 
            echo "<script>";
            echo ' swal("عفوا","' . session('error_message') .'","error");';
            echo '</script>';
                session()->forget('error_message');
        @endphp
           
@endif
