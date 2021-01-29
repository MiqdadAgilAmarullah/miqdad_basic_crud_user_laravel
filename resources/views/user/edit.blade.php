@extends('main')
@section('title', 'Page User')
@section('welcome_message')
<li>
    <span class="m-r-sm text-muted welcome-message"></span>
</li>
@endsection
@section('breadcrumb')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>This is page User</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html">Page User</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Data User</strong>
            </li>
        </ol>
    </div>
    <div class="col-sm-8">
        <div class="title-action">
            <a href="" class="btn btn-primary">This is action area</a>
        </div>
    </div>
</div>
@endsection
@section('content')
<div class="content mt-3 ">
    <div class="animated  animated fadeInRightBig">
        <div class="row">
            <div class="col-lg-8 col-md-8 offset-2">
                <div class="ibox">
                    <div class="ibox-title">
                        <strong class="card-title">Edit Data User</strong>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#" class="dropdown-item">Config option 1</a>
                                </li>
                                <li><a href="#" class="dropdown-item">Config option 2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content table-responsive">
                        <div class="col-12">
                            <form action="{{url('user/'.$users->id)}}" method="post">
                                @csrf
                                @method('patch')
                                <div class="form-group">
                                    <label for="">Email </label>
                                    <input type="email" name="email" class="form-control" value="{{ $users->email}}"  required>
                                    <input type="hidden" name="id" class="form-control" value="{{ $users->id}}"  required>
                                </div>
                                <div class="form-group">
                                    <label for="">name </label>
                                    <input type="text" name="name" class="form-control" value="{{ $users->name}}"  required>
                                </div>
                                <div class="form-group">
                                    <label for="">password </label>
                                    <input type="text" name="password" class="form-control" value="{{ $users->password}}"  required>
                                </div>
                                <button type="submit" class="btn btn-primary">Send</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
