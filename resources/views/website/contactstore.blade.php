@extends('website.app_en')
@section('title')
	contact
@endsection
@section('content')
<style>
    .astyle{
            color: black !important;

    }
</style>
<style>
         #mapadd {
    height: 400px;  /* The height is 400 pixels */
    width: 100%;  /* The width is the width of the web page */
    }
    
        #mapedit {
    height: 400px;  /* The height is 400 pixels */
    width: 100%;  /* The width is the width of the web page */
    }
</style>
	<div id="content">
		<div class="content-page">
			<div class="container">
				<div class="contact-map">
				    <div id="mapadd"></div>
                        <input type="hidden" name="lat" id="maps_latitude" value="">
                        <input type="hidden" name="lng" id="maps_longitude" value="">
				</div>
				<!-- End Map -->
				<div class="contact-info-page">
					<div class="list-contact-info">
						<div class="row">
						
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="item-contact-info">
									<a class="contact-icon astyle icon-phone" href="#"><i class="fa fa-phone"></i></a>
									<h2>اتصل بنا: <a href="# " class="astyle">01000644422</a></h2>
								</div>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="item-contact-info last-item">
									<a class="contact-icon icon-email" href="mailto:7uptheme@gmail.com"><i class="fa fa-envelope"></i></a>
									<h2><a class="astyle" href="mailto:7uptheme@gmail.com">info@chefaa.com</a></h2>
								</div>
							</div>
						</div>
					</div>
					<p class="desc">If the supplier fails to ship your products on time or the product quality does not meet the standards set in your contract, Aloshop will refund the covered amount of your payment.</p>
				</div>
				<div class="contact-form-page">
					<h2> تواصل معنا </h2>
					<div class="form-contact">
					    @include('website.notfi')
						<form action="{{url('contactstore')}}" method="post">
						      {{csrf_field()}}
						      <input type="hidden" name="type_id" value="2">
							<div class="row">
							    <input type="hidden" name="user_type" value="4">
								<div class="col-md-3 col-sm-4 col-xs-12">
								الأسم	<input type="text" name="name" >
								</div>
								<div class="col-md-3 col-sm-4 col-xs-12">
								الإيميل	<input type="text" name="email">
								</div>
								<div class="col-md-3 col-sm-4 col-xs-12">
								رقم الهاتف	<input type="text" name="phone" >
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12">
								الرسالة	<textarea name="message" cols="30" rows="8">رسالة</textarea>
									<input type="submit" value="ارسال" />
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Content -->
	     
<script>
    function initMap() {
                console.log('sdsd');

        // The location of Uluru  ,
        var uluru = {lat:29.9601273, lng:31.2515482};
        // The map, centered at Uluru
        var map1 = new google.maps.Map(
            document.getElementById('mapadd'), {zoom: 8, center: uluru});
        // The marker, positioned at Uluru
        var marker = new google.maps.Marker({position: uluru, map: map1,draggable:true});
        new google.maps.event.addListener( marker, 'dragend', function ( event ) {
            document.getElementById( "maps_latitude" ).value = this.getPosition().lat();
            document.getElementById( "maps_longitude" ).value = this.getPosition().lng();
        } );
        
        
        //   var map2 = new google.maps.Map(
        //     document.getElementById('mapedit'), {zoom: 8, center: uluru});
        // // The marker, positioned at Uluru
        // var marker = new google.maps.Marker({position: uluru, map: map2,draggable:true});
        // new google.maps.event.addListener( marker, 'dragend', function ( event ) {
        //     document.getElementById( "maps_latitude_edit" ).value = this.getPosition().lat();
        //     document.getElementById( "maps_longitude_edit" ).value = this.getPosition().lng();
        // } );
    }
    
      
</script>

 <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBKI9M20CP-oozOEk07_pphw5TZmYBu-JU&callback=initMap">
 </script>
@endsection