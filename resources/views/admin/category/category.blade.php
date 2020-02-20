

@extends('admin.master')

@section('body')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Category Page</h1>
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
                    <h3 class="card-title">Categories</h3>
                    <a href="{{route('add-category')}}" class="btn btn-primary float-right"><i class="fa fa-plus-circle"></i> </a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <td>SL.</td>
                            <td>Category Name</td>
                            <td>Category Description</td>
                            <td>Publication Status</td>
                            <td>Action</td>
                        </tr>
                        </thead>
                        @php($i=1)
                        @foreach($categories as $category)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$category->cat_name}}</td>
                            <td>{{$category->cat_desc}}</td>
                            <td>{{$category->status==1?'Published': 'Unpublished'}}</td>
                            <td>
                                @if($category->status==1)
                                <a href="{{route('unpublished-category', ['id' =>$category->id])}}" class="btn btn-sm btn-info" onclick="return confirm('Are You Sure')">
                                    <i class="fa fa-arrow-up"></i>
                                </a>
                                @else
                                    <a href="{{route('published-category', ['id' =>$category->id])}}" class="btn btn-sm btn-danger" onclick="return confirm('Are You Sure')">
                                        <i class="fa fa-arrow-down"></i>
                                    </a>
                                @endif
                                <a href="{{route('edit-category', ['id' =>$category->id])}}" class="btn btn-sm btn-success" onclick="return confirm('Are You Sure')">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="{{route('delete-category', ['id' =>$category->id])}}" class="btn btn-sm btn-danger" onclick="return confirm('Are You Sure')">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                        <tfoot>
                        <tr>
                            <td>SL.</td>
                            <td>Category Name</td>
                            <td>Category Description</td>
                            <td>Publication Status</td>
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
