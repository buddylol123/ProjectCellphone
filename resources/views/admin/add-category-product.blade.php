@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Them Loai san pham
                        </header>
                        <div class="panel-body">
                        <?php
	$message = Session::get('message');
	if($message)
	{
		echo $message;
		Session::put('message',null);
	}
	?>
                            <div class="position-center">
                           <form role="form" action="{{URL::to("/save-category-product")}}" method="post">
                                <div class="form-group" >
                                {{csrf_field()}}
                                    <label for="exampleInputEmail1">Ma loai</label>
                                    <input type="Text" name="category_product_id" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Ten loai</label>
                                    <textarea type="Text" name="category_product_name" class="form-control" id="exampleInputPassword1" placeholder="Password"></textarea>
                                </div>
                            
                                <button type="submit" name="add-category-product" class="btn btn-info">Submit</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
            @endsection