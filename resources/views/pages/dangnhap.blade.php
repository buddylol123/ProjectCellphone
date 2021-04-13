@extends('welcome')
@section('content')
<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Đăng Nhập</h2>
						<form action="{{route('dangnhap')}}" method="post" class="beta-form-checkout">
						<input type="hidden" name="_token" value="{{csrf_token()}}">
            		<div class="row">
                <div class="col-sm-3"></div>
                @if(Session('thongbao'))
                <div class="alert alert-sucsess">
				{{Session('thongbao')}}</div>
                @endif	
                <div class="col-sm-6">
                    <h4>Đăng nhập</h4>
                    <div class="space20">

                    
                    <div style="width:200%">
                        <label>Email</label>
                        <input type="email" required name="email">
                    </div>
                    <div style="width:200%" >
                        <label >Password</label>
                        <input type="password" required name="matkhau">
                    </div>
                    <div >
                        <button type="submit" class="btn btn-primary">Đăng Nhập</button>
                    </div>
                </div>
                <div class="col-sm-3"></div>
            </div>
        </form>
					</div><!--/login form-->
		
	</section><!--/form-->
@endsection 

