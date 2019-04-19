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
                <label class="label-control"> from </label>
                <input name="fromdatae" type="date" id="fromdate" class="form-control">
            </div>
        </div>  
        <div class="col-md-5"> 
            <div class="form-group">
                <label class="label-control">to</label>
                 <input name="todatae" type="date" id="todate" class="form-control">
            </div>
        </div>    
        </div>
        <div class="row">
        <div class="col-md-5"> 
         <div class="form-group">
           <label>choose gover </label>
           <select required name="goverid" class="form-control" onchange="getstate(this.value)" id="goverid">
               <option selected disabled>select</option>
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
                          <option disabled selected>selected</option>

                       @php
                        $getfirstcountry = App\AdminModel\City::where('parent' , 0)->first() ;
                        $getfirstgovern = App\AdminModel\City::where('parent' , $getfirstcountry->id)->first() ;
                       @endphp
                       @foreach(App\AdminModel\City::where('parent' ,$getfirstgovern->id)->get() as $gover)
                        <option value="{{$gover->id}}" >{{$gover->name_ar}}</option>
                       @endforeach
                 </select>
         </div>
         </div>
         </div>
        <button class="btn btn-danger btn-md" id="insightdate" type="button">send</button>
    
        <br> <br>
	    <div class="row">
		<div class="col-md-10 col-sm-12" style="display:none;" id="linechart">
			<div class="card" style="    margin-left: 150px;">

				<div class="card-header">
					<h4 class="mb-0">Line Chart</h4>
				</div>
				<div class="card-body">
					<canvas id="line-chart" width="1100" height="600"></canvas>
				</div>
			</div>
		</div>
	
     </div>
        <div class="row">
		<div class="col-md-10 col-sm-12"  id="linechartdefualt">
			<div class="card" style=" margin-left: 150px;">

				<div class="card-header">
					<h4 class="mb-0">Line Chart</h4>
				</div>
				<div class="card-body">
					<canvas id="line-chart-d" width="1100" height="600"></canvas>
				</div>
			</div>
		</div>
	
     </div>
    <!-- row -->
    <div class="row" id="detalis" style="visibility:hidden;">
        <div class="col-md-12">
            <div class="card">
                <div class="flexbox padd-10 bb-1">
                    <h4 class="mb-0">Search  Details</h4>
                </div>
                 @include('website.notfi')
                <div class="card-body">
                 <div class="table-responsive" id="datatablejs"> 
					
                               
                             </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
      
     <script>
          function getstate(id) {
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
     
        $("#linechartdefualt").css("display", "none");

     insightdate();
 });
$( document ).ready(function() {
   
    defualtlinechart();
});
  function insightdate(){
   var fromdate = $('#fromdate').val();
   var todate   = $('#todate').val();
   var state_id = $('#sub_id_add').val();
   var goverid  = $('#goverid').val();
   var data;
     
    $.ajax({
         type: "GET",
         url: <?php echo '"' . url('17$es12/search/insightdate') . '"' ?>,
         dataType: "html",
         data: {
            fromdate : fromdate,
            todate : todate,
            state_id : state_id,
            goverid : goverid,
           },
             success: function (response) {

              data = eval('(' + response + ')');
                      $("#linechart").css("display", "block");
                       

                       $.ajax({
                         type: "GET",
                         url: <?php echo '"' . url('17$es12/search/getdatainsight') . '"' ?>,
                         dataType: "html",
                        data: {
                            data : data,
                           },
                             success: function (response) {
                             document.getElementById('datatablejs').innerHTML = '';

                                    $("#detalis").css("visibility", "visible");

                                        $('#datatablejs').append(response)

                             }, error: function (e) {
                                 $("#linechart").css("display", "none"); 
                                   alert('no data available');

                                     }
                            });
                
                             var jsonStr = '[]';
                              var obj = JSON.parse(jsonStr);
                              obj.push({
                    			data: data[0]['count'],
                    			label: 'number of user',
                    			borderColor: "#3e95cd",
                    			fill: false,
                              });
                 // console.log(data[0]['date'])
            new Chart(document.getElementById("line-chart"), {

        	  type: 'line',
        	  size:91,
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
                 alert('no data available');
                 
             }
    });
 }
 
  function defualtlinechart(){
    $.ajax({
         type: "GET",
         url: <?php echo '"' . url('17$es12/search/defaultlinechart') . '"' ?>,
         dataType: "html",
         data: {
           
           },
             success: function (response) {
              data = eval('(' + response + ')');
                      $("#linechartdefualt").css("display", "block");
                       
                      $.ajax({
                         type: "GET",
                         url: <?php echo '"' . url('17$es12/search/defalultdata') . '"' ?>,
                         dataType: "html",
                        data: {
                            
                          },
                             success: function (response) {
                             document.getElementById('datatablejs').innerHTML = '';

                                    $("#detalis").css("visibility", "visible");

                                        $('#datatablejs').append(response)

                             }, error: function (e) {
                                 $("#linechart").css("display", "none"); 
                                  alert('no data available');

                                     }
                            });
                       
                             var jsonStr = '[]';
                              var obj = JSON.parse(jsonStr);
                              obj.push({
                    			data: data[0]['count'],
                    			label: 'number of user',
                    			borderColor: "#3e95cd",
                    			fill: false,
                              });
                 // console.log(data[0]['date'])
            new Chart(document.getElementById("line-chart-d"), {
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
                 alert('no data available');
                 
             }
    });
 }
</script>
<script>
//   function insightdate(){
//   var fromdate = $('#fromdate').val();
//   var todate   = $('#todate').val();
//   var state_id = $('#sub_id_add').val();
  
//     $.ajax({
//          type: "GET",
//          url: <?php echo '"' . url('17$es12/search/insightdate') . '"' ?>,
//         dataType: "html",
//         data: {
//             fromdate : fromdate,
//             todate : todate,
//             state_id : state_id,
//         },
//              success: function (response) {
//                  console.log(response)
//     //       //Line Chart
//     	        new Chart(document.getElementById("line-chart"), {
//         	  type: 'line',
//         	  data: {
        	      
//         		labels:[
        		
//         		 for (var i = 0; i < data.length; i++) 
//         		 {
//         		    echo '"'.i.'",';
//         		 }
//         		 ],
        	
//         		datasets: [{
//         			data: [86,114,106,106,107,111,133,221,783,2478],
//         			label: "Africa",
//         			borderColor: "#3e95cd",
//         			fill: false
//         		  }, 
//         		  {
//         			data: [86,114,106,106,107,111,133,221,783,2478],
//         			label: "Africa",
//         			borderColor: "#3e95cd",
//         			fill: false
//         		  },
//         		]
//         	  },
//         	  options: {
//         		title: {
//         		  display: true,
//         		  text: 'World population per region (in millions)'
//         		}
//         	  }
//     	});
//              }, error: function (e) {
             
//              }
//     });
//  }
 

	
// 	    new Chart(document.getElementById("pie-chart-date"), {
// 		type: 'pie',
// 		data: {
// 		  labels: [
		      
// 		      <?php
// 		        $getmonth = date('m');
// 		        $count = 0;
// 		        $getall = array();
// 		        foreach(App\search::whereMonth('created_at',"=",date("m", strtotime($getmonth)))->get() as $ser)
// 		        {
// 		            $date = date('Y-m-d', strtotime($ser->created_at));
//         		            $getall[$date][] = $ser;
// 		        }
// 		      ?>
		      
// 		      <?php
// 		        for($i = 1; $i <=  date('t'); $i++)
//                     {
//                       $dates = date('Y') . "-" . date('m') . "-" . str_pad($i, 2, '0', STR_PAD_LEFT);
//                       echo '"'.$dates.'",';
//                     }

// 		      ?>
		      
// 		      ],
// 		  datasets: [{
// 			label: "Search Statics",
// 			backgroundColor: [
// 			    <?php 
// 			    $rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f');
// 			    for($i = 1; $i <=  date('t'); $i++)
//                     {
//                         $color = $rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)];
//                       echo '"#' . $color . '",';
//                     }
// 			    ?>
// 			    ],
// 			data: [
// 			    <?php 
// 			    for($i = 1; $i <=  date('t'); $i++)
//                     {
//                       $dates = date('Y') . "-" . date('m') . "-" . str_pad($i, 2, '0', STR_PAD_LEFT);
//                       $date_ =isset($getall[$dates]) ? count($getall[$dates]) : 0 ;
//                       echo $date_ .",";
//                     }
// 			    ?>
// 			 ]
// 		  }]
// 		},
// 		options: {
// 		  title: {
// 			display: true,
// 			text: 'search insight by date'
// 		  }
// 		}
// 	});
//     	new Chart(document.getElementById("pie-chart"), {
// 		type: 'pie',
// 		data: {
// 		  labels: [
// 		      <?php
// 		        $getmonth = date('m');
// 		        $count = 0;
// 		        $getall = array();
// 		        foreach(App\search::whereMonth('created_at',"=",date("m", strtotime($getmonth)))->get() as $ser)
// 		        {
// 		            $date = date('Y-m-d', strtotime($ser->created_at));
//         		            $getall[$date][] = $ser;
// 		        }
// 		      ?>
		      
// 		      <?php
// 		        for($i = 1; $i <=  date('t'); $i++)
//                     {
//                       $dates = date('Y') . "-" . date('m') . "-" . str_pad($i, 2, '0', STR_PAD_LEFT);
//                       echo '"'.$dates.'",';
//                     }

// 		      ?>
		      
// 		      ],
// 		  datasets: [{
// 			label: "Search Statics",
// 			backgroundColor: [
// 			    <?php 
// 			    $rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f');
// 			    for($i = 1; $i <=  date('t'); $i++)
//                     {
//                         $color = $rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)];
//                       echo '"#' . $color . '",';
//                     }
// 			    ?>
// 			    ],
// 			data: [
// 			    <?php 
// 			    for($i = 1; $i <=  date('t'); $i++)
//                     {
//                       $dates = date('Y') . "-" . date('m') . "-" . str_pad($i, 2, '0', STR_PAD_LEFT);
//                       $date_ =isset($getall[$dates]) ? count($getall[$dates]) : 0 ;
//                       echo $date_ .",";
//                     }
// 			    ?>
// 			 ]
// 		  }]
// 		},
// 		options: {
// 		  title: {
// 			display: true,
// 			text: 'search insight by date'
// 		  }
// 		}
// 	});
// 		new Chart(document.getElementById("pie-chart-loc"), {
// 		type: 'pie',
// 		data: {
// 		  labels: [
// 		      <?php
// 		        $getmonth = date('m');
// 		        $count = 0;
// 		        $getall = array();
// 		        foreach(App\search::whereMonth('created_at',"=",date("m", strtotime($getmonth)))->get() as $ser)
// 		        {
// 		            $date = date('Y-m-d', strtotime($ser->created_at));
//         		            $getall[$date][] = $ser;
// 		        }
// 		      ?>
		      
// 		      <?php
// 		        for($i = 1; $i <=  date('t'); $i++)
//                     {
//                       $dates = date('Y') . "-" . date('m') . "-" . str_pad($i, 2, '0', STR_PAD_LEFT);
//                       echo '"'.$dates.'",';
//                     }

// 		      ?>
		      
// 		      ],
// 		  datasets: [{
// 			label: "Search Statics",
// 			backgroundColor: [
// 			    <?php 
// 			    $rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f');
// 			    for($i = 1; $i <=  date('t'); $i++)
//                     {
//                         $color = $rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)];
//                       echo '"#' . $color . '",';
//                     }
// 			    ?>
// 			    ],
// 			data: [
// 			    <?php 
// 			    for($i = 1; $i <=  date('t'); $i++)
//                     {
//                       $dates = date('Y') . "-" . date('m') . "-" . str_pad($i, 2, '0', STR_PAD_LEFT);
//                       $date_ =isset($getall[$dates]) ? count($getall[$dates]) : 0 ;
//                       echo $date_ .",";
//                     }
// 			    ?>
// 			 ]
// 		  }]
// 		},
// 		options: {
// 		  title: {
// 			display: true,
// 			text: 'search insight by date'
// 		  }
// 		}
// 	});
</script>
@endsection
