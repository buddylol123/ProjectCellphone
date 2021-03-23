@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                        Update loai san pham
                        <?php
                        $message = Session::get('message');
	if($message)
	{
		echo $message;
		Session::put('message',null);
	}
	?>
                        </header>
     
                        <div class="panel-body">
                        @foreach($edit_brand_product as $key=>$edit_value)
	
                            <div class="position-center">
                           <form role="form" action="{{URL::to('/update-brand-product/'.$edit_value->mansx)}}" method="post">
                                <div class="form-group" >
                                {{csrf_field()}}
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Ten loai</label>
                                    <textarea type="Text" value="{{($edit_value->tennsx)}}"name="brand_product_name" class="form-control" id="exampleInputPassword1" placeholder="Password"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nha sx</label>
                                    <textarea type="Text" value="{{($edit_value->xuatxu)}}"name="brand_product_sx" class="form-control" id="exampleInputPassword1" placeholder="Password"></textarea>
                                </div>
                            
                                <button type="submit" name="update-brand-product" class="btn btn-info">Submit</button>
                            </form>
                            </div>
    @endforeach
                        </div>
                    </section>

            </div>
            @endsection