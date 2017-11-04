@extends('layout.admin.master')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">News
                        <small>Add</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-12" style="padding-bottom:100px">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{route('news.store')}}" method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>Category Parent</label>
                            <select name="cate_id" class="form-control">
                                <option value="">Please Choose Category</option>
                                @if(isset($cates))
                                    @foreach($cates as $cate)
                                        <option value="{{$cate->id}}">{{$cate->name}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Title</label>
                            <input class="form-control" name="title" placeholder="Please Enter Title"/>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <input class="form-control" name="description" placeholder="Please Enter Description"/>
                        </div>
                        <div class="form-group">
                            <label>Tags</label>
                            <input class="form-control" name="tags" placeholder="Please Enter Tags"/>
                        </div>
                        <div class="form-group">
                            <label>Content</label>
                            <textarea id="editor1" name="content" rows="10" cols="80">
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label>News Status</label>
                            <label class="radio-inline">
                                <input name="is_public" value="1" checked="" type="radio">Public
                            </label>
                            <label class="radio-inline">
                                <input name="is_public" value="0" type="radio">Private
                            </label>
                        </div>
                        <button type="submit" class="btn btn-default">Add</button>
                        <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection