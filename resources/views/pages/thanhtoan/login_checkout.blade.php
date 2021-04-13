@extends('welcome')
@section('content')
<section id="form"><!--form-->
<div class="container">
	<div class="row">
		<div class="col-sm-4 col-sm-offset-1">
			<div class="login-form"><!--login form-->
			<h2>Đăng nhập</h2>
			<form action="{{URL::to('/login-customer')}}" method="POST">
				{{ csrf_field() }}

				<input type="email" name="email" placeholder="Tài khoản" />
				<input type="password" name="matkhau" placeholder="Mật khẩu" />
				<span>
					<input type="checkbox" class="checkbox">
					Ghi nhớ đăng nhập
				</span>
				<button type="submit" class="btn btn-default">Đăng nhập</button>
			</form>
			</div><!--/login form-->
		</div>
		<div class="col-sm-1">
			<h2 class="or">Hoặc</h2>
		</div>
		<div class="col-sm-4">
			<div class="signup-form"><!--sign up form-->
			<h2>Đăng ký</h2>
			<form action="{{URL::to('/add-customer')}}" method="POST">
				{{ csrf_field() }}
				<input type="text" name="name" placeholder="Họ và tên"/>
				<input type="text" name="phone" placeholder="Số điện thoại" />
				<input type="text" name="address" placeholder="Địa chỉ" />
				<input type="email" name="email" placeholder="Tài khoản" />
				<input type="password" name="pass" placeholder="Mật khẩu" />
				<button type="submit" class="btn btn-default">Đăng ký</button>
			</form>
			</div><!--/sign up form-->
		</div>
	</div>
</div>
</section><!--/form-->
@endsection