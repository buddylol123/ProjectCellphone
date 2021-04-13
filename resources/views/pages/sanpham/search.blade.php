@extends('welcome')
@section('content')
<div class="features_items"><!--features_items-->
<h2 class="title text-center">Kết quả tìm kiếm</h2>
@foreach($search_product as $key => $search)
<div class="col-sm-3" style="width:30%; height: 30%">
	<div class="product-image-wrapper">

		<a href="{{URL::to('/chitietsanpham/'.$search->masp)}}">
			
		<div class="single-products">
			<div class="productinfo text-center">

					<img width="100" height="300" src="{{URL::to('public/frontend/img/'.$search->hinh)}}" alt="" />
					<h2>{{number_format($search->gia).' '.'VNĐ'}}</h2>
					<p>{{$search->tensp}}</p>

					</a>

			</div>
		</div>
	</div>
</div>
@endforeach
</div><!--features_items-->


@endsection