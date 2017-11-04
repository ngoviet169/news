@extends('layout.admin.master')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Product
                        <small>List</small>
                    </h1>
                    @if (isset($success))
                        <div class="alert alert-success">
                            <ul>
                                <li>{{ $success }}</li>
                            </ul>
                        </div>
                    @endif
                    @if(session('noti'))
                        <div class="alert alert-success">
                            {{session('noti')}}
                        </div>
                    @endif
                </div>
                <!-- /.col-lg-12 -->
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Category</th>
                        <th>Title</th>
                        <th>Title Alias</th>
                        <th>Tags</th>
                        <th>Description</th>
                        <th>Content</th>
                        <th>Status</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if (isset($news))
                        @foreach($news as $new)
                            <tr class="odd gradeX" align="center">
                                <td>{{$new->id}}</td>
                                <td>{{$new->category->name}}</td>
                                <td>{{$new->title}}</td>
                                <td>{{$new->title_alias}}</td>
                                <td>{{$new->tags}}</td>
                                <td>{{$new->description}}</td>
                                <td>{{$new->content}}</td>
                                <td><a href="{{route('changeStatus', $new->id)}}">{{$new->is_public == 1 ? 'Public' : 'Private' }}</a></td>
                                <td>{{$new->created_at}}</td>
                                <td>{{$new->updated_at}}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="#"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="#">Edit</a></td>
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