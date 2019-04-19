@extends('admin.layouts.app_en')
@section('title')
	all notify
@endsection
@section('content')
	<div class="row">
	<div class="col-md-12 col-lg-12">
		<div class="card padd-15">
			<div class="flexbox">
				<h3 class="mb-0">All Notifictions</h3>
			
			</div>
		</div>
		<div class="card">
			
			<!-- mail Option -->
			<div class="mail-option padd-10 bb-1">
			
			</div>
			
			<ul class="mail_list list-group list-unstyled">
				 @if(auth()->guard('admin')->user()->permission == "0" )
				  @foreach($notify as $no)  
				 <li class="ground-single-list">
					<div class="ground">
					
						<div class="media-body">
							<div class="media-heading">
								<a href="mail-single.html" class="m-r-10">{{App\AdminModel\Map::find($no->phar_id)->name}}</a>
								<small class="float-right text-muted"><time class="hidden-sm-down" datetime="2017">{{$no->created_at}}</time><i class="zmdi zmdi-attachment-alt"></i> </small>
							</div>
							<p class="msg">{{$no->text}}. </p>
						</div>
					</div>
				</li>
				@endforeach
				 @else
				 	 @foreach($notifycust as $no)  
				 <li class="ground-single-list">
					<div class="ground">
					
						<div class="media-body">
							<div class="media-heading">
								<a href="mail-single.html" class="m-r-10">{{App\AdminModel\Admin::where('id',$no->user_id)->first()->name}}</a>
								<small class="float-right text-muted"><time class="hidden-sm-down" datetime="2017">{{$no->created_at}}</time><i class="zmdi zmdi-attachment-alt"></i> </small>
							</div>
							<p class="msg">{{$no->text}}. </p>
						</div>
					</div>
				</li>
				@endforeach
				 @endif
		
				
			
			</ul>
			
		</div>
	</div>
</div>
@endsection
		