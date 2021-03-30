<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

<table class="table table-striped table-bordered" style="table-layout: fixed">
    <thead>
    <tr>
        <th>
            No.
        </th>
        @can('contract_number_show')
            <th style="width: 20px">
                Nomor Kontrak
            </th>
        @endcan
        @can('contract_document_show')
            <th style="width: 20px">
                Dokumen Kontrak
            </th>
        @endcan
        @can('contract_addendum_number_show')
            <th style="width: 20px">
                Nomor Addendum Kontrak
            </th>
        @endcan
        @can('contract_addendum_document_show')
            <th style="width: 20px">
                Dokumen Addendum Kontrak
            </th>
        @endcan
        @can('total_kg_fertilizer_show')
            <th style="width: 20px">
                Total PUPUK(KG/LITER)
            </th>
        @endcan
        @can('start_date_show')
            <th style="width: 20px">
                &nbsp;Tanggal Dimulai
            </th>
        @endcan
        @can('end_date_show')
            <th style="width: 20px">
                &nbsp;Tanggal Berakhir
            </th>
        @endcan
        @can('work_unit_show')
            <th style="width: 20px">
                Satuan Kerja
            </th>
        @endcan

        @can('item_position_show')
            <th style="width: 20px">
                &nbsp;Posisi Barang
            </th>
        @endcan
        @can('quality_test_show')
            <th style="width: 20px">
                &nbsp;Uji Mutu
            </th>
        @endcan
        @can('item_receive_show')
            <th style="width: 20px">
                &nbsp;Barang Sudah Diterima
            </th>
        @endcan
        @can('contract_value_show')
            <th style="width: 20px">
                &nbsp;Nilai Kontrak
            </th>
        @endcan
        @can('tax_show')
            <th style="width: 20px">
                &nbsp;Pajak PPN
            </th>
        @endcan
        @can('tax_pph_show')
            <th style="width: 20px">
                &nbsp;Pajak PPH
            </th>
        @endcan
        @can('real_value_show')
            <th style="width: 20px">
                &nbsp;Nilai Real Yang Diterima
            </th>
        @endcan
        @can('billing_document_show')
            <th style="width: 20px">
                Dokumen Penagihan
            </th>
        @endcan
        @can('billing_progress_show')
            <th style="width: 20px">
                &nbsp;Proses Penagihan
            </th>
        @endcan
        <th style="width: 20px">
            Status
        </th>
    </tr>
    </thead>
    <tbody>
    @foreach($contract as $key => $contracts)
        <tr data-entry-id="{{ $contracts->id }}">
            <td>
                {{ $key + 1 }}
            </td>
            @can('contract_number_show')
                <td style="width: 20px;  ">
                    {{ $contracts->contract_number ?? '' }}
                </td>
            @endcan
            @can('contract_document_show')
                <td style="width: 20px; word-wrap:break-word;">
                    {!!  $contracts->contract_document ? getFileLink($contracts->contract_document) : ''  !!}
                </td>
            @endcan
            @can('contract_addendum_number_show')
                <td style="width: 20px;  word-wrap:break-word;">
                    {!!  $contracts->contract_addendum_number ?? '' !!}
                </td>
            @endcan
            @can('contract_addendum_document_show')
                <td style="width: 20px;  word-wrap:break-word;">
                    {!!  $contracts->contract_addendum_document ? getFileLink($contracts->contract_addendum_document) : ''  !!}
                </td>
            @endcan
            @can('total_kg_fertilizer_show')
                <td style="width: 20px;  word-wrap:break-word;">
                    {{ $contracts->total_kg_fertilizer }}
                </td>
            @endcan
            @can('start_date_show')
                <td style="width: 20px;  word-wrap:break-word;">
                    {{ $contracts->start_date ? date('d-m-Y' , strtotime($contracts->start_date)) : '' }}
                </td>
            @endcan
            @can('end_date_show')
                <td @if($contracts->end_date) {{ endDateRed($contracts->end_date) }} @endif>
                    {{ $contracts->end_date ? date('d-m-Y' , strtotime($contracts->end_date)) : '' }}
                </td>
            @endcan
            @can('work_unit_show')
                <td style="width: 20px;  word-wrap:break-word;">
                    {{ $contracts->work_unit ?? '' }}
                </td>
            @endcan
            @can('item_position_show')
                <td style="width: 20px;  word-wrap:break-word;">
                    {{ $contracts->item_position ?? '' }}
                </td>
            @endcan
            @can('quality_test_show')
                <td style="width: 20px;  word-wrap:break-word;">
                    {{ $contracts->quality_test ?? '' }}
                </td>
            @endcan
            @can('item_receive_show')
                <td style="width: 20px;  word-wrap:break-word;">
                    {{ $contracts->item_receive ?? '' }}
                </td>
            @endcan
            @can('contract_value_show')
                <td style="width: 20px;  word-wrap:break-word;">
                    {{ numberFormat($contracts->contract_value) ?? '' }}
                </td>
            @endcan
            @can('tax_show')
                <td style="width: 20px;  word-wrap:break-word;">
                    {{ numberFormat($contracts->tax) ?? '' }}
                </td>
            @endcan
            @can('tax_pph_show')
                <td style="width: 20px;  word-wrap:break-word;">
                    {{ numberFormat($contracts->tax_pph) ?? '' }}
                </td>@endcan
            @can('real_value_show')
                <td style="width: 20px;  word-wrap:break-word;">
                    {{ numberFormat($contracts->real_value) ?? '' }}
                </td>
            @endcan
            @can('billing_document_show')
                <td style="width: 20px;  word-wrap:break-word;">
                    {!!  $contracts->billing_document ? getFileLink($contracts->billing_document) : ''  !!}
                </td>
            @endcan
            @can('billing_progress_show')
                <td style="width: 20px;  word-wrap:break-word;">
                    Cek list: <br>

                    @if($contracts->billing_progress != 'null')
                        @foreach(json_decode($contracts->billing_progress) as $billing)
                            - {{$billing == 'doku' ? "Verifikasi Dokumen & Bast" : $billing}}
                            <br>
                        @endforeach
                    @endif
                </td>
            @endcan
            <td style="width: 20px;  word-wrap:break-word;">
                @if($contracts->status == 1)
                    Finished
                @else
                    Not Finished
                @endif
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
