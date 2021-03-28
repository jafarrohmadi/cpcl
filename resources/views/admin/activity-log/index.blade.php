@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="row page-titles" style="z-index: 0">
            <div class="col p-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Activity Log</a>
                    </li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Activity Log</h4>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                <tr>
                                    <th width="10">
                                        No.
                                    </th>
                                    <th>
                                        Tanggal
                                    </th>
                                    <th>
                                        Name Log
                                    </th>
                                    <th>
                                        ID
                                    </th>
                                    <th>
                                        Nama User
                                    </th>
                                    <th>
                                        Logs
                                    </th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($log as $key => $logs)
                                    <tr data-entry-id="{{ $logs->id }}">
                                        <td>
                                            {{ $key + 1 }}
                                        </td>
                                        <td>
                                            {{ $logs->created_at }}
                                        </td>
                                        <td>
                                            {{ $logs->description ?? '' }}
                                        </td>
                                        <td>
                                            ID  : {{ $logs->subject_id  }}
                                        </td>
                                        <td>
                                            {{ $logs->causer->name }}
                                        </td>
                                        <td>
                                            {{ $logs->changes }}
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

