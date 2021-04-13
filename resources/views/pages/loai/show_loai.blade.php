@extends('welcome')
@section('content')

<div class="features_items"><!--features_items-->

@foreach($cate_name as $key => $name)
<h2 class="title text-center">{{$name->tenloai}}</h2>
@endforeach

@foreach($all_loai as $key => $loai)

<a href="{{URL::to('/chitietsanpham/'.$loai->masp)}}">

<div class="col-sm-4">
	<div class="product-image-wrapper">
		<div class="single-products">
			<div class="productinfo text-center">
				<img src="{{URL::to('public/frontend/img/'.$loai->hinh)}}" alt="" />
				<h2>{{number_format($loai->gia).' '.'VNĐ'}}</h2>
				<p>{{$loai->tensp}}</p>
				
			</div>
		</div>
	</div>
</div>
@endforeach

</div><!--features_items-->





	
	
	@endsection