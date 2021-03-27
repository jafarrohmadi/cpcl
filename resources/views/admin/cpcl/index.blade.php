@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="row page-titles" style="z-index: 0">
            @if(count($cpcl) < $contract->number_of_row_cpcl)
                @can('permission_create')
                    <div class="col p-0">
                        <a class="btn btn-success" href="{{ route("admin.cpcl.create" , [$contractId]) }}">
                            {{ trans('global.add') }} CPCL
                        </a>
                    </div>
                @endcan
            @endif

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
            <div class="col-sm-6 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Persentase CPCL</h4>
                        <canvas id="doughutChart" width="500" height="250"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Persentase PUPUK</h4>
                        <canvas id="doughutChart2" width="500" height="250"></canvas>
                    </div>
                </div>
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
                                        ({{ $contract->unit_fertilizer }})
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

@section('scripts')
    <script src="{{asset('assets/plugins/chartjs/Chart.bundle.js')}}/"></script>
    <script>
        var ctx     = document.getElementById('doughutChart')
        ctx.height  = 150
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                datasets: [{
                    data: ["{{$persentaseCPCLRow}}", "{{$kekuranganCPCLRow}}"],
                    backgroundColor: [
                        'rgba(110,211,207,0.7)',
                        'rgba(144,104,190,0.07)',
                    ],
                    hoverBackgroundColor: [
                        'rgba(110,211,207,0.7)',
                        'rgba(144,104,190,0.07)',
                    ]

                }],
                labels: [
                    'Persentase Pengisian CPCL (%)',
                    'Kekurangan Pengisian CPCL (%)',
                ]
            },
            options: {
                responsive: true,
            }
        })

        var ctx2     = document.getElementById('doughutChart2')
        ctx2.height  = 150
        var myChart2 = new Chart(ctx2, {
            type: 'doughnut',
            data: {
                datasets: [{
                    data: ["{{ $persentaseCPCL }}", "{{ $kekuranganCPCL }}"],
                    backgroundColor: [
                        'rgba(110,211,207,0.7)',
                        'rgba(144,104,190,0.07)',
                       ,
                    ],
                    hoverBackgroundColor: [
                        'rgba(110,211,207,0.7)',
                        'rgba(144,104,190,0.07)',

                    ]

                }],
                labels: [
                    'Persentase Isian Jumlah Pupuk (%)',
                    'Kekurangan Isian Jumlah Pupuk (%)',
                ]
            },
            options: {
                responsive: true,
            }
        })
    </script>
@endsection
