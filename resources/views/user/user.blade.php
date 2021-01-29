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
        </div>
    </div>
</div>
@endsection
@section('content')
<div class="content mt-3 ">
    <div class="animated  ">
        @if (session('status'))
        <div class="alert alert-success">{{session('status')}}</div>    
        @endif
        @if (session('status_gagal'))
        <div class="alert alert-danger">{{session('status_gagal')}}</div>    
        @endif
        <div class="row">
            <div class="col-lg-12 col-md-12 ">
                <div class="ibox">
                    <div class="ibox-title">
                        <strong class="card-title">Data User</strong>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                {{-- <i class="fa fa-wrench"></i> --}}
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
                        <div class="text-left">
                            {{-- <a href="{{url('user/add')}}" class="btn btn-sm btn-primary m-1 " ><i class="fa fa-plus"></i> Add User</a> --}}
                        </div>
                        <table class="table ">
                            <thead >
                                <tr>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Token</th>
                                    <th scope="col">Created at</th>
                                    <th scope="col" class="text-center" >
                                        <button class="btn btn-primary btn-block " data-toggle="modal" data-target="#add"><i class="fa fa-plus"></i>Add User</button>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $data)
                                <tr>
                                    <td>{{$data->name}}</td>
                                    <td>{{$data->email}}</td>
                                    <td>{{$data->remember_token}}</td>
                                    <td>{{$data->created_at}}</td>
                                    <td class="text-center">
                                        <?php $id_encrypt = Crypt::encryptString($data->id) ?>
                                        <button class="btn btn-default m-1 edit" 
                                            data-id="<?=$id_encrypt?>" 
                                            data-email="<?=$data->email?>" 
                                            data-name="<?=$data->name?>" 
                                            data-password="<?= $pass_decrypted = Crypt::decryptString( $data->password);?>" 
                                            data-target="#edit"><i class="fa fa-edit"></i>
                                        </button>
                                        {{-- <a href="{{url('user/edit/{'.$id_encrypt."}")}}" class="btn btn-sm btn-warning m-1"><i class="fa fa-edit"></i></a> --}}
                                        <a href="{{url('user/delete/{'.$id_encrypt."}")}}" class="btn btn-danger m-1" onclick="return confirm('Anda yakin?');"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>   
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal add-->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="col-12">
                <form action="{{url('user')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Email </label>
                        <input type="email" name="email" placeholder="Email" class="form-control"  required>
                    </div>
                    <div class="form-group">
                        <label for="">Name </label>
                        <input type="text" name="name" placeholder="Name" class="form-control"  required>
                    </div>
                    <div class="form-group">
                        <label for="">Password </label>
                        <input type="text" name="password" placeholder="Password" class="form-control"  required>
                    </div>
                </div>
            </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Send</button>
                </form>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
</div>
<!-- Modal edit-->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="col-12">
                <form action="{{url('user/edit')}}" method="post">
                    @csrf
                    {{-- @method('patch') --}}
                    <div class="form-group">
                        <label for="">Email </label>
                        <input type="email" name="edit_email" class="form-control"   required>
                        <input type="hidden" name="id" class="form-control"   required>
                    </div>
                    <div class="form-group">
                        <label for="">name </label>
                        <input type="text" name="edit_name" class="form-control"   required>
                        <input type="hidden" name="id" class="form-control"   >
                    </div>
                    <div class="form-group">
                        <label for="">password </label>
                        <input type="text" name="edit_password" class="form-control"   required>
                    </div>
            </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Send</button>
                </form>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
</div>

{{-- script js edit user modal --}}
<script>
    $('.edit').click(function(){
        var id = $(this).attr("data-id");
        var name = $(this).attr("data-name");
        var email = $(this).attr("data-email");
        var password = $(this).attr("data-password");

        $('#edit').modal('show');
        $('input[name=edit_name]').val(name);
        $('input[name=edit_email]').val(email);
        $('input[name=edit_password]').val(password);
        $('input[name=edit_id]').val(id);
    });
</script>
@endsection
