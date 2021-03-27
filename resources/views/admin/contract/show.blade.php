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
                            <tr>
                                <th>
                                    Nomor Kontrak
                                </th>
                                <td>
                                    {{ $contract->contract_number }}
                                </td>
                            </tr>

                            <tr>
                                <th>
                                    Tanggal Dimulai
                                </th>
                                <td>
                                    {{ $contract->start_date }}
                                </td>
                            </tr>

                            <tr>
                                <th>
                                    Tanggal Berakhir
                                </th>
                                <td>
                                    {{ $contract->end_date }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Jenis Pupuk
                                </th>
                                <td>
                                    {{ (new \App\Models\Contract)->getFertilizer($contract->type_of_fertilizer) }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Satuan Pupuk
                                </th>
                                <td>
                                    {{ $contract->unit_fertilizer }}
                                </td>
                            </tr>
                            @if($contract->unit_fertilizer == 'ZAK')
                                <tr>
                                    <th>
                                        KG Ke Zak
                                    </th>
                                    <td>
                                        {{ $contract->zak_to_kg }}
                                    </td>
                                </tr>
                            @endif
                            <tr>
                                <th>
                                    Jumlah Row CPCL
                                </th>
                                <td>
                                    {{ $contract->number_of_row_cpcl }}
                                </td>
                            </tr>

                            <tr>
                                <th>
                                    Total PUPUK(KG/LITER)
                                </th>
                                <td>
                                    {{ $contract->total_kg_fertilizer }}
                                </td>
                            </tr>

                            <tr>
                                <th>
                                    Satuan Kerja
                                </th>
                                <td>
                                    {{ $contract->work_unit }}
                                </td>
                            </tr>

                            <tr>
                                <th>
                                    CPCL
                                </th>
                                <td>
                                    <a href="{{ url('admin/cpcl/'. $contract->id) }}">Link ke tabel CPCL</a>

                                </td>
                            </tr>

                            <tr>
                                <th>
                                    Posisi Barang
                                </th>
                                <td>
                                    {{ $contract->item_position }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Uji Mutu
                                </th>
                                <td>
                                    {{ $contract->quality_test }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Barang Sudah Diterima
                                </th>
                                <td>
                                    {{ $contract->item_receive }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Nilai Kontrak
                                </th>
                                <td>
                                    {{ numberFormat($contract->contract_value) }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Pajak
                                </th>
                                <td>
                                    {{ numberFormat($contract->tax) }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Nilai Real Yang Diterima
                                </th>
                                <td>
                                    {{ numberFormat($contract->real_value) }}
                                </td>
                            </tr>
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
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
