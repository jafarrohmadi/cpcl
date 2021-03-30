@extends('layouts.admin')
@section('content')
    <div class="container-fluid">

        <div class="row page-titles" style="z-index: 0">

            <div class="col p-0">
                <a class="btn btn-success" href="{{ route("admin.users.create") }}">
                    {{ trans('global.add') }} {{ trans('global.user.title_singular') }}
                </a>
            </div>
            <div class="col p-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Management</a>
                    </li>
                    <li class="breadcrumb-item active">User</li>
                </ol>
            </div>
        </div>


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ trans('global.user.title_singular') }} {{ trans('global.list') }}</h4>

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover zero-configuration">
                                <thead>
                                <tr>
                                    <th width="10">
                                        No
                                    </th>
                                    <th>
                                        {{ trans('global.user.fields.name') }}
                                    </th>
                                    <th>
                                        {{ trans('global.user.fields.email') }}
                                    </th>
                                    <th>
                                        {{ trans('global.user.fields.roles') }}
                                    </th>
                                    <th>
                                        &nbsp;Actions
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $key => $user)
                                    <tr data-entry-id="{{ $user->id }}">
                                        <td>
                                            {{$key +1}}
                                        </td>
                                        <td>
                                            {{ $user->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $user->email ?? '' }}
                                        </td>
                                        <td>
                                            @foreach($user->roles as $key => $item)
                                                <span class="badge badge-info">{{ $item->title }}</span>
                                            @endforeach
                                        </td>
                                        <td>

                                            <a class="btn btn-xs btn-primary"
                                               href="{{ route('admin.users.show', $user->id) }}">
                                                {{ trans('global.view') }}
                                            </a>

                                            <a class="btn btn-xs btn-info"
                                               href="{{ route('admin.users.edit', $user->id) }}">
                                                {{ trans('global.edit') }}
                                            </a>

                                            <form action="{{ route('admin.users.destroy', $user->id) }}"
                                                  method="POST"
                                                  onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                                  style="display: inline-block;">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="submit" class="btn btn-xs btn-danger"
                                                       value="{{ trans('global.delete') }}">
                                            </form>

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
