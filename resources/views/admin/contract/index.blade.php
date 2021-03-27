@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="row page-titles" style="z-index: 0">
            @can('permission_create')
                <div class="col p-0">
                    <a class="btn btn-success" href="{{ route("admin.contract.create") }}">
                        {{ trans('global.add') }} Contract
                    </a>
                </div>
            @endcan
            <div class="col p-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Contract</a>
                    </li>
                    <li class="breadcrumb-item active">List</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"> Contract {{ trans('global.list') }}</h4>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                <tr>
                                    <th width="10">
                                        No.
                                    </th>
                                    <th>
                                        Nomor Kontrak
                                    </th>
                                    <th>
                                        &nbsp;Tanggal Dimulai
                                    </th>
                                    <th>
                                        &nbsp;Tanggal Berakhir
                                    </th>
                                    <th>
                                        &nbsp;Jenis Pupuk
                                    </th>
                                    <th>
                                        &nbsp;Satuan Pupuk
                                    </th>
                                    <th>
                                        &nbsp;Jumlah Row CPCL
                                    </th>
                                    <th>
                                        &nbsp;Total PUPUK(KG/LITER)
                                    </th>
                                    <th>
                                        Satuan Kerja
                                    </th>
                                    <th>
                                        &nbsp;CPCL
                                    </th>
                                    <th>
                                        &nbsp;Posisi Barang
                                    </th>
                                    <th>
                                        &nbsp;Uji Mutu
                                    </th>
                                    <th>
                                        &nbsp;Barang Sudah Diterima
                                    </th>
                                    <th>
                                        &nbsp;Nilai Kontrak
                                    </th>

                                    <th>
                                        &nbsp;Pajak
                                    </th>
                                    <th>
                                        &nbsp;Nilai Real Yang Diterima
                                    </th>
                                    <th>
                                        &nbsp;Proses Penagihan
                                    </th>
                                    <th>
                                        User Action
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($contract as $key => $contracts)
                                    <tr data-entry-id="{{ $contracts->id }}">
                                        <td>
                                            {{ $key + 1 }}
                                        </td>
                                        <td>
                                            {{ $contracts->contract_number ?? '' }}
                                        </td>
                                        <td>
                                            {{ $contracts->start_date ? date('d-m-Y' , strtotime($contracts->start_date)) : '' }}
                                        </td>
                                        <td @if($contracts->end_date) {{ endDateRed($contracts->end_date) }} @endif>
                                            {{ $contracts->end_date ? date('d-m-Y' , strtotime($contracts->end_date)) : '' }}
                                        </td>
                                        <th>
                                            {{ (new \App\Models\Contract)->getFertilizer($contracts->type_of_fertilizer) ?? '' }}
                                        </th>
                                        <th>
                                            &nbsp;{{ $contracts->type_of_fertilizer ?? '' }}
                                        </th>
                                        <th>
                                            &nbsp;{{ $contracts->number_of_row_cpcl ?? '' }}
                                        </th>
                                        <th>
                                            &nbsp;{{ $contracts->total_kg_fertilizer ?? '' }}
                                        </th>
                                        <td>
                                            {{ $contracts->work_unit ?? '' }}
                                        </td>

                                        <td>
                                            <a href="{{ url('admin/contract/'.$contracts->id.'/cpcl') }}">view/edit
                                                CPCL</a>
                                        </td>
                                        <td>
                                            {{ $contracts->item_position ?? '' }}
                                        </td>
                                        <td>
                                            {{ $contracts->quality_test ?? '' }}
                                        </td>
                                        <td>
                                            {{ $contracts->item_receive ?? '' }}
                                        </td>
                                        <td>
                                            {{ numberFormat($contracts->contract_value) ?? '' }}
                                        </td>
                                        <td>
                                            {{ numberFormat($contracts->tax) ?? '' }}
                                        </td>
                                        <td>
                                            {{ numberFormat($contracts->real_value) ?? '' }}
                                        </td>
                                        <td>
                                            Cek list: <br>

                                            @if($contracts->billing_progress != 'null')
                                                @foreach(json_decode($contracts->billing_progress) as $billing)
                                                    - {{$billing == 'doku' ? "Verifikasi Dokumen & Bast" : $billing}}
                                                    <br>
                                                @endforeach
                                            @endif
                                        </td>

                                        <td>
                                            <a class="btn btn-xs btn-primary"
                                               href="{{ route('admin.contract.show', $contracts->id) }}">
                                                {{ trans('global.view') }}
                                            </a>

                                            <a class="btn btn-xs btn-info"
                                               href="{{ route('admin.contract.edit', $contracts->id) }}">
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

