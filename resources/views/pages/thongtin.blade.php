@extends('master')
@section('content')
<section id="#"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Thông Tin Cá Nhân</h2>
						<form action="{{route('thongtin')}}">
                        <div class="your-order-item">
                      
                        @foreach($new as $value)
                            
                                <div class="pull-left"><p class="your-order-f18">Họ Tên:</p></div>
                                <div class="pull-right"><h5 class="color-black">{{$value->tenkh}}</h5></div>
                             
                                <div class="clearfix"></div>
                            </div>
                            <div class="your-order-item">
                                <div class="pull-left"><p class="your-order-f18">Email:</p></div>
                                <div class="pull-right"  ><h5 class="color-black">{{$value->email}}</h5></div>
                                
                                <div class="clearfix"></div>
                            </div>
                            <div class="your-order-item">
                                <div class="pull-left"><p class="your-order-f18">Số điện thoại:</p></div>
                                <div class="pull-right"><h5 class="color-black">{{$value->sodienthoai}}</h5></div>
                                
                                <div class="clearfix"></div>
                            </div>
                            <div class="your-order-item">
                                <div class="pull-left"><p class="your-order-f18">Địa chỉ:</p></div>
                                <div class="pull-right"><h5 class="color-black">{{$value->diachi}}</h5></div>
                            
                        @endforeach
                                <div class="clearfix"></div>
                            </div>
						</form>
					</div><!--/login form-->
				</div>
				
			</div>
		</div>
	</section><!--/form-->

@endsection  


  