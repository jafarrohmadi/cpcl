@extends('layouts.admin')
@section('content')

    <div class="container-fluid">
        <div class="row page-titles" style="z-index: 0">
            <div class="col p-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Management</a>
                    </li>
                    <li class="breadcrumb-item "><a href="{{ url('admin/roles') }}">Roles</a></li>
                    <li class="breadcrumb-item active">Create Roles</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ trans('global.create') }} {{ trans('global.role.title_singular') }}</h4>
                        <form action="{{ route("admin.roles.store") }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                                <label for="title">{{ trans('global.role.fields.title') }}*</label>
                                <input type="text" id="title" name="title" class="form-control"
                                       value="{{ old('title', isset($role) ? $role->title : '') }}">
                                @if($errors->has('title'))
                                    <p class="help-block">
                                        {{ $errors->first('title') }}
                                    </p>
                                @endif
                                <p class="helper-block">
                                    {{ trans('global.role.fields.title_helper') }}
                                </p>
                            </div>
                            <div class="form-group {{ $errors->has('permissions') ? 'has-error' : '' }}">
                                <label for="permissions">{{ trans('global.role.fields.permissions') }} </label>
                                <h4> Contract </h4>
                                <table class="table table-bordered">
                                    <tr>
                                        <td>Name</td>
                                        <td>Create</td>
                                        <td>Update</td>
                                        <td>Read</td>
                                    </tr>
                                    <?php $permission = array_values($permissions->where('id', '>=',
                                        5)->where('id', '<=', 64)->toArray());?>

                                    @for($i = 0; $i <= count($permission); $i+=3)
                                        @if($i < 59)
                                            <tr>
                                                <td> {{str_replace('Create' , '',$permission[$i]['description'])}}</td>
                                                <td><input type="checkbox" name="permissions[]"
                                                           value="{{$permission[$i]['id']}}"></td>
                                                <td><input type="checkbox" name="permissions[]"
                                                           value="{{$permission[$i + 1]['id']}}"></td>
                                                <td><input type="checkbox" name="permissions[]"
                                                           value="{{$permission[$i + 2]['id']}}"></td>
                                            </tr>
                                        @endif
                                    @endfor

                                </table>
                                <h4> CPCL </h4>
                                <table class="table table-bordered">
                                    <tr>
                                        <td>Name</td>
                                        <td>Create</td>
                                        <td>Update</td>
                                        <td>Read</td>
                                    </tr>
                                    <?php $permission = array_values($permissions->where('id', '>=',
                                        65)->toArray());?>

                                    @for($i = 0; $i <= count($permission); $i+=3)
                                        @if($i < 32)
                                            <tr>
                                                <td> {{str_replace('Create' , '',$permission[$i]['description'])}}</td>
                                                <td><input type="checkbox" name="permissions[]"
                                                           value="{{$permission[$i]['id']}}"></td>
                                                <td><input type="checkbox" name="permissions[]"
                                                           value="{{$permission[$i + 1]['id']}}"></td>
                                                <td><input type="checkbox" name="permissions[]"
                                                           value="{{$permission[$i + 2]['id']}}"></td>
                                            </tr>
                                        @endif
                                    @endfor

                                </table>
                                <h4>Tambahan Role </h4>
                                <table class="table table-bordered">
                                    <tr>
                                        <td>Finish Contract Access</td>
                                        <td><input type="checkbox" name="permissions[]"
                                                   value="2"></td>
                                    </tr>
                                    <tr>
                                        <td>Update All Data After Finish Access</td>
                                        <td><input type="checkbox" name="permissions[]"
                                                   value="3"></td>
                                    </tr>
                                    <tr>
                                        <td>Activity Logs</td>
                                        <td><input type="checkbox" name="permissions[]"
                                                   value="4"></td>
                                    </tr>
                                    <tr>
                                        <td>User Managemen Access</td>
                                        <td><input type="checkbox" name="permissions[]"
                                                   value="1"></td>
                                    </tr>

                                </table>
                            </div>
                            <div>
                                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
