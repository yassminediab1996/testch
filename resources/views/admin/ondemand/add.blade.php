    @extends('admin.layouts.app_en')
@section('title')
  Add  Map
@endsection
@section('content')
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<style>
     #map {
        height: 600px;  /* The height is 400 pixels */
        width: 97%;  /* The width is the width of the web page */
        margin:0;
        padding:0;
        margin-top: -20px;
        margin-left: -20px;
    }
</style>
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
                  <a   href="#" onclick="openNav()" style="float: right;    margin-top: 20px;">

                    <i class="ti-align-left" style="    font-size: 30px;"></i>
                    
                   </a>
                   <div id="mySidenav" class="sidenav" style=" background-color:white;    width: 400px; !important">

                      <a href="javascript:void(0)" class="closebtn" style="color:black !important;" onclick="closeNav()">&times;</a>
                      <a href="#">About</a>
                      <a href="#">Services</a>
                      <a href="#">Clients</a>
                      <a href="#">Contact</a>
                   </div>
            
  
      <div id="map" class="margin-buttom:20px;"></div>
    <br>
    
    <div class="form-group">
        <select  class="form-control"   id="mapppp">
          @foreach(App\AdminModel\City::where('parent' , 0)->get() as $country)
           @foreach(App\AdminModel\City::where('parent' ,$country->id)->get() as $gover1)
             @foreach(App\AdminModel\City::where('parent' ,$gover1->id)->get() as $gover) 
                <option data-lng="31.1597585" data-lat="30.0121059" value="{{$gover->id}}" >{{$gover->name_ar}}</option>
             @endforeach
           @endforeach
          @endforeach
        </select>
    </div>
 
  <script type="text/javascript">
  $( document ).ready(function() {
   
});
 function openNav() {
      document.getElementById("mySidenav").style.width = "400px";
      document.getElementById("mySidenav").style.display = "block";
       document.getElementById("map").style.width = "70%";
    }
    
    function closeNav() {
      document.getElementById("mySidenav").style.width = "0";
      document.getElementById("map").style.width = "97%";

    }
</script>
   
    <script>
         var map;
         var markers;
         var marker;
    $( document ).ready(function() {
        
            $( "#mapppp" ).change(function() {
                var lng = $("option").attr('data-lng');
                var lat = $("option").attr('data-lat');
                var locationcenter = new google.maps.LatLng(lat, lng);
                map.setCenter(locationcenter);
                map.setZoom(12);
                marker.setPosition(locationcenter);
            
    });
});
  
 function initMap() {
    // The location of Uluru  ,
    var uluru = {lat: 30.069930, lng: 31.357671};
    // The map, centered at Uluru
     map = new google.maps.Map(
    document.getElementById('map'), {zoom: 8, center: uluru});
    // The marker, positioned at Uluru
     markers = {};
    @foreach($getmaps as $map)
        var id = '{{$map->id}}'; //
        marker = new google.maps.Marker({ // create a marker and set id
        id: id,
        map: map,
        position:{lat:{{$map->lat}},lng:{{$map->lng}}},
        title: "marker",
        });
    var infowindow = new google.maps.InfoWindow();
            var content = "<h3> pharmacy name:{{$map->name}}</h3>";
    
            google.maps.event.addListener(marker, 'click', (function (marker, content, infowindow) {
                return function () {
                    infowindow.setContent(content);
                    infowindow.open(map, marker);
                };
            })(marker, content, infowindow));
    @endforeach
    }
    </script>
 <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBXIcodvTR3FJ7rXW7y3rsRNc_K6XHvAC0&callback=initMap">
@endsection