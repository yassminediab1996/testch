@extends('admin.layouts.app_en')
@section('title')
	Categories
@endsection
@section('content')
	<style>
		select{
			Font-family: 'FontAwesome';
		}
	</style>
				
<!-- row -->
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="flexbox padd-10 bb-1">
				<h4 class="mb-0">Search Lists</h4>
			               <a style="    margin-left: -920px;    background: #28a745;

"href="{{ url('/17$es12/search/export') }}"  target="_blank" data-original-title="Export Email" style="display: block;" 
        class="btn btn-primary legitRipple col-lg-1"><i class="icon-database-add"></i>  export </a><br><br>

			</div>
			@if($get->count() >0)
			<div class="card-body">
				<div class="table-responsive">
					<table id="data-table-advance" class="table table-lg table-hover">
						<thead>
							<tr>
								<th>#</th>
							    <th>name</th>
							    <th>phone</th>
							    <th>email</th>
							    <th>search</th>
							    <th>Governorate</th>
							    <th>State</th>
							    <th>date</th>
							</tr>
						</thead>

						<tbody>
						@php
							$i = 1;
						@endphp
						@foreach($get as $cat)
							<tr>

								<td>{{$i++}}</td>
								<td>{{$cat->name}}</td>
								<td>{{$cat->phone}}</td>
								<td>{{$cat->email}}</td>
								<td>{{$cat->search}}</td>
								<td>{{App\AdminModel\City::find($cat->goverid)->name_en}}</td>
								<td>{{App\AdminModel\City::find($cat->state_id)->name_en}}</td>
								<td>{{$cat->created_at}}</td>
							</tr>

							    @endforeach
						@php
							$i++;
						@endphp
						</tbody>
					</table>

				</div>
			</div>
			@endif
		</div>
	</div>
</div>


@endsection