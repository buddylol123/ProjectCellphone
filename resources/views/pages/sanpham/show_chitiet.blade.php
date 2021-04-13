@extends('welcome')
@section('content')

@foreach($all_chitiet as $key => $chitiet)

	<div class="product-details"><!--product-details-->
	<div class="col-sm-5">
		<div class="view-product">
			<img src="{{URL::to('/public/frontend/img/'.$chitiet->hinh)}}" alt="" />
		</div>
		<div id="similar-product" class="carousel slide" data-ride="carousel">
		</div>
	</div>
	<div class="col-sm-7">
		<div class="product-information"><!--/product-information-->
		<img src="images/product-details/new.jpg" class="newarrival" alt="" />
		<h2>{{$chitiet->tenloai.' '.$chitiet->tensp}}</h2>
		<img src="images/product-details/rating.png" alt="" />

		<form action="{{URL::to('/giohang')}}" method="POST">
			{{ csrf_field() }}
		<span>
			<span>{{number_format($chitiet->gia).' '.'VNĐ'}}</span><br>
			<label>Số lượng:</label>
			<input name="qty" type="number" min="1" value="1">
			<input type="hidden" name="product_hidden" value="{{$chitiet->masp}}">
			<button type="submit" class="btn btn-fefault cart">
				<i class="fa fa-shopping-cart"></i>
				Thêm giỏ hàng
			</button>
		</span>
		</form>

		</div><!--/product-information-->
	</div>
	</div><!--/product-details-->
	@endforeach

	
	<div class="recommended_items"><!--recommended_items-->
	<h2 class="title text-center">Sản phẩm liên quan</h2>
	<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner">
			<div class="item active">
				@foreach($all_lquan as $key=>$lquan)
				<a href="{{URL::to('/chitietsanpham/'.$lquan->masp)}}">
				<div class="col-sm-4">
					<div class="product-image-wrapper">
						<div class="single-products">
							<div class="productinfo text-center">
								<img src="{{URL::to('public/frontend/img/'.$lquan->hinh)}}" alt="" />
								<h2>{{number_format($lquan->gia).' '.'VNĐ'}}</h2>
								<p>{{$lquan->tensp}}</p>
								
							</div>
						</div>
					</div>
				</div>
				@endforeach	
			</div>
		</div>
		<a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
			<i class="fa fa-angle-left"></i>
		</a>
		<a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
			<i class="fa fa-angle-right"></i>
		</a>
	</div>
	</div><!--/recommended_items-->
@endsection