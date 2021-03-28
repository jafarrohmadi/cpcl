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
                            <tr>
                                <th>
                                    Provinsi
                                </th>
                                <td>
                                    {{ $cpcl->province ?? '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Kabupaten
                                </th>
                                <td>
                                    {{ $cpcl->districts ?? '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Kecamatan
                                </th>
                                <td>
                                    {{ $cpcl->sub_district ?? '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Desa
                                </th>
                                <td>
                                    {{ $cpcl->village ?? '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Nama Kelompok Tani / Gapoktan
                                </th>
                                <td>
                                    {{ $cpcl->farmers_group_name ?? '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Ketua Kelompok Tani / Gapoktan
                                </th>
                                <td>
                                    {{ $cpcl->chairman_farmers_group_name ?? '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    NIK
                                </th>
                                <td>
                                    {{ $cpcl->nik ?? '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    No. HP
                                </th>
                                <td>
                                    {{ $cpcl->phone_number ?? '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Luas (Ha)
                                </th>
                                <td>
                                    {{ $cpcl->area_ha ?? '' }}
                                </td>
                            </tr>
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
                            <tr>
                                <th>
                                    {{ (new \App\Models\Contract)->getFertilizer($contract->type_of_fertilizer) }}
                                    ({{ $contract->unit_fertilizer }})
                                </th>
                                <td>
                                    {{ $cpcl->fertilizer ?? '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Jadwal Tanam
                                </th>
                                <td>
                                    {{ $cpcl->planting_schedule ?? '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Titik Koordinat
                                </th>
                                <td>
                                    {{ $cpcl->coordinate_point ?? '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Jenis Lahan
                                </th>
                                <td>
                                    {{ $cpcl->type_of_land ?? '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Scan Bast
                                </th>
                                <td>
                                    {!!  $cpcl->scan_bast ? getFile($cpcl->scan_bast) : ''  !!}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Scan Surat Jalan
                                </th>
                                <td>
                                    {!! $cpcl->scan_of_travel_letters ? getFile($cpcl->scan_of_travel_letters): ''  !!}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Open Camera
                                </th>
                                <td>
                                    {!! $cpcl->open_camera_photo ? getFile($cpcl->open_camera_photo) : ''  !!}
                                </td>
                            </tr>

                            <tr>
                                <th>
                                    Scan KTP
                                </th>
                                <td>
                                    {!! $cpcl->scan_ktp ? getFile($cpcl->scan_ktp) : ''  !!}
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
