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
                                CPCL {{ trans('global.list') }} {{$contract->contract_number ?? ''}}
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
                                    @can('cpcl_province_show')
                                        <th>
                                            Provinsi
                                        </th>
                                    @endcan
                                    @can('cpcl_districts_show')
                                        <th>
                                            Kabupaten
                                        </th>
                                    @endcan
                                    @can('cpcl_sub_district_show')
                                        <th>
                                            Kecamatan
                                        </th>
                                    @endcan
                                    @can('cpcl_village_show')
                                        <th>
                                            Desa
                                        </th>
                                    @endcan
                                    @can('cpcl_farmers_group_name_show')
                                        <th>
                                            Nama Kelompok Tani / Gapoktan
                                        </th>
                                    @endcan
                                    @can('cpcl_chairman_farmers_group_name_show')
                                        <th>
                                            Ketua Kelompok Tani / Gapoktan
                                        </th>
                                    @endcan
                                    @can('cpcl_nik_show')
                                        <th>
                                            NIK
                                        </th>
                                    @endcan
                                    @can('cpcl_phone_number_show')
                                        <th>
                                            No. HP
                                        </th>
                                    @endcan
                                    @can('cpcl_area_ha_show')
                                        <th>
                                            Luas (Ha)
                                        </th>
                                    @endcan
                                    @can('cpcl_fertilizer_show')
                                        @if($contract->unit_fertilizer != 'LITER')
                                            <th>
                                                @if($contract->unit_fertilizer == 'KG')
                                                    ZAK
                                                @else
                                                    KG
                                                @endif
                                            </th>
                                        @endif
                                        <th>
                                            {{ (new \App\Models\Contract)->getFertilizer($contract->type_of_fertilizer) }}
                                            ({{ $contract->unit_fertilizer }})
                                        </th>
                                    @endcan
                                    @can('cpcl_scan_bast_show')
                                        <th>
                                            Scan BAST/Surat Jalan/Open Camera/ KTP
                                        </th>
                                    @endcan
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
                                        @can('cpcl_province_show')
                                            <td>
                                                {{ $cpcls->province ?? '' }}
                                            </td>
                                        @endcan
                                        @can('cpcl_districts_show')
                                            <td>
                                                {{ $cpcls->districts ?? '' }}
                                            </td>
                                        @endcan
                                        @can('cpcl_sub_district_show')
                                            <td>
                                                {{ $cpcls->sub_district ?? '' }}
                                            </td>
                                        @endcan
                                        @can('cpcl_village_show')
                                            <td>
                                                {{ $cpcls->village ?? '' }}
                                            </td>
                                        @endcan
                                        @can('cpcl_farmers_group_name_show')
                                            <td>
                                                {{ $cpcls->farmers_group_name ?? '' }}
                                            </td>
                                        @endcan
                                        @can('cpcl_chairman_farmers_group_show')
                                            <td>
                                                {{ $cpcls->chairman_farmers_group_name ?? '' }}
                                            </td>
                                        @endcan
                                        @can('cpcl_nik_show')
                                            <td>
                                                {{ $cpcls->nik ?? '' }}
                                            </td>
                                        @endcan
                                        @can('cpcl_phone_number_show')
                                            <td>
                                                {{ $cpcls->phone_number ?? '' }}
                                            </td>
                                        @endcan
                                        @can('cpcl_area_ha_show')
                                            <td>
                                                {{ $cpcls->area_ha ?? '' }}
                                            </td>
                                        @endcan
                                        @can('cpcl_fertilizer_show')
                                            @if($contract->unit_fertilizer != 'LITER')
                                                <td> {{$cpcls->zakorkg ?? ''}}</td>
                                            @endif
                                            <td>
                                                {{ $cpcls->fertilizer ?? '' }}
                                            </td>
                                        @endcan
                                        @can('cpcl_scan_bast_show')
                                            <td>
                                                {!!  $cpcls->scan_bast ? getFile($cpcls->scan_bast) : ''  !!}
                                            </td>
                                        @endcan
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
        var mq  = window.matchMedia('(max-width: 570px)')
        var ctx = document.getElementById('doughutChart')
        if(mq.matches) {
            ctx.height = 500
        } else {
            ctx.height = 200
        }

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

        var ctx2 = document.getElementById('doughutChart2')
        if(mq.matches) {
            ctx2.height = 500
        } else {
            ctx2.height = 200
        }

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
