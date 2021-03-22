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
                        @foreach($edit_category_product as $key=>$edit_value)
	
                            <div class="position-center">
                           <form role="form" action="{{URL::to('/update-category-product/'.$edit_value->maloai)}}" method="post">
                                <div class="form-group" >
                                {{csrf_field()}}
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Ten loai</label>
                                    <textarea type="Text" value="{{($edit_value->tenloai)}}"name="category_product_name" class="form-control" id="exampleInputPassword1" placeholder="Password"></textarea>
                                </div>
                            
                                <button type="submit" name="update-category-product" class="btn btn-info">Submit</button>
                            </form>
                            </div>
    @endforeach
                        </div>
                    </section>

            </div>
            @endsection