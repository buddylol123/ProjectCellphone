@extends('welcome')
@section('content')

<div class="features_items"><!--features_items-->

@foreach($brand_name as $key => $name)
<h2 class="title text-center">{{$name->tennsx}}</h2>
@endforeach

@foreach($all_nhasx as $key => $nhasx)

<a href="{{URL::to('/chitietsanpham/'.$nhasx->masp)}}">

<div class="col-sm-4">
	<div class="product-image-wrapper">
		<div class="single-products">
			<div class="productinfo text-center">
				<img src="{{URL::to('public/frontend/img/'.$nhasx->hinh)}}" alt="" />
				<h2>{{number_format($nhasx->gia).' '.'VNĐ'}}</h2>
				<p>{{$nhasx->tensp}}</p>
				
			</div>
		</div>
	</div>
</div>
@endforeach

</div><!--features_items-->





	
	
	@endsection