@extends('layouts.admin')
@section('content')

    <div class="container-fluid">
        <div class="row page-titles" style="z-index: 0">
            <div class="col p-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Management</a>
                    </li>
                    <li class="breadcrumb-item "><a href="{{ url('admin/roles') }}">Roles</a></li>
                    <li class="breadcrumb-item active">Show Roles</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Show {{ trans('global.role.title_singular') }}</h4>

                        <table class="table table-bordered table-striped">
                            <tbody>
                            <tr>
                                <th>
                                    {{ trans('global.role.fields.title') }}
                                </th>
                                <td>
                                    {{ $role->title }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Permissions
                                </th>
                                <td>
                                    @foreach($role->permissions as $id => $permissions)
                                        <span class="label label-info label-many">{{ $permissions->description }}</span>
                                    @endforeach
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
