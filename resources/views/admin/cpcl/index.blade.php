@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="row page-titles" style="z-index: 0">
            @can('permission_create')
                <div class="col p-0">
                    <a class="btn btn-success" href="{{ route("admin.cpcl.create" , [$contractId]) }}">
                        {{ trans('global.add') }} CPCL
                    </a>
                </div>
            @endcan

            <div class="col p-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('admin/contract') }}">Contract</a>
                    </li>
                    <li class="breadcrumb-item">CPCL</li>
                    <li class="breadcrumb-item active">List</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title row">
                            <div class="col-sm-6">
                                CPCL {{ trans('global.list') }} From Contract ID {{$contractId}}
                            </div>
                            <div class="col-sm-6" style="text-align: right;">
                                <a class="btn btn-success" href="{{ url("admin/contract/$contractId/cpcl/export") }}">
                                    Export CPCL
                                </a>
                            </div>
                        </h4>

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                <tr>
                                    <th width="10">
                                        No.
                                    </th>
                                    <th>
                                        Provinsi
                                    </th>
                                    <th>
                                        Kabupaten
                                    </th>
                                    <th>
                                        Kecamatan
                                    </th>
                                    <th>
                                        Desa
                                    </th>
                                    <th>
                                        Nama Kelompok Tani / Gapoktan
                                    </th>
                                    <th>
                                        Ketua Kelompok Tani / Gapoktan
                                    </th>
                                    <th>
                                        NIK
                                    </th>
                                    <th>
                                        No. HP
                                    </th>
                                    <th>
                                        Luas (Ha)
                                    </th>

                                    <th>
                                        {{ (new \App\Models\Contract)->getFertilizer($contract->type_of_fertilizer) }}
                                    </th>

                                    <th>
                                        Jadwal Tanam
                                    </th>
                                    <th>
                                        Titik Koordinat
                                    </th>
                                    <th>
                                        Jenis Lahan
                                    </th>
                                    <th>
                                        Scan Bast
                                    </th>
                                    <th>
                                        Scan Surat Jalan
                                    </th>
                                    <th>
                                        Open Camera
                                    </th>
                                    <th>
                                        Scan KTP
                                    </th>
                                    <th>
                                        User Action
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($cpcl as $key => $cpcls)
                                    <tr data-entry-id="{{ $cpcls->id }}">
                                        <td>
                                            {{ $key + 1 }}
                                        </td>

                                        <td>
                                            {{ $cpcls->province ?? '' }}
                                        </td>
                                        <td>
                                            {{ $cpcls->districts ?? '' }}
                                        </td>
                                        <td>
                                            {{ $cpcls->sub_district ?? '' }}
                                        </td>
                                        <td>
                                            {{ $cpcls->village ?? '' }}
                                        </td>
                                        <td>
                                            {{ $cpcls->farmers_group_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $cpcls->chairman_farmers_group_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $cpcls->nik ?? '' }}
                                        </td>
                                        <td>
                                            {{ $cpcls->phone_number ?? '' }}
                                        </td>
                                        <td>
                                            {{ $cpcls->area_ha ?? '' }}
                                        </td>
                                        <td>
                                            {{ $cpcls->fertilizer ?? '' }}
                                        </td>

                                        <td>
                                            {{ $cpcls->planting_schedule ?? '' }}
                                        </td>
                                        <td>
                                            {{ $cpcls->coordinate_point ?? '' }}
                                        </td>

                                        <td>
                                            {{ $cpcls->type_of_land ?? '' }}
                                        </td>
                                        <td>
                                            {!!  $cpcls->scan_bast ? getFile($cpcls->scan_bast) : ''  !!}
                                        </td>
                                        <td>
                                            {!! $cpcls->scan_of_travel_letters ? getFile($cpcls->scan_of_travel_letters): ''  !!}
                                        </td>
                                        <td>
                                            {!! $cpcls->open_camera_photo ? getFile($cpcls->open_camera_photo) : ''  !!}
                                        </td>
                                        <td>
                                            {!! $cpcls->scan_ktp ? getFile($cpcls->scan_ktp) : ''  !!}
                                        </td>

                                        <td>
                                            <a class="btn btn-xs btn-primary"
                                               href="{{ route('admin.cpcl.show', [$contractId, $cpcls->id]) }}">
                                                {{ trans('global.view') }}
                                            </a>

                                            <a class="btn btn-xs btn-info"
                                               href="{{ route('admin.cpcl.edit',[$contractId, $cpcls->id]) }}">
                                                {{ trans('global.edit') }}
                                            </a>

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
