@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="row page-titles" style="z-index: 0">
            @can('role_create')
                <div class="col p-0">
                    <a class="btn btn-success" href="{{ route("admin.roles.create") }}">
                        {{ trans('global.add') }} {{ trans('global.role.title_singular') }}
                    </a>
                </div>
            @endcan
            <div class="col p-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Management</a>
                    </li>
                    <li class="breadcrumb-item active">Roles</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">  {{ trans('global.role.title_singular') }} {{ trans('global.list') }}</h4>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover zero-configuration">
                                <thead>
                                <tr>
                                    <th width="10">
                                        No
                                    </th>
                                    <th>
                                        {{ trans('global.role.fields.title') }}
                                    </th>
                                    <th>
                                        {{ trans('global.role.fields.permissions') }}
                                    </th>
                                    <th>
                                        Actions
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($roles as $key => $role)
                                    <tr data-entry-id="{{ $role->id }}">
                                        <td>
                                            {{$key + 1}}
                                        </td>
                                        <td>
                                            {{ $role->title ?? '' }}
                                        </td>
                                        <td>
                                            @foreach($role->permissions as $key => $item)
                                                <span class="badge badge-info">{{ $item->description }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            @can('role_show')
                                                <a class="btn btn-xs btn-primary"
                                                   href="{{ route('admin.roles.show', $role->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan
                                            @can('role_edit')
                                                <a class="btn btn-xs btn-info"
                                                   href="{{ route('admin.roles.edit', $role->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan
                                            @can('role_delete')
                                                <form action="{{ route('admin.roles.destroy', $role->id) }}"
                                                      method="POST"
                                                      onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                                      style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn btn-xs btn-danger"
                                                           value="{{ trans('global.delete') }}">
                                                </form>
                                            @endcan
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

@endsection
