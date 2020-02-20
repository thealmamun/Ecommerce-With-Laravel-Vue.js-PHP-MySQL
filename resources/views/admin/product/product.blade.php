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
                    <div class="card-header">
                        <h3 class="card-title">Products</h3>
                        <a href="{{url('product/create')}}" class="btn btn-primary float-right"><i
                                class="fa fa-plus-circle"></i> </a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <td>SL.</td>
                                <td>Category Name</td>
                                <td>Brand Name</td>
                                <td>Product Name</td>
                                <td>Product Image</td>
                                <td>Publication Status</td>
                                <td>Product Price</td>

                                <td>Action</td>
                            </tr>
                            </thead>
                            @php($i=1)
                            @foreach($products as $product)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$product->categories->cat_name}}</td>
                                    <td>{{$product->brands->brand_name}}</td>
                                    <td>{{$product->pro_name}}</td>
                                    <td><img src="{{asset($product->pro_image)}}" alt="" width="100"></td>
                                    <td>{{$product->status==1?'Published': 'Unpublished'}}</td>
                                    <td>{{$product->pro_price}}</td>
                                    <td>
                                        <a href="{{url('product/'.$product->id)}}" class="btn btn-sm btn-success"
                                           onclick="return confirm('Are You Sure')">
                                            <i class="fa fa-search-plus"></i>
                                        </a>

                                        <a href="{{url('brand/'.$product->id.'/edit')}}" class="btn btn-sm btn-success"
                                           onclick="return confirm('Are You Sure')">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="{{url('brand/'.$product->id)}}" class="btn btn-sm btn-danger" onclick="event.preventDefault();
                                                     document.getElementById('delete-form').submit();">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                        <form id="delete-form" action="{{url('brand/'.$product->id)}}" method="post"
                                              style="display: none;">
                                            @csrf
                                            @METHOD('delete')
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            <tfoot>
                            <tr>
                                <td>SL.</td>
                                <td>Category Name</td>
                                <td>Brand Name</td>
                                <td>Product Name</td>
                                <td>Product Image</td>
                                <td>Publication Status</td>
                                <td>Product Price</td>
                                <td>Action</td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>

        </section>
        <!-- /.content -->
    </div>

@endsection
