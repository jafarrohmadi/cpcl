<html>
<table class="table table-striped table-bordered zero-configuration">
    <thead>
    <tr>
        <th width="10">
            No.
        </th>
        <th>
            Status
        </th>
        @can('contract_number_show')
            <th>
                Nomor Kontrak
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
                &nbsp;Pajak
            </th>
        @endcan
        @can('real_value_show')
            <th>
                &nbsp;Nilai Real Yang Diterima
            </th>
        @endcan
        @can('billing_progress_show')
            <th>
                &nbsp;Proses Penagihan
            </th>
        @endcan
    </tr>
    </thead>
    <tbody>
    @foreach($contract as $key => $contracts)
        <tr data-entry-id="{{ $contracts->id }}">
            <td>
                {{ $key + 1 }}
            </td>
            <td>
                @if($contracts->status == 1)
                    Finished
                @else
                    Not Finished
                @endif
            </td>
            @can('contract_number_show')
                <td>
                    {{ $contracts->contract_number ?? '' }}
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
            @can('real_value_show')
                <td>
                    {{ numberFormat($contracts->real_value) ?? '' }}
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
        </tr>
    @endforeach
    </tbody>
</table>
</html>
