@extends('website.app_en')

@section('title')
	Package
@endsection

@section('content')
<style>
    .product-thumb-link > img {
 
    width: auto;
    height:  250px;
}
input[type=checkbox], input[type=radio] {

   
}
h2{
       color: #329032;
}
.content-grid-boxed {
    -webkit-box-shadow: 0 14px 25px rgba(0,0,0,.16);
    padding: 40px 40px 0 40px;
    box-shadow: 0 14px 25px rgba(0,0,0,.16);    
}
.item-product-list > span {
        font-size: 20px;
}
</style>

	<div id="content">
		<div class="content-page page-product-hot-deal">
			<div class="container">
				<div class="content-grid-boxed">
                                    <div class="list-pro-color">
                                        <div class="item-product-list">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <span>النوع:</span>
                                                </div>
                                                <div class="col-md-10">
                                                    <input type="radio" value="1" id="sex" name="sex" />
                                                    <label>ذكر</label>
                                                    <input type="radio" value="2" id="sex" name="sex" />
                                                    <label>انثى</label>
                                                </div>
        
        
                                                <div class="col-md-2">
                                                    <span>السن:</span>
                                                </div>
                                                <div class="col-md-10">
                                                    <input type="radio" value="18-24" id="age" name="age" />
                                                    <label>18-24</label>
                                                    <input type="radio" value="25-34" id="age" name="age" />
                                                    <label>25-34</label>
                                                    <input type="radio" value="35-65" id="age" name="age" />
                                                    <label>35-65</label>
                                                </div>
        
                                                <button onclick="package()" class="btn btn-success btn-md" style="    margin: 40px 0;">احصل
                                                    على الباقات</button>
                                            </div>
                                        </div>
                                        <div class="list-product-hot-deal" id="pack">
                        					
                        				</div>
                                    </div>
                                </div>
			
			
				<!-- End Sort PagiBar -->

			</div>
		</div>
	</div>
	<!-- End Content -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>

<script>
         function package(){
             document.getElementById('pack').innerHTML = '';
             var sex = $('input[name=sex]:checked').val();
             var age = $('input[name=age]:checked').val();
            
             $.get("{{ url('GetPackge') }}?sex="+sex+'&age='+age, function(data, status){
                $('#pack').append(data);
             });
         }

 
    	function FavProduct(id,fav) {

        $.get("{{ url('updateFavPro') }}?id="+id+'&fav='+fav, function(data, status){

             location.reload();
        });
    }


</script>
@endsection