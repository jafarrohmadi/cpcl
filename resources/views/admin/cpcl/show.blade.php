@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="row page-titles" style="z-index: 0">
            <div class="col p-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('admin/contract') }}">Contract</a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.cpcl.index', [$contractId]) }}">CPCL</a></li>
                    <li class="breadcrumb-item active">List</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Show CPCL</h4>

                        <table class="table table-bordered table-striped">

                            <tbody>
                            @can('cpcl_province_show')
                                <tr>
                                    <th>
                                        Provinsi
                                    </th>
                                    <td>
                                        {{ $cpcl->province ?? '' }}
                                    </td>
                                </tr>
                            @endcan
                            @can('cpcl_districts_show')
                                <tr>
                                    <th>
                                        Kabupaten
                                    </th>
                                    <td>
                                        {{ $cpcl->districts ?? '' }}
                                    </td>
                                </tr>
                            @endcan
                            @can('cpcl_sub_district_show')
                                <tr>
                                    <th>
                                        Kecamatan
                                    </th>
                                    <td>
                                        {{ $cpcl->sub_district ?? '' }}
                                    </td>
                                </tr>
                            @endcan
                            @can('cpcl_village_show')
                                <tr>
                                    <th>
                                        Desa
                                    </th>
                                    <td>
                                        {{ $cpcl->village ?? '' }}
                                    </td>
                                </tr>
                            @endcan
                            @can('cpcl_farmers_group_name_show')
                                <tr>
                                    <th>
                                        Nama Kelompok Tani / Gapoktan
                                    </th>
                                    <td>
                                        {{ $cpcl->farmers_group_name ?? '' }}
                                    </td>
                                </tr>
                            @endcan
                            @can('cpcl_chairman_farmers_group_name_show')
                                <tr>
                                    <th>
                                        Ketua Kelompok Tani / Gapoktan
                                    </th>
                                    <td>
                                        {{ $cpcl->chairman_farmers_group_name ?? '' }}
                                    </td>
                                </tr>
                            @endcan
                            @can('cpcl_nik_show')
                                <tr>
                                    <th>
                                        NIK
                                    </th>
                                    <td>
                                        {{ $cpcl->nik ?? '' }}
                                    </td>
                                </tr>
                            @endcan
                            @can('cpcl_phone_number_show')
                                <tr>
                                    <th>
                                        No. HP
                                    </th>
                                    <td>
                                        {{ $cpcl->phone_number ?? '' }}
                                    </td>
                                </tr>
                            @endcan
                            @can('cpcl_area_ha_show')
                                <tr>
                                    <th>
                                        Luas (Ha)
                                    </th>
                                    <td>
                                        {{ $cpcl->area_ha ?? '' }}
                                    </td>
                                </tr>
                            @endcan
                            @can('cpcl_fertilizer_show')
                                @if($contract->unit_fertilizer != 'LITER')
                                    <tr>
                                        <th>
                                            @if($contract->unit_fertilizer == 'KG')
                                                ZAK
                                            @else
                                                KG
                                            @endif
                                        </th>
                                        <td>
                                            {{ $cpcl->zakorkg ?? '' }}
                                        </td>
                                    </tr>
                                @endif
                                <tr>
                                    <th>
                                        {{ (new \App\Models\Contract)->getFertilizer($contract->type_of_fertilizer) }}
                                        ({{ $contract->unit_fertilizer }})
                                    </th>
                                    <td>
                                        {{ $cpcl->fertilizer ?? '' }}
                                    </td>
                                </tr>
                            @endcan
                            @can('cpcl_scan_bast_show')
                                <tr>
                                    <th>
                                        Scan BAST/Surat Jalan/Open Camera/ KTP
                                    </th>
                                    <td>
                                        {!!  $cpcl->scan_bast ? getFile($cpcl->scan_bast) : ''  !!}
                                    </td>
                                </tr>
                            @endcan
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
