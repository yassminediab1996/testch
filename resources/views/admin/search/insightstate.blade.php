@extends('admin.layouts.app_en')
@section('title')
    insights
@endsection
@section('content')
	<style>
		select{
			Font-family: 'FontAwesome';
		}
	</style>
	    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
       
        <div class="row">
        <div class="col-md-5"> 
         <div class="form-group">
           <label>choose gover </label>
           <select required name="goverid" class="form-control" onchange="getstate(this.value)" >
               @foreach(App\AdminModel\City::where('parent' , 0)->get() as $country)
                 @foreach(App\AdminModel\City::where('parent' , $country->id)->get() as $gover)
                  
                <option value="{{$gover->id}}" >{{$gover->name_ar}}</option>
               @endforeach
                @endforeach
           </select>
        </div>
        </div>
       <div class="clearfix"></div>
        <div class="col-md-5"> 
           <div class="form-group">
       <label> choose state</label>
       <select required class="form-control" id="sub_id_add" name="state_id">
           @php
            $getfirstcountry = App\AdminModel\City::where('parent' , 0)->first() ;
            $getfirstgovern = App\AdminModel\City::where('parent' , $getfirstcountry->id)->first() ;
           @endphp
           @foreach(App\AdminModel\City::where('parent' ,$getfirstgovern->id)->get() as $gover)
            <option value="{{$gover->id}}" selected>{{$gover->name_ar}}</option>
           @endforeach
       </select>
         </div>
         </div>
         </div>
        <button class="btn btn-danger btn-md" id="insightdate" type="button">send</button>
    </div>
        <br> <br>
	<div class="row">
		<div class="col-md-6 col-sm-12" style="display:none;" id="linechart">
			<div class="card">
				<div class="card-header">
					<h4 class="mb-0">Line Chart</h4>
				</div>
				<div class="card-body">
					<canvas id="line-chart" width="800" height="450"></canvas>
				</div>
			</div>
		</div>
		<div class="col-md-6 col-sm-12" style="display:none;" id="detalis">
			<div class="card">
				<div id="data"></div>
			</div>
		</div>
     </div>
     <script>
          function getstate(id) {
               console.log(id);
                 $.ajax({
                     type: "GET",
                     url: "/getallstate",
                    dataType: "html",
                    data: {
                        id : id
                    },
                     success: function (response) {
                         var data = eval('(' + response + ')');
                         if (data.length > 0) {
                             document.getElementById('sub_id_add').innerHTML = '';
                             var x = document.createElement('option');
                            x.value = 0;
                            x.disabled = true;
                             x.selected = true;
                             x.appendChild(document.createTextNode('اختار منطقتك  '));
                            document.getElementById('sub_id_add').appendChild(x);
        
                             for (var i = 0; i < data.length; i++) {
                                var x = document.createElement('option');
                                 x.value = data[i].id;
                                 x.appendChild(document.createTextNode(data[i].name_ar));
                                 document.getElementById('sub_id_add').appendChild(x);
                             }
        
                         } else {
                             document.getElementById('sub_id_add').innerHTML = '';
                             var x = document.createElement('option');
                            x.value = 0;
                            x.disabled = true;
                             x.selected = true;
                             x.appendChild(document.createTextNode(' لا يوجد مناطق  '));
                            document.getElementById('sub_id_add').appendChild(x);
                         }
                     },
                    error: function (e) {
                         document.getElementById('sub_id_add').innerHTML = '';
                     }
                 });
     }
     </script>
@endsection
@section('js')
<script>

 
 $('#insightdate').click(function(){
     insightdate();
     console.log(5556);
 })

  function insightdate(){
   var state_id = $('#sub_id_add').val();
  
    $.ajax({
         type: "GET",
         url: <?php echo '"' . url('17$es12/search/insightstate') . '"' ?>,
       dataType: "html",
        data: {
            state_id : state_id,
           },
             success: function (response) {
                  var data = eval('(' + response + ')');
                if(data.length == 0)
                {
                    alert('not found');
                }else{
                      $("#linechart").css("display", "block"); 
                       $.ajax({
                         type: "GET",
                         url: <?php echo '"' . url('17$es12/search/getdatainsight') . '"' ?>,
                         dataType: "html",
                        data: {
                            data : data,
                           
                           },
                             success: function (response) {
                                 $("#detalis").css("display", "block");
                                 $('#data').append(response)
                             }, error: function (e) {
                                     }
                            });
                }
                 var jsonStr = '[]';
                  var obj = JSON.parse(jsonStr);
                  console.log(obj)
                  obj.push({
        			data: data[0]['count'],
        			label: 'count of search',
        			borderColor: "#3e95cd",
        			fill: false,
                  });
                //  console.log(obj)
                //  console.log(data[0]['date'])
            new Chart(document.getElementById("line-chart"), {
        	  type: 'line',
        	  data: {
        		labels:data[0]['date'],
        		datasets: obj
        	  },
        	  options: {
        		title: {
        		  display: true,
        		  text: 'insight ' + ' '+ data[0]['name']
        		}
        	  }
    	});
             }, error: function (e) {
             }
    });
 }
</script>

@endsection
