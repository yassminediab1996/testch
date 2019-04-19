<?php
if (auth()->guard('admin')->check()) {
    $permission_list = json_decode(auth()->guard('admin')->user()->permission);

}
?>
<style>
  .cl-white {
      color:black !important;
  }
  .green-bg {
    background: #b2bab0;
}
#sidenavToggler {
    color: #ffffff;
}
#mainNav.navbar-light .navbar-collapse .navbar-sidenav > .nav-item > .nav-link {
    color: #ffffff;
}
.bg-light-dark{
    background-color :#ffffff !important; 
}
.theme-bg{
      background-color :#ffffff !important; 
}
.bg-dark{
    background-color :#ffffff !important; 
}

#mainNav.navbar-light .navbar-collapse .navbar-sidenav > .nav-item .sidenav-second-level > li > a:hover, 
{
        color: #ffffff;

}
.sidenav-second-level > li > a, #mainNav.navbar-light .navbar-collapse .navbar-sidenav > .nav{
     color: #ffffff;
}
a{
    color :black !important;
}
</style>

<nav class="navbar navbar-expand-lg bb-1 navbar-light theme-bg br-theme fixed-top" id="mainNav">

    <!-- Start Header -->
    <header class="header-logo bg-dark bb-1 br-1 br-light-dark">
        <a class="nav-link text-center mr-lg-3 hidden-xs" id="sidenavToggler"><i class="ti-align-left"></i></a>
        <a class=" navbar-brand" href="{{url('/17$es12/home')}}" style="color: #f8f9fa">Chefaa</a>
    </header>
    <!-- End Header -->

    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="ti-align-left" style="    color: #62cb5d !important;
"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarResponsive">

        <!-- =============== Start Side Menu ============== -->
        <div class="navbar-side">
            <ul class="navbar-nav navbar-sidenav bg-light-dark" id="exampleAccordion">
                <!-- Start Advance Apps -->
                  @if ($permission_list == 19)
                
                     <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Pffer">
                        <a class="nav-link" href="{{url('17$es12/patient')}}">
                            <i class="ti i-cl-2 ti-layers"></i>
                            <span class="nav-link-text">  View Patient </span>
                        </a>
                    </li>
                    
                  @elseif ($permission_list == 20)
                  
                      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Pffer">
                            <a class="nav-link" href="{{url('17$es12/contact/customer/'.auth()->guard('admin')->user()->id)}}">
                                <i class="ti i-cl-2 ti-layers"></i>
                                <span class="nav-link-text">  Customer Service </span>
                            </a>
                      </li>
                   
                    @elseif ($permission_list == 21)
                  
                      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Pffer">
                            <a class="nav-link" href="{{url('17$es12/map/pharmacy/'.auth()->guard('admin')->user()->id)}}">
                                <i class="ti i-cl-2 ti-layers"></i>
                                <span class="nav-link-text">   Monthly Orders </span>
                            </a>
                        </li>
                        
                        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Pffer">
                            <a class="nav-link" href="{{url('17$es12/pharmacy_ondemand/pharmacy/'.auth()->guard('admin')->user()->id)}}">
                                <i class="ti i-cl-2 ti-layers"></i>
                                <span class="nav-link-text">   On demand Orders </span>
                            </a>
                        </li>
                   @else
              
                 	<li class="nav-item" data-toggle="tooltip" data-placement="right" title="mon">
					  <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#mon" data-parent="#exampleAccordion">
						<i class="ti i-cl-9 ti-layout"></i>
						<span class="nav-link-text">Monthly Packages</span>
					  </a>
					  <ul class="sidenav-second-level collapse" id="mon">
					  @if (auth()->guard('admin')->user()->permission == "0"  || in_array($monthly, $permission_list))
						<li>
						  <a href="{{url('17$es12/monthly/')}}">Orders  </a>
						</li>
					  @endif
					  
				       @if (auth()->guard('admin')->user()->permission == "0" )
						<li>
						  <a href="{{url('17$es12/partner')}}">Partners  </a>
						</li>
				    	@endif
				    	 @if (auth()->guard('admin')->user()->permission == "0" )
						<!--<li>-->
						<!--  <a href="{{url('17$es12/pharmacy')}}">Pharmacies  </a>-->
						<!--</li>-->
				    	@endif
					  </ul>
					</li>
					
					<li class="nav-item" data-toggle="tooltip" data-placement="right" title="ondemand">
					  <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#ondemand" data-parent="#exampleAccordion">
						<i class="ti i-cl-9 ti-layout"></i>
						<span class="nav-link-text">On Demand Packages</span>
					  </a>
					  <ul class="sidenav-second-level collapse" id="ondemand">
					  @if (auth()->guard('admin')->user()->permission == "0"  || in_array($monthly, $permission_list))
						<li>
						  <a href="{{url('17$es12/ondemand/')}}">Orders  </a>
						</li>
					  @endif
					  </ul>
					</li>
					
                    <!-- Start Stors -->
					<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Store">
					  <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#Store" data-parent="#exampleAccordion">
						<i class="ti i-cl-6 ti-shopping-cart"></i>
						<span class="nav-link-text">Store</span>
					  </a>
					  <ul class="sidenav-second-level collapse" id="Store">
					  @if (auth()->guard('admin')->user()->permission == "0"  || in_array($category, $permission_list))
						<li>
						  <a href="{{url('17$es12/categories')}}">Category</a>
						</li>
					  @endif
				      @if (auth()->guard('admin')->user()->permission == "0"  || in_array( $subcategory, $permission_list))
						<li>
						  <a href="{{url('17$es12/subcat')}}">SubCategory</a>
						</li>
					  @endif
					  @if (auth()->guard('admin')->user()->permission == "0"  || in_array($products, $permission_list))
						<li>
						  <a href="{{url('17$es12/products')}}">Products</a>
						</li>
					  @endif
					  @if (auth()->guard('admin')->user()->permission == "0"  || in_array($offers, $permission_list))
					  	<li>
						  <a href=" {{url('17$es12/offer')}}">Offers</a>
						</li>
					 @endif
					  @if (auth()->guard('admin')->user()->permission == "0"  || in_array($coupon, $permission_list))
					  	<li>
						  <a href="{{url('17$es12/copone')}}">Coupone</a>
						</li>
					  @endif
					  @if (auth()->guard('admin')->user()->permission == "0"  || in_array($orders, $permission_list)) 
					  	<li>
						  <a href=" {{url('17$es12/order/new')}}">New Orders</a>
						</li>
					  @endif
					   @if (auth()->guard('admin')->user()->permission == "0"  || in_array($package, $permission_list)) 
					  	<li>
						  <a href=" {{url('17$es12/package')}}">Packages </a>
						</li>
					  @endif
					   @if (auth()->guard('admin')->user()->permission == "0"  || in_array($brands, $permission_list)) 
					  	<li>
						  <a href=" {{url('17$es12/brand/')}}">Brands </a>
						</li>
					  @endif
					  
					   @if (auth()->guard('admin')->user()->permission == "0"  || in_array($country, $permission_list)) 
					  	<li>
						  <a href="{{url('17$es12/city')}}">Country </a>
						</li>
					  @endif
					  
					   @if (auth()->guard('admin')->user()->permission == "0"  || in_array($state, $permission_list)) 
					  	<li>
						  <a href="{{url('17$es12/city/state')}}">City </a>
						</li>
					  @endif
					  </ul>
					
					 
					</li>
					<!-- End Stors -->
					 <!-- Start search -->
					<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Search">
					  <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#Search" data-parent="#exampleAccordion">
						<i class="ti i-cl-1 ti-user"></i>
						<span class="nav-link-text">Search Engine</span>
					  </a>
					  <ul class="sidenav-second-level collapse" id="Search">
					  @if (auth()->guard('admin')->user()->permission == "0"  || in_array($search, $permission_list))
						<li>
						  <a href="{{url('17$es12/search/')}}">Search List</a>
						</li>
					  @endif
				     @if (auth()->guard('admin')->user()->permission == "0"  )
						<li>
						  <a href="{{url('17$es12/search/insight/')}}">Search Insight</a>
						</li>
					  @endif
					   @if (auth()->guard('admin')->user()->permission == "0"  )
						<li>
						  <a href="{{url('17$es12/search/insightstate/')}}">Search Insight By State</a>
						</li>
					  @endif
					
					  </ul>
					
					 
					</li>
					<!-- End search -->
					 <!-- Start case -->
					<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Case">
					  <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#Case" data-parent="#exampleAccordion">
						<i class="ti i-cl-9 ti-layout"></i>
						<span class="nav-link-text">CSR</span>
					  </a>
					  <ul class="sidenav-second-level collapse" id="Case">
					  @if (auth()->guard('admin')->user()->permission == "0"  || in_array($cases, $permission_list))
						<!--<li>-->
						<!--  <a href="{{url('17$es12/case/')}}">Cases</a>-->
						<!--</li>-->
					  @endif
				     @if (auth()->guard('admin')->user()->permission == "0"  || in_array($charity, $permission_list))
						<li>
						  <a href="{{url('17$es12/charity/')}}">Organizations</a>
						</li>
					  @endif
					  
					   @if (auth()->guard('admin')->user()->permission == "0" )
						<li>
						  <a href="{{url('17$es12/corporate')}}">Corporate  </a>
						</li>
				    	@endif
					
					  </ul>
					
					 
					</li>
					
					<li class="nav-item" data-toggle="tooltip" data-placement="right" title="pre">
					  <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#pre" data-parent="#exampleAccordion">
						<i class="ti i-cl-3 ti-comment-alt"></i>
						<span class="nav-link-text">Data Entry</span>
					  </a>
					  <ul class="sidenav-second-level collapse" id="pre">
					  @if (auth()->guard('admin')->user()->permission == "0"  || in_array($perscription, $permission_list))
						<li>
						  <a href="{{url('17$es12/prescription/')}}">Perscriptions</a>
						</li>
					  @endif
				     @if (auth()->guard('admin')->user()->permission == "0" )
						<li>
						  <a href="{{url('17$es12/medications')}}">medications  </a>
						</li>
				    	@endif
					
					  </ul>
					
					 
					</li>
					
					<!-- End case -->
					<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Settings">
					  <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#Settings" data-parent="#exampleAccordion">
						<i class="ti i-cl-12 ti-settings"></i>
						<span class="nav-link-text">Settings</span>
					  </a>
					  <ul class="sidenav-second-level collapse" id="Settings">
			           @if (auth()->guard('admin')->user()->permission == "0" )
						<li>
						  <a href="{{url('17$es12/employee')}}">System Admins</a>
						</li>
					  @endif
				      @if (auth()->guard('admin')->user()->permission == "0" )
						<!--<li>-->
						<!--  <a href="{{url('17$es12/permission')}}">Permissions</a>-->
						<!--</li>-->
					  @endif
					
					  </ul>
					
					 
					</li>
					
				
					<!-- End case -->
					<li class="nav-item" data-toggle="tooltip" data-placement="right" title="pharmacy">
					  <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#pharmacy" data-parent="#exampleAccordion">
						<i class="ti i-cl-12 ti-settings"></i>
						<span class="nav-link-text">Pharmacy location</span>
					  </a>
					  <ul class="sidenav-second-level collapse" id="pharmacy">
			           @if (auth()->guard('admin')->user()->permission == "0"  || in_array($map, $permission_list))
						<li>
						  <a href="{{url('17$es12/map/add')}}">Live Map </a>
						</li>
					  @endif
				      @if (auth()->guard('admin')->user()->permission == "0"  || in_array($map, $permission_list))
						<li>
						  <a href="{{url('17$es12/map/pharmacy')}}">Pharmacies </a>
						</li>
					  @endif
					
					  </ul>
					
					 
					</li>
                
            
                 
                   @if (auth()->guard('admin')->user()->permission == "0"  || in_array($contact, $permission_list))
                  <!-- Start city -->
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Pffer">
                    <a class="nav-link" href="{{url('17$es12/contact/')}}">
                        <i class="ti i-cl-2 ti-layers"></i>
                        <span class="nav-link-text">Contact</span>
                    </a>
                </li>
                  @endif
               @endif
            </ul>
        </div>
        <!-- =============== End Side Menu ============== -->

     

        <!-- =============== Header Rightside Menu ============== -->
        <ul class="navbar-nav ml-auto">
            <!-- Notification -->
            @if(auth()->guard('admin')->user()->permission == "0" )
            <li class="nav-item dropdown">

                <a class="nav-link dropdown-toggle mr-lg-3 a-topbar__nav a-nav" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="cl-white ti-bell"></i>
                    <span class="a-nav__link-badge a-badge bg-white theme-cl a-animate-blink">{{$notifycount}}</span>
                    <span class="hidden-lg hidden-md mrg-l-10">New Notification</span>
                </a>
               
                <div class="dropdown-menu animated flipInX" aria-labelledby="alertsDropdown">
                    <div class="dropdown-header text-center accent-bg">
                        <span class="a-dropdown__header-title">{{$notifycount}} New</span>
                        <span class="a-dropdown__header-subtitle">User Notifications</span>
                    </div>

                    <div class="ground-list ground-list-hove" id="notification-box">
                     @foreach($notify as $no)     
                        <div class="ground ground-single-list">
                            <a href="#">
                                <div class="btn-circle-40 btn-success"><i class="ti-calendar"></i></div>
                            </a>

                            <div class="ground-content">
                             
                                <h6><a href="#">{{App\AdminModel\Map::find($no->phar_id)->name}} </a></h6>
                                <small class="text-fade">{{$no->text}}</small>
                                <span class="small">Just Now</span>
                            </div>
                        </div>
                      @endforeach
                    </div>
                    <a class="dropdown-item view-all" href="{{url('17$es12/allnotify')}}">View all Notifications</a>
                </div>
                
                
            </li>
            @elseif(auth()->guard('admin')->user()->permission == 20)
           
               <li class="nav-item dropdown">

                <a class="nav-link dropdown-toggle mr-lg-3 a-topbar__nav a-nav" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="cl-white ti-bell"></i>
                    <span class="a-nav__link-badge a-badge bg-white theme-cl a-animate-blink">{{$notifycustcount}}</span>
                    <span class="hidden-lg hidden-md mrg-l-10">New Notification</span>
                </a>
               
                <div class="dropdown-menu animated flipInX" aria-labelledby="alertsDropdown">
                    <div class="dropdown-header text-center accent-bg">
                        <span class="a-dropdown__header-title">{{$notifycustcount}} New</span>
                        <span class="a-dropdown__header-subtitle">User Notifications</span>
                    </div>

                    <div class="ground-list ground-list-hove" id="notification-box">
                     @foreach($notifycust as $no)     
                        <div class="ground ground-single-list">
                            <a href="#">
                                <div class="btn-circle-40 btn-success"><i class="ti-calendar"></i></div>
                            </a>

                            <div class="ground-content">
                               
                                <h6><a href="#">{{App\AdminModel\Admin::where('id',$no->user_id)->first()->name}} </a></h6>
                                <small class="text-fade">{{$no->text}}</small>
                                <span class="small">Just Now</span>
                            </div>
                        </div>
                      @endforeach
                    </div>
                    <a class="dropdown-item view-all" href="{{url('17$es12/allnotify')}}">View all Notifications</a>
                </div>
                
                
            </li>
            @endif
            <!-- End Notification -->

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle mr-lg-0 user-img a-topbar__nav a-nav" id="userDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="http://via.placeholder.com/180x180" alt="user-img" width="36" class="img-circle">
                    <b class="f-size-17">{{Auth::guard('admin')->user()->name}}</b>
                </a>

                <ul class="dropdown-menu dropdown-user animated flipInX" aria-labelledby="userDropdown">
                    <li class="dropdown-header green-bg">
                        <div class="header-user-pic">
                            <img src="http://via.placeholder.com/180x180" alt="user-img" width="36" class="img-circle">
                        </div>
                        <div class="header-user-det">
                            <span class="a-dropdown__header-title">{{Auth::guard('admin')->user()->name}}</span>
                            <span class="a-dropdown__header-subtitle">Admin</span>
                        </div>
                    </li>

                    <li><a class="dropdown-item" href="{{url('17$es12\logout')}}"><i class="fa fa-power-off"></i> Logout</a></li>
                </ul>
            </li>
        </ul>
        <!-- =============== End Header Rightside Menu ============== -->
    </div>
</nav>
<!-- =====================================================
                  End Navigations
======================================================= -->
  
<div class="content-wrapper">
    <div class="container-fluid">
 