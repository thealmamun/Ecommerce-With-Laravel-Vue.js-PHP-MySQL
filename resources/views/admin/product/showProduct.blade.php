@extends('admin.master')

@section('body')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Product Page</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Blank Page</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="col-md-10 offset-1">

                <div class="card">

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <table class="table table-bordered">
                            <tr>
                                <th>Product Name</th>
                                <td>{{$product->pro_name}}</td>
                            </tr>
                            <tr>
                                <th>Product Category</th>
                                <td>{{$product->categories->cat_name}}</td>
                            </tr>
                            <tr>
                                <th>Product Brand</th>
                                <td>{{$product->brands->brand_name}}</td>
                            </tr>
                            <tr>
                                <th>Product Short Description</th>
                                <td>{{$product->pro_short_desc}}</td>
                            </tr>
                            <tr>
                                <th>Product Long Description</th>
                                <td>{!!$product->pro_long_desc!!}</td>
                            </tr>
                            <tr>
                                <th>Product Price</th>
                                <td>{{$product->pro_price}}</td>
                            </tr>
                            <tr>
                                <th>Product Discount price</th>
                                <td>{{$product->pro_discount}}</td>
                            </tr>
                            <tr>
                                <th>Product Quantity</th>
                                <td>{{$product->pro_qty}}</td>
                            </tr>
                            <tr>
                                <th>Product Image</th>
                                <td><img src="{{asset($product->pro_image)}}" alt=""></td>
                            </tr>
                            <tr>
                                <th>Gallery Image</th>
                                <td> @foreach($product->productGallery as $gallery)
                                <img src="{{asset($gallery->pro_gallery)}}" alt="">
                            @endforeach </td>
                            </tr>
{{--                            {{dd($product->productGallery->pro_gallery)}}--}}
                        </table>

                    </div>
                    <!-- /.card-body -->
                </div>

        </section>
        <!-- /.content -->
    </div>

@endsection
