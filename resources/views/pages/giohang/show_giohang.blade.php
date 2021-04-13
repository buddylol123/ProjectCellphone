@extends('welcome')
@section('content')
<section id="cart_items">
	<div class="container" style="width: 100%; height: 100%">
		<div class="breadcrumbs">
			<ol class="breadcrumb">
				<li><a href="{{URL::to('/trang-chu')}}">Trang chủ</a></li>
				<li class="active">Giỏ hàng của bạn</li>
			</ol>
		</div>
		<div class="table-responsive cart_info">
			<?php
				$content = Cart::content();
			?>
			<table class="table table-condensed">
				<thead>
					<tr class="cart_menu">
						<td class="image">Hình ảnh</td>
						<td class="description">Tên sản phẩm</td>
						<td class="price">Giá</td>
						<td class="quantity">Số lượng</td>
						<td class="total">Tổng tiền</td>
						<td></td>
					</tr>
				</thead>
				<tbody>
					@foreach($content as $v_content)
					<tr>
						<td class="cart_product">
							<a href=""><img src="{{URL::to('public/frontend/img/'.$v_content->options->image)}}" width="50" alt="" /></a>
						</td>
						<td class="cart_description" style="width: 250px">
							<h4><a href="">{{$v_content->name}}</a></h4>
							<p>{{$v_content->id}}</p>
						</td>
						<td class="cart_price">
							<p>{{number_format($v_content->price).' '.'VNĐ'}}</p>
						</td>
						
						<td class="cart_quantity">
							<div class="cart_quantity_button">
								
								<form action="{{URL::to('/capnhat_cart_qty')}}" method="POST" >
									{{ csrf_field() }}
									<input class="cart_quantity_input" type="text" name="quantity_cart" value="{{$v_content->qty}}" style="width: 50px">
									<input type="hidden" value="{{$v_content->rowId}}" name="rowId_cart" class="form-control">
									<input type="submit" value="Up" name="capnhat_qty" class="btn btn-default btn-sm">
								</form>
							</div>
						</td>
						<td class="cart_total" style="width: 200px">
							<p class="cart_total_price">
								
								<?php
									$tongtien = $v_content->price * $v_content->qty;
									echo number_format($tongtien).' '.'VNĐ';
								?>
							</p>
						</td>
						<td class="cart_delete">
							<a class="cart_quantity_delete" href="{{URL::to('/delete-cart/'.$v_content->rowId)}}"><i class="fa fa-times"></i></a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
	</section> <!--/#cart_items-->
	<section id="do_action">
		<div class="container" style="width: 100%; height: 100%">
			<div class="row">
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Tổng tiền <span>
								<?php
									$tongtien = $v_content->price * $v_content->qty;
									echo number_format($tongtien).'.00 '.'VNĐ';
								?>
							</span></li>
							<li>Eco Tax <span>{{Cart::tax().' '.'VNĐ'}}</span></li>
							<li>Phí vận chuyển <span>Free</span></li>
							<li>Thành tiền <span>{{Cart::total().' '.'VNĐ'}}</span></li>
						</ul>


					<?php 
						$customer = Session()->get('makh');
						if($customer != NULL){
					?>

					<a class="btn btn-default check_out" href="{{URL::to('/checkout')}}">Thanh toán</a>

					<?php
						}else{
					?>

					<a class="btn btn-default check_out" href="{{route('dangnhap')}}">Thanh toán</a>
										
					<?php
						}
					?>

						
					</div>
				</div>
			</div>
		</div>
	</section>
	@endsection