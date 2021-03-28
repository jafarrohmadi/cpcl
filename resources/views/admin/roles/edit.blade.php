@extends('layouts.admin')
@section('content')

    <div class="container-fluid">
        <div class="row page-titles" style="z-index: 0">
            <div class="col p-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Management</a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{ url('admin/roles') }}">Roles</a></li>
                    <li class="breadcrumb-item active">Edit Roles</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ trans('global.edit') }} {{ trans('global.role.title_singular') }}</h4>
                        <form action="{{ route("admin.roles.update", [$role->id]) }}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
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
{{--                            <div class="form-group {{ $errors->has('permissions') ? 'has-error' : '' }}">--}}
{{--                                <label for="permissions">{{ trans('global.role.fields.permissions') }}*--}}
{{--                                </label>--}}
{{--                                <select name="permissions[]" id="permissions"--}}
{{--                                        class="form-control  js-example-basic-select2" multiple="multiple">--}}
{{--                                    @foreach($permissions as $id => $permissions)--}}
{{--                                        <option--}}
{{--                                            value="{{ $id }}" {{ (in_array($id, old('permissions', [])) || isset($role) && $role->permissions->contains($id)) ? 'selected' : '' }}>--}}
{{--                                            {{ $permissions }}--}}
{{--                                        </option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
{{--                                @if($errors->has('permissions'))--}}
{{--                                    <p class="help-block">--}}
{{--                                        {{ $errors->first('permissions') }}--}}
{{--                                    </p>--}}
{{--                                @endif--}}
{{--                                <p class="helper-block">--}}
{{--                                    {{ trans('global.role.fields.permissions_helper') }}--}}
{{--                                </p>--}}
{{--                            </div>--}}
                            <div class="form-group {{ $errors->has('permissions') ? 'has-error' : '' }}">
                                <label for="permissions">{{ trans('global.role.fields.permissions') }} </label>
                                <h4> Contract </h4>
                                <table class="table table-bordered">
                                    <tr>
                                        <td>Name</td>
                                        <td>Create</td>
                                        <td>Read</td>
                                        <td>Update</td>
                                        <td>Delete</td>
                                    </tr>
                                    <?php $permission = array_values($permissions->where('id', '>=',
                                        19)->where('id', '<=', 78)->toArray());?>

                                    @for($i = 0; $i <= count($permission); $i+=4)
                                        @if($i < 60)
                                            <tr>
                                                <td> {{str_replace('Create' , '',$permission[$i]['description'])}}</td>
                                                <td><input type="checkbox" name="permissions[]"
                                                           value="{{$permission[$i]['id']}}" @if(isset($role) && $role->permissions->contains($permission[$i]['id'])) checked @endif></td>
                                                <td><input type="checkbox" name="permissions[]"
                                                           value="{{$permission[$i + 1]['id']}}" @if(isset($role) && $role->permissions->contains($permission[$i + 1]['id'])) checked @endif></td>
                                                <td><input type="checkbox" name="permissions[]"
                                                           value="{{$permission[$i + 2]['id']}}" @if(isset($role) && $role->permissions->contains($permission[$i + 2]['id'])) checked @endif></td>
                                                <td><input type="checkbox" name="permissions[]"
                                                           value="{{$permission[$i + 3]['id']}}" @if(isset($role) && $role->permissions->contains($permission[$i + 3]['id'])) checked @endif></td>
                                            </tr>
                                        @endif
                                    @endfor

                                </table>
                                <h4> CPCL </h4>
                                <table class="table table-striped table-bordered">
                                    <tr>
                                        <td>Name</td>
                                        <td>Create</td>
                                        <td>Read</td>
                                        <td>Update</td>
                                        <td>Delete</td>
                                    </tr>
                                    <?php $permission = array_values($permissions->where('id', '>=',
                                        79)->toArray());?>

                                    @for($i = 0; $i <= count($permission); $i+=4)
                                        @if($i < 65)
                                            <tr>
                                                <td> {{str_replace('Create' , '',$permission[$i]['description'])}}</td>
                                                <td><input type="checkbox" name="permissions[]"
                                                           value="{{$permission[$i]['id']}}" @if(isset($role) && $role->permissions->contains($permission[$i]['id'])) checked @endif></td>
                                                <td><input type="checkbox" name="permissions[]"
                                                           value="{{$permission[$i + 1]['id']}}" @if(isset($role) && $role->permissions->contains($permission[$i + 1]['id'])) checked @endif></td>
                                                <td><input type="checkbox" name="permissions[]"
                                                           value="{{$permission[$i + 2]['id']}}" @if(isset($role) && $role->permissions->contains($permission[$i + 2]['id'])) checked @endif></td>
                                                <td><input type="checkbox" name="permissions[]"
                                                           value="{{$permission[$i + 3]['id']}}" @if(isset($role) && $role->permissions->contains($permission[$i + 3]['id'])) checked @endif></td>
                                            </tr>
                                        @endif
                                    @endfor

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
