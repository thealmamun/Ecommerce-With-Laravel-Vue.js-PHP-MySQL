@extends('admin.master')

@section('body')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add Product Page</h1>
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

        @if(Session::get('message'))
            <div class="offset-2 col-md-8">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{Session::get('message')}}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
    @endif

    <!-- Main content -->
        <section class="content">

            <div class="offset-2 col-md-8">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Add Product</h3>
                    </div>


                    <form action="{{url('product')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label>Category Name</label>
                                <select class="form-control" name="cat_id">
                                    <option>--Select Category--</option>
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->cat_name}}</option>
                                  @endforeach

                                </select>
                            </div>
                            <div class="form-group">
                                <label>Brand Name</label>
                                <select class="form-control" name="brand_id">

                                    <option>--Select Brand--</option>
                                    @foreach($brands as $brand)
                                        <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group">
                                <label>Product Name</label>
                                <input type="text" class="form-control form-control @error('pro_name') is-invalid @enderror" name="pro_name" placeholder="Enter Product Name"></input>
                                @error('pro_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Product Short Description</label>
                                <textarea type="text" class="form-control form-control @error('pro_short_desc') is-invalid @enderror" name="pro_short_desc" placeholder="Enter Product Short Description"></textarea>
                                @error('pro_short_desc')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Product Long Description</label>
                                <textarea id="summary-ckeditor" type="text" class="form-control form-control @error('pro_long_desc') is-invalid @enderror" name="pro_long_desc" placeholder="Enter Product Long Description"></textarea>
                                @error('pro_long_desc')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Product Price</label>
                                <input type="text" class="form-control form-control @error('pro_price') is-invalid @enderror" name="pro_price" placeholder="Enter Product Price"></input>
                                @error('pro_price')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Product Discount Price</label>
                                <input type="text" class="form-control form-control @error('pro_discount') is-invalid @enderror" name="pro_discount" placeholder="Enter Product Discount Price"></input>
                                @error('pro_discount')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Product Image</label>
                                <input type="file"  class="form-control form-control @error('pro_image') is-invalid @enderror" name="pro_image" id="imgInp"></input>
                                <img id="blah" src="" alt="" width="200"/>
                                @error('pro_image')
                                <div class="alert alert-danger">{{ $message }}</div>

                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Product Gallery Images</label>
                                <input type="file" class="form-control form-control @error('pro_gallery') is-invalid @enderror" name="pro_gallery[]" multiple></input>
                                @error('pro_gallery')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Product Quantity</label>
                                <input type="text" class="form-control form-control @error('pro_qty') is-invalid @enderror" name="pro_qty" placeholder="Enter Product Quantity"></input>
                                @error('pro_qty')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control @error('status') is-invalid @enderror" name="status">
                                    <option>--Select Status--</option>
                                    <option value="1">Published</option>
                                    <option value="0">Unpublished</option>
                                </select>
                                @error('status')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>

                </div>
            </div>

        </section>
        <!-- /.content -->
    </div>

@endsection
