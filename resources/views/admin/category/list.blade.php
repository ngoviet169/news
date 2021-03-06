@extends('layout.admin.master')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Category
                        <small>List</small>
                    </h1>
                    @if(session('noti'))
                        <div class="alert alert-success">
                            {{session('noti')}}
                        </div>
                    @endif
                    @if(session('danger'))
                        <div class="alert alert-danger">
                            {{session('danger')}}
                        </div>
                    @endif
                </div>
                <!-- /.col-lg-12 -->
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($cates))
                        @foreach($cates as $cate)
                            <tr class="odd gradeX" align="center">
                                <td>{{$cate->id}}</td>
                                <td>{{$cate->name}}</td>
                                <td>{{$cate->created_at}}</td>
                                <td>{{$cate->updated_at}}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{route('deleteCate', $cate->id)}}" onclick="return confirm('Are you wanna delete this item?')"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('cate.edit', $cate->id)}}">Edit</a></td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection