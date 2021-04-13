@extends('welcome')
@section('content')

<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
			<ol class="breadcrumb">
				<li><a href="{{URL::to('/trang-chu')}}">Trang chủ</a></li>
				<li class="active">Thanh toán giỏ hàng</li>
			</ol>
		</div><!--/breadcrums-->

			<div class="register-req" style="width:100%">
				<p>Làm ơn đăng ký hoặc đăng nhập để thanh toán giỏ hàng và xem lại lịch sử mua hàng.</p>
			</div><!--/register-req-->

			<div class="shopper-informations">
				<div class="row">
		
					<div class="col-sm-12 clearfix">
						<div class="bill-to">
							<p>Điền thông tin gửi hàng</p>
							<div class="form-one">
								<form action="{{URL::to('/save-checkout')}}" method="POST">
									
									{{ csrf_field() }}

									<input type="text" name="email_tt" placeholder="Email*">
									
									<input type="text" name="name_tt" placeholder="Họ và tên*">
									
									<input type="text" name="address_tt" placeholder="Địa chỉ*">
									<input type="text" name="phone_tt" placeholder="Số điện thoại">
									<textarea name="message"  placeholder="Ghi chú gửi hàng của bạn" rows="16"></textarea>
									<input type="submit" value="Gửi" name="send_order" class="btn btn-primary btn-sm">

								</form>
							</div>
							
						</div>
					</div>					
				</div>
			</div>
			<!-- <div class="review-payment">
				<h2>Xem lại giỏ hàng</h2>
			</div>

			
			<div class="payment-options">
					<span>
						<label><input type="checkbox"> Direct Bank Transfer</label>
					</span>
					<span>
						<label><input type="checkbox"> Check Payment</label>
					</span>
					<span>
						<label><input type="checkbox"> Paypal</label>
					</span>
				</div> -->
		</div>
	</section> <!--/#cart_items-->

@endsection