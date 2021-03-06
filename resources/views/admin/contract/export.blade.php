<html>
<table class="table table-striped table-bordered zero-configuration">
    <thead>
    <tr>
        <th>
            No.
        </th>
        @can('contract_number_show')
            <th>
                Nomor Kontrak
            </th>
        @endcan
        @can('contract_document_show')
            <th>
                Dokumen Kontrak
            </th>
        @endcan
        @can('contract_addendum_number_show')
            <th>
                Nomor Addendum Kontrak
            </th>
        @endcan
        @can('contract_addendum_document_show')
            <th>
                Dokumen Addendum Kontrak
            </th>
        @endcan
        @can('total_kg_fertilizer_show')
            <th>
                Total PUPUK(KG/LITER)
            </th>
        @endcan
        @can('start_date_show')
            <th>
                &nbsp;Tanggal Dimulai
            </th>
        @endcan
        @can('end_date_show')
            <th>
                &nbsp;Tanggal Berakhir
            </th>
        @endcan
        @can('work_unit_show')
            <th>
                Satuan Kerja
            </th>
        @endcan

        @can('item_position_show')
            <th>
                &nbsp;Posisi Barang
            </th>
        @endcan
        @can('quality_test_show')
            <th>
                &nbsp;Uji Mutu
            </th>
        @endcan
        @can('item_receive_show')
            <th>
                &nbsp;Barang Sudah Diterima
            </th>
        @endcan
        @can('contract_value_show')
            <th>
                &nbsp;Nilai Kontrak
            </th>
        @endcan
        @can('tax_show')
            <th>
                &nbsp;Pajak PPN
            </th>
        @endcan
        @can('tax_pph_show')
            <th>
                &nbsp;Pajak PPH
            </th>
        @endcan
        @can('real_value_show')
            <th>
                &nbsp;Nilai Real Yang Diterima
            </th>
        @endcan
        @can('billing_document_show')
            <th>
                Dokumen Penagihan
            </th>
        @endcan
        @can('billing_progress_show')
            <th>
                &nbsp;Proses Penagihan
            </th>
        @endcan
        <th>
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
                <td>
                    {{ $contracts->contract_number ?? '' }}
                </td>
            @endcan
            @can('contract_document_show')
            <td>
                {!!  $contracts->contract_document ? getFileLink($contracts->contract_document) : ''  !!}
            </td>
            @endcan
            @can('contract_addendum_number_show')
            <td>
                {!!  $contracts->contract_addendum_number ?? '' !!}
            </td>
            @endcan
            @can('contract_addendum_document_show')
            <td>
                {!!  $contracts->contract_addendum_document ? getFileLink($contracts->contract_addendum_document) : ''  !!}
            </td>
            @endcan
            @can('total_kg_fertilizer_show')
            <td>
                {{ $contracts->total_kg_fertilizer }}
            </td>
            @endcan
            @can('start_date_show')
                <td>
                    {{ $contracts->start_date ? date('d-m-Y' , strtotime($contracts->start_date)) : '' }}
                </td>
            @endcan
            @can('end_date_show')
                <td @if($contracts->end_date) {{ endDateRed($contracts->end_date) }} @endif>
                    {{ $contracts->end_date ? date('d-m-Y' , strtotime($contracts->end_date)) : '' }}
                </td>
            @endcan
            @can('work_unit_show')
                <td>
                    {{ $contracts->work_unit ?? '' }}
                </td>
            @endcan
            @can('item_position_show')
                <td>
                    {{ $contracts->item_position ?? '' }}
                </td>
            @endcan
            @can('quality_test_show')
                <td>
                    {{ $contracts->quality_test ?? '' }}
                </td>
            @endcan
            @can('item_receive_show')
                <td>
                    {{ $contracts->item_receive ?? '' }}
                </td>
            @endcan
            @can('contract_value_show')
                <td>
                    {{ numberFormat($contracts->contract_value) ?? '' }}
                </td>
            @endcan
            @can('tax_show')
                <td>
                    {{ numberFormat($contracts->tax) ?? '' }}
                </td>
            @endcan
            @can('tax_pph_show')
            <td>
                {{ numberFormat($contracts->tax_pph) ?? '' }}
            </td>@endcan
            @can('real_value_show')
                <td>
                    {{ numberFormat($contracts->real_value) ?? '' }}
                </td>
            @endcan
            @can('billing_document_show')
            <td>
                {!!  $contracts->billing_document ? getFileLink($contracts->billing_document) : ''  !!}
            </td>
            @endcan
            @can('billing_progress_show')
                <td>
                    Cek list: <br>

                    @if($contracts->billing_progress != 'null')
                        @foreach(json_decode($contracts->billing_progress) as $billing)
                            - {{$billing == 'doku' ? "Verifikasi Dokumen & Bast" : $billing}}
                            <br>
                        @endforeach
                    @endif
                </td>
            @endcan
            <td>
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
</html>
