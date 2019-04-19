@extends('admin.layouts.app_en')
@section('content')
	  <style>
	    .cart{
	        background-color: #0080ff !important;
	    }
	     .sales{
	         background-color: #f3990b !important;
	     }
	     
	     .profit{
	             background-color: #4e9b5f !important;

	     }
	  </style>
	
			<div class="container-fluid">
				<!-- row -->
				<div class="row">
						
					<div class="col-md-3 col-sm-6">
						<div class="widget simple-widget">
							<div class="rwidget-caption info">
								<div class="row">
									<div class="col-4 padd-r-0">
										<i class="cl-info icon ti-user"></i>
									</div>
									<div class="col-8">
										<div class="widget-detail">
											<h3 style="font-size: 20px;"> 7240</h3>
											<span> Users</span>
										</div>
									</div>
									<div class="col-12">
										<div class="widget-line">
											<span style="width:80%;" class="bg-info widget-horigental-line"></span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
			        
			        	<div class="col-md-3 col-sm-6">
						<div class="widget simple-widget">
							<div class="widget-caption purple">
								<div class="row">
									<div class="col-4 padd-r-0">
									  <img src="{{asset('images/cart.png')}}" style=" margin-left: 20px;">
									</div>
									<div class="col-8">
										<div class="widget-detail">
										  
											<h3 style="font-size: 20px;">18200</h3>
											<span>Orders</span>
										</div>
									</div>
									<div class="col-12">
										<div class="widget-line">
											<span style="width:40%;" class="bg-purple widget-horigental-line cart" style="  background-color: #0080ff !important;"></span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<div class="col-md-3 col-sm-6">
						<div class="widget simple-widget">
							<div class="widget-caption purple">
								<div class="row">
									<div class="col-4 padd-r-0">
										<img src="{{asset('images/sales.png')}}" style=" margin-left: 20px;">
									</div>
									<div class="col-8">
										<div class="widget-detail">
										    @php
										     $count = 0;
										    @endphp
										    @foreach(App\Order::all() as $order)
										      @php
										       $count += $order->total;
										      @endphp
										    @endforeach
											<h3 style="font-size: 20px;"> 2190239 EGP</h3>
											<span>Total Sales</span>
										</div>
									</div>
									<div class="col-12">
										<div class="widget-line">
											<span style="width:40%;" class="bg-purple widget-horigental-line sales" style="    background-color: #f3990b !important;
"></span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

				
					
					
					<div class="col-md-3 col-sm-6">
						<div class="widget simple-widget">
							<div class="widget-caption purple">
								<div class="row">
									<div class="col-4 padd-r-0">
										<img src="{{asset('images/profit.png')}}" style=" margin-left: 20px;">
									</div>
									<div class="col-8">
										<div class="widget-detail">
										  
											<h3 style="font-size: 20px;"> 268034 EGP</h3>
											<span>profit</span>
										</div>
									</div>
									<div class="col-12">
										<div class="widget-line">
											<span style="width:40%;" class="bg-purple widget-horigental-line profit"></span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
				</div>
			
               <div class="row" style="    margin-top: 20px !important;" >
				
					<!-- Line Chart -->
					<div class="col-md-6 col-sm-12">
                         <div id="chartContainer" style="height: 370px; width: 100%;"></div>

					</div>
					
					
					<div class="col-md-6 col-sm-12">
                         <div id="chartContainer2" style="height: 370px; width: 100%;"></div>

					</div>
				</div>
				<!-- /.row -->
				<div class="row" style="    margin-top: 20px !important;">

				    <br>
				</div>
				  <div class="row" style="    margin-top: 20px !important;">
				
					<!-- Line Chart -->
					<div class="col-md-6 col-sm-12">
                         <div id="chartContainer3" style="height: 370px; width: 100%;"></div>

					</div>
					
					
					<div class="col-md-6 col-sm-12">
                         <div id="chartContainer4" style="height: 370px; width: 100%;"></div>

					</div>
				</div>
				<!-- /.row -->
				
				 <div class="row" style="    margin: 70px 0 !important;">
				
					<!-- Line Chart -->
					<div class="col-md-6 col-sm-12">
                         <div id="chartContainer5" style="height: 370px; width: 100%;"></div>

					</div>
					
					
					<div class="col-md-6 col-sm-12">
                         <div id="chartContainer6" style="height: 370px; width: 100%;"></div>

					</div>
				</div>
				<!-- /.row -->
				
				<!-- row -->
				<div class="row">
				
					<!-- Order Status -->
					<div class="col-md-8 col-sm-12">
						<div class="card">
							<div class="card-header">
								<h4 class="mb-0">Order Status</h4>
							</div>
							<div class="card-body padd-0">
								<div class="table-responsive">
									<table class="table table-lg table-hover">
										<thead>
											<tr>
												<th>Name</th>
												<th>Product ID</th>
												<th>Status</th>
												<th>Price</th>
												<th>Date Created</th>
											</tr>
										</thead>
										
										<tbody>
											<tr>
												<td><a href="#"><img src="http://via.placeholder.com/180x180" class="avatar" alt="Avatar">ahmed salem</a></td>
												<td>#258474</td>
												<td><div class="label cl-success bg-success-light">Paid</div></td>                
												<td> 310 EGP</td>
												<td>18/12/2018</td>  
											</tr>
											
											<tr>
												<td><a href="#"><img src="http://via.placeholder.com/180x180" class="avatar" alt="Avatar">nada ali</a></td>
												<td>#249578</td>
												<td><div class="label cl-warning bg-warning-light">Pending</div></td>							
												<td> 584.14 EGP</td>
												<td>05/08/2018</td> 
											</tr>
											
											<tr>
												<td><a href="#"><img src="http://via.placeholder.com/180x180" class="avatar" alt="Avatar">muhamed ahmed</a></td>
												<td>#248712</td>
												<td><div class="label cl-danger bg-danger-light">Cancel</div></td>  
												<td>1710 EGP</td>
												<td>11/05/2018</td>                                          
											</tr>
											
											<tr>
												<td><a href="#"><img src="http://via.placeholder.com/180x180" class="avatar" alt="Avatar">Hepa Ahmed</a></td>
												<td>#287246</td>
												<td><div class="label cl-success bg-success-light">Paid</div></td>
												<td> 1482.70 EGP</td>
												<td>12/18/2018</td>
											</tr>
											
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					
					<!-- Browser Stats -->
					<div class="col-md-4 col-sm-12">
						<div class="card">
							<div class="card-header">
								<h6>Best Seller</h6>
								<a href="#" class="show-more" title=""><i class="ti-arrow-right"></i></a>
							</div>
							<div class="ground-list todo-browser ground-list-hove">
								<div class="ground ground-single-list padd-0">
									<a class="todo todo-default" href="#">
									  <span class="ct-title">
										<img src="http://via.placeholder.com/80x80" class="img-responsive" alt="">كريم حب شباب من اجيرا
									  </span>
									  <span class="font-medium">92%</span>
									</a>
								</div>
								
								<div class="ground ground-single-list padd-0">
									<a class="todo todo-default" href="#">
									  <span class="ct-title">
										<img src="http://via.placeholder.com/80x80" class="img-responsive" alt="">كريم لإخفاء عيوب البشرة وإصلاحها ,40 مل ,للنساء والرجال ,سبيونيكس
									  </span>
									  <span class="font-medium">80%</span>
									</a>
								</div>
								
								<div class="ground ground-single-list padd-0">
									<a class="todo todo-default" href="#">
									  <span class="ct-title">
										<img src="http://via.placeholder.com/80x80" class="img-responsive" alt="">جل مزلق اوريجنال من ساسمار
									  </span>
									  <span class="font-medium">40%</span>
									</a>
								</div>
								
								<div class="ground ground-single-list padd-0">
									<a class="todo todo-default" href="#">
									  <span class="ct-title">
										<img src="http://via.placeholder.com/80x80" class="img-responsive" alt="">غسول الوجه هيمالايا هيربلز بالصبار للبشرة الجافة، 100 مل
									  </span>
									  <span class="font-medium">52%</span>
									</a>
								</div>
								
								<div class="ground ground-single-list padd-0">
									<a class="todo todo-default" href="#">
									  <span class="ct-title">
										<img src="http://via.placeholder.com/80x80" class="img-responsive" alt="">Opera
									  </span>
									  <span class="font-medium">40%</span>
									</a>
								</div>
							</div>
						</div>	
					</div>
					
				</div>
				<!-- /.row -->
				
				
				
				
			</div> 
			</div>  
			<!-- /.content-wrapper-->
            <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
			<script>
			  window.onload = function () {
                var chart = new CanvasJS.Chart("chartContainer", {
                	animationEnabled: true,
                	theme: "light2", // "light1", "light2", "dark1", "dark2"
                	title:{
                		text: "Num of Install",
                		fontSize: 20,

                	},
                	axisY: {
                		title: ""
                	},
                	data: [{      
                	    color: "blue",
                		type: "column",  
                		showInLegend: true, 
                		legendMarkerColor: "grey",
                		legendText: "install",
                		dataPoints: [  
                		    { y: 190,  label: "feb" },
                		    { y: 520,  label: "Mar" },
                			{ y: 700,  label: "Apr" },
                			{ y: 837, label: "May" },
                			{ y: 1020,  label: "Jun" },
                			{ y: 980,  label: "Jul" },
                			{y : 980 ,label :"Aug"},
                			{ y : 980, label : "Sep"},
                			{ y: 980,  label: "Oct" },
                			{ y: 1400, label: "Nov" },
                		
                		]
                	}]
                });
                chart.render();
                
                
                  var chart = new CanvasJS.Chart("chartContainer2", {
                	animationEnabled: true,
                	theme: "light2", // "light1", "light2", "dark1", "dark2"
                	title:{
                		text: "Orders",
                		fontSize: 20,

                	},
                	axisY: {
                		title: ""
                	},
                	data: [{   
                	    color: "blue",
                		type: "column",  
                		showInLegend: true, 
                		legendMarkerColor: "grey",
                		legendText: "install",
                		dataPoints: [  
                		    { y: 98,  label: "feb" },
                		    { y: 390,  label: "Mar" },
                			{ y: 700,  label: "Apr" },
                			{ y: 1060, label: "May" },
                			{ y: 3070,  label: "Jun" },
                			{ y: 3780,  label: "Jul" },
                			{y : 4930 ,label :"Aug"},
                			{ y : 7840, label : "Sep"},
                			{ y: 10000,  label: "Oct" },
                			{ y: 15023, label: "Nov" },
                		
                		]
                	}]
                });
                chart.render();
                
                
                var chart = new CanvasJS.Chart("chartContainer3", {
                	animationEnabled: true,
                	theme: "light2", // "light1", "light2", "dark1", "dark2"
                	title:{
                		text: "Website Traffic",
                		fontSize: 20,

                	},
                	axisY: {
                		title: ""
                	},
                	data: [{    
                	    color: "blue",
                		type: "column",  
                		showInLegend: true, 
                		legendMarkerColor: "grey",
                		legendText: "install",
                		dataPoints: [  
                		    { y: 000,  label: "feb" },
                		    { y: 000,  label: "Mar" },
                			{ y: 98,  label: "Apr" },
                			{ y: 4000, label: "May" },
                			{ y: 5300,  label: "Jun" },
                			{ y: 8900,  label: "Jul" },
                			{y : 11300 ,label :"Aug"},
                			{ y : 13500, label : "Sep"},
                			{ y: 15000,  label: "Oct" },
                			{ y: 23000, label: "Nov" },
                		
                		]
                	}]
                });
                chart.render();
                
                var chart = new CanvasJS.Chart("chartContainer4", {
                   
                	animationEnabled: true,
                	theme: "light2", // "light1", "light2", "dark1", "dark2"
                	title:{
                		text: "Social Media Assets",
                		 fontSize: 20,

                	},
                	axisY: {
                		title: ""
                	},
                	 colorSet:  "#2F4F4F",
                	data: [{     
                	    color: "blue",
                		type: "column",  
                		showInLegend: true, 
                		legendMarkerColor: "grey",
                		legendText: "install",
                		dataPoints: [  
                		    { y: 1400,  label: "feb" },
                		    { y: 1900,  label: "Mar" },
                			{ y: 2500,  label: "Apr" },
                			{ y: 3150, label: "May" },
                			{ y: 3500,  label: "Jun" },
                			{ y: 3900,  label: "Jul" },
                			{y : 4200 ,label :"Aug"},
                			{ y : 4780, label : "Sep"},
                			{ y: 5000,  label: "Oct" },
                			{ y: 6000, label: "Nov" },
                		
                		]
                	}]
                });
                chart.render();
                
                
                var chart = new CanvasJS.Chart("chartContainer5", {
                	animationEnabled: true,
                	theme: "light2", // "light1", "light2", "dark1", "dark2"
                	title:{
                		text: "Num of Pharmacies",
                		fontSize: 20,
                	},
                	axisY: {
                		title: ""
                	},
                	data: [{   
                	    color: "blue",
                		type: "column",  
                		showInLegend: true, 
                		legendMarkerColor: "grey",
                		legendText: "install",
                		dataPoints: [  
                		    { y: 000,  label: "feb" },
                		    { y: 49,  label: "Mar" },
                			{ y: 100,  label: "Apr" },
                			{ y: 140, label: "May" },
                			{ y: 209,  label: "Jun" },
                			{ y: 238,  label: "Jul" },
                			{y : 330 ,label :"Aug"},
                			{ y : 399, label : "Sep"},
                			{ y: 489,  label: "Oct" },
                			{ y: 521, label: "Nov" },
                		
                		]
                	}]
                });
                chart.render();
                
                var chart = new CanvasJS.Chart("chartContainer6", {
                	animationEnabled: true,
                	theme: "light2", // "light1", "light2", "dark1", "dark2"
                	title:{
                		text: "Revenue",
                		fontSize: 20,

                	},
                	axisY: {
                		title: ""
                	},
                	data: [{  
                	    color: "blue",
                		type: "column",  
                		showInLegend: true, 
                		legendMarkerColor: "grey",
                		legendText: "install",
                		dataPoints: [  
                		    { y: 5000,  label: "feb" },
                		    { y: 38000,  label: "Mar" },
                			{ y: 64000,  label: "Apr" },
                			{ y: 136000, label: "May" },
                			{ y: 380000,  label: "Jun" },
                			{ y: 460000,  label: "Jul" },
                			{y : 590000 ,label :"Aug"},
                			{ y : 834000, label : "Sep"},
                			{ y: 1230000,  label: "Oct" },
                			{ y: 1780000, label: "Nov" },
                		
                		]
                	}]
                });
                chart.render();
                }
			</script>
@endsection
	  

			

				



			

