@extends('layouts.admin')
@section('content')

    <div class="container-fluid">
        <div class="row page-titles" style="z-index: 0">
            <div class="col p-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Management</a>
                    </li>
                    <li class="breadcrumb-item "><a href="{{url('admin/permissions')}}"> Permissions</a></li>
                    <li class="breadcrumb-item active">{{ trans('global.edit') }} {{ trans('global.permission.title_singular') }}</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ trans('global.edit') }} {{ trans('global.permission.title_singular') }}</h4>

                        <div class="card">

                            <form action="{{ route("admin.permissions.update", [$permission->id]) }}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                                    <label for="title">{{ trans('global.permission.fields.title') }}*</label>
                                    <input type="text" id="title" name="title" class="form-control"
                                           value="{{ old('title', isset($permission) ? $permission->title : '') }}">
                                    @if($errors->has('title'))
                                        <p class="help-block">
                                            {{ $errors->first('title') }}
                                        </p>
                                    @endif
                                    <p class="helper-block">
                                        {{ trans('global.permission.fields.title_helper') }}
                                    </p>
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
    </div>

@endsection
