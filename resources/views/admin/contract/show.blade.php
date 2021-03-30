@extends('layouts.admin')
@section('content')

    <div class="container-fluid">
        <div class="row page-titles" style="z-index: 0">
            <div class="col p-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item "><a href="{{ url('admin/contract') }}">Contract</a></li>
                    <li class="breadcrumb-item active">Show Contract</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Show Contract</h4>

                        <table class="table table-bordered table-striped">

                            <tbody>
                            @can('contract_number_show')
                                <tr>
                                    <th>
                                        Nomor Kontrak
                                    </th>
                                    <td>
                                        {{ $contract->contract_number }}
                                    </td>
                                </tr>
                            @endcan
                            @can('contract_document_show')
                                <tr>
                                    <th>
                                        Dokumen Kontrak
                                    </th>
                                    <td>
                                        {!!  $contract->contract_document ? getFile($contract->contract_document) : ''  !!}
                                    </td>
                                </tr>
                            @endcan
                            @can('contract_addendum_number_show')
                                <tr>
                                    <th>
                                        Nomor Addendum Kontrak
                                    </th>
                                    <td>
                                        {!!  $contract->contract_addendum_number ?? '' !!}
                                    </td>
                                </tr>
                            @endcan
                            @can('contract_addendum_document_show')
                                <tr>
                                    <th>
                                        Dokumen Addendum Kontrak
                                    </th>
                                    <td>
                                        {!!  $contract->contract_addendum_document ? getFile($contract->contract_addendum_document) : ''  !!}
                                    </td>
                                </tr>
                            @endcan
                            @can('contract_total_kg_fertilizer_show')
                                <tr>
                                    <th>
                                        Total PUPUK(KG/LITER)
                                    </th>
                                    <td>
                                        {{ $contract->total_kg_fertilizer }}
                                    </td>
                                </tr>
                            @endcan
                            @can('start_date_show')
                                <tr>
                                    <th>
                                        Tanggal Dimulai
                                    </th>
                                    <td>
                                        {{ $contract->start_date }}
                                    </td>
                                </tr>
                            @endcan
                            @can('end_date_show')
                                <tr>
                                    <th>
                                        Tanggal Berakhir
                                    </th>
                                    <td>
                                        {{ $contract->end_date }}
                                    </td>
                                </tr>
                            @endcan
                            @can('work_unit_show')
                                <tr>
                                    <th>
                                        Satuan Kerja
                                    </th>
                                    <td>
                                        {{ $contract->work_unit }}
                                    </td>
                                </tr>
                            @endcan
                            @can('cpcl_show')
                                <tr>
                                    <th>
                                        CPCL
                                    </th>
                                    <td>
                                        <a href="{{ url('admin/contract/'. $contract->id.'/cpcl/' }}">view/edit CPCL</a>

                                    </td>
                                </tr>
                            @endcan
                            @can('item_position_show')
                                <tr>
                                    <th>
                                        Posisi Barang
                                    </th>
                                    <td>
                                        {{ $contract->item_position }}
                                    </td>
                                </tr>
                            @endcan
                            @can('quality_test_show')
                                <tr>
                                    <th>
                                        Uji Mutu
                                    </th>
                                    <td>
                                        {{ $contract->quality_test }}
                                    </td>
                                </tr>
                            @endcan
                            @can('item_receive_show')
                                <tr>
                                    <th>
                                        Barang Sudah Diterima
                                    </th>
                                    <td>
                                        {{ $contract->item_receive }}
                                    </td>
                                </tr>
                            @endcan
                            @can('contract_value_show')
                                <tr>
                                    <th>
                                        Nilai Kontrak
                                    </th>
                                    <td>
                                        {{ numberFormat($contract->contract_value) }}
                                    </td>
                                </tr>
                            @endcan
                            @can('tax_show')
                                <tr>
                                    <th>
                                        Pajak PPN
                                    </th>
                                    <td>
                                        {{ numberFormat($contract->tax) }}
                                    </td>
                                </tr>
                            @endcan
                            @can('tax_pph_show')
                                <tr>
                                    <th>
                                        Pajak PPH
                                    </th>
                                    <td>
                                        {{ numberFormat($contract->tax_pph) }}
                                    </td>
                                </tr>
                            @endcan
                            @can('real_value_show')
                                <tr>
                                    <th>
                                        Nilai Real Yang Diterima
                                    </th>
                                    <td>
                                        {{ numberFormat($contract->real_value) }}
                                    </td>
                                </tr>
                            @endcan
                            @can('billing_document_show')
                                <tr>
                                    <th>
                                        Dokumen Penagihan
                                    </th>
                                    <td>
                                        {!!  $contract->billing_document ? getFile($contract->billing_document) : ''  !!}
                                    </td>
                                </tr>
                            @endcan
                            @can('billing_progress_show')
                                <tr>
                                    <th>
                                        Proses Penagihan
                                    </th>
                                    <td>
                                        @if($contract->billing_progress != 'null')
                                            @foreach(json_decode($contract->billing_progress) as $billings)
                                                - {{$billings == 'doku'? 'Verifikasi Dokumen & Bast': $billings}}<br>
                                            @endforeach
                                        @endif
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
