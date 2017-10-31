@extends('layout.admin.master')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Category
                        @if(isset($cateDetail))
                            <small>Edit</small>
                        @else
                            <small>Add</small>
                        @endif
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-3" style="padding-bottom:120px">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                        @if(session('danger'))
                            <div class="alert alert-danger">
                                {{session('danger')}}
                            </div>
                        @endif
                @if(isset($cateDetail))
                    <form action="{{route('updateCate', $cateDetail->id)}}" method="post">
                @else
                    <form action="{{route('cate.store')}}" method="post">
                @endif
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>Category Name</label>
                        @if(isset($cateDetail))
                            <input class="form-control" name="name" value="{{$cateDetail->name}}"/>
                        @else
                            <input class="form-control" name="name" placeholder="Please Enter Category Name"/>
                        @endif
                        </div>
                        @if(isset($cateDetail))
                            <button type="submit" class="btn btn-default">Update</button>
                        @else
                            <button type="submit" class="btn btn-default">Category Add</button>
                        @endif
                        <button type="reset" class="btn btn-default">Reset</button>
                    <form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection