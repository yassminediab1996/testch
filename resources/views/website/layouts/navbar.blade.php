  
  <!-- header--> 
  <div data-collapse="medium" data-animation="default" data-duration="400" data-easing="ease-in-quad" data-easing2="ease-in-quad" class="navbar w-nav">
    <div class="navcontainer w-clearfix">
      <div class="menu-button w-nav-button">
        <div class="icon w-icon-nav-menu"></div>
      </div>
      <a href="{{url('/')}}" class="brand w-nav-brand"><img src="{{asset('chefaa_design/images/logo.svg')}}" width="157" alt=""></a>
      <nav role="navigation" class="nav-menu w-nav-menu">
          <a href="{{url('contact')}}" class="navlink w-nav-link <?php if($currentPage =='contact'){echo 'w--current';}?>">تواصل معنا</a>
          <a href="{{url('blog')}}" class="navlink w-nav-link <?php  if($currentPage =='blog'){echo 'w--current';}?>"> المدونة</a>
          <a href="{{url('/chefaa_app')}}" class="navlink w-nav-link <?php  if($currentPage =='chefaa_app'){echo 'w--current';}?>">⚡️ تطبيق شفاء</a>
          <a href="{{url('#')}}" class="navlink w-nav-link <?php  if($currentPage =='search'){echo 'w--current';}?>">ابحث عن دواء</a>
          <a href="{{url('store')}}" class="navlink w-nav-link <?php  if($currentPage =='store'){echo 'w--current';}?>">المتجر</a>
          <a href="{{url('monthly_subscription')}}" class="navlink w-nav-link <?php if($currentPage =='monthly_subscription'){echo 'w--current';}?>">الروشتة الشهرية</a>
          <a href="{{url('csr')}}" class="navlink w-nav-link <?php  if($currentPage =='csr'){echo 'w--current';}?>">المسؤلية المجتمعية</a>
                      
   
   
    

  <!--        <ul class="profile-wrapper">-->
		<!--	<li>-->
				<!-- user profile -->
		<!--		<div class="profile">-->
		<!--			<img src="http://gravatar.com/avatar/0e1e4e5e5c11835d34c0888921e78fd4?s=80" />-->
		<!--			<a href="http://chefaa.com" class="name">chefaa.com</a>-->
					<!-- more menu -->
		<!--			<ul class="menu">-->
		<!--			      @if(!Auth()->check())-->
  <!--                       <li> <a href="{{url('/login')}}" class="navlink w-nav-link">تسجيل دخول</a></li>-->
  <!--                        @else-->
  <!--                       <li> <a href="{{url('profile/'.auth()->user()->id)}}"class="navlink w-nav-link" >الصفحة الشخصية</a></li>-->
  <!--                       <li>  <a href="{{url('logoutuser')}}" class="navlink w-nav-link" >تسجيل خروج</a></li>-->
  <!--                       @endif-->
					
		<!--			</ul>-->
		<!--		</div>-->
		<!--	</li>-->
		<!--</ul>-->
          </nav>