@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Them san pham
                        </header>
                        <div class="panel-body">
                        <?php
	$message = Session()->get('message');
	if($message)
	{
		echo $message;
		Session()->put('message',null);
	}
	?>
                            <div class="position-center">
                           <form role="form" action="{{URL::to('/save-product')}}" method="post" enctype="multipart/form-data">
                           {{csrf_field()}}
                           
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Ten san pham</label>
                                    <textarea type="Text" name="product_name" class="form-control" id="exampleInputPassword1" placeholder="Password"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Gia </label>
                                    <textarea type="Text" name="product_price" class="form-control" id="exampleInputPassword1" placeholder="Password"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hinh san pham</label>
                                    <input type="file" name="product_img" class="form-control" id="exampleInputPassword1" placeholder="Password"></input>
                                </div>
                             
                                
                                <div class="form-group">
                                    <label for="exampleInputPassword1">loai san pham</label>
                                   <select name="product_maloai" class="form-control input-sm m-bot15">
                                    @foreach($cate_product as $key => $catepro)
                                   <option value="{{$catepro->maloai}}">{{$catepro->tenloai}}</option>
                                   @endforeach
                                   </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword2">ma sx</label>
                                   <select name="product_mansx" class="form-control input-sm m-bot15">

                                   @foreach($brand_product as $key => $cate)
                                   <option value="{{$cate->mansx}}">{{($cate->tennsx    )}}</option>
                                   @endforeach
                                   </select>
                                </div>
                            
                                <button type="submit" name="add-product" class="btn btn-info">Submit</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
            @endsection