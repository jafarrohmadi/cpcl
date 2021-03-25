@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="row page-titles" style="z-index: 0">
            <div class="col p-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Management</a>
                    </li>
                    <li class="breadcrumb-item "><a href="{{url('admin/permissions')}}"> Permissions</a></li>
                    <li class="breadcrumb-item active">{{ trans('global.show') }} {{ trans('global.permission.title') }}</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ trans('global.show') }} {{ trans('global.permission.title') }}</h4>

                        <div class="card">
                            <table class="table table-bordered">
                                <tbody>
                                <tr>
                                    <th>
                                        {{ trans('global.permission.fields.title') }}
                                    </th>
                                    <td>
                                        {{ $permission->title }}
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
