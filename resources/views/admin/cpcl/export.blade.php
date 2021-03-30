<html>
<table>
    <thead>
    <tr>
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
            <th>
                @if($contract->unit_fertilizer == 'KG')
                    ZAK
                @else
                    KG
                @endif
            </th>
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
                <td> {{$cpcls->zakorkg ?? ''}}</td>
                <td>
                    {{ $cpcls->fertilizer ?? '' }}
                </td>
            @endcan
            @can('cpcl_scan_bast_show')
                <td>
                    {!!  $cpcls->scan_bast ? getFile($cpcls->scan_bast) : ''  !!}
                </td>
            @endcan
        </tr>
    @endforeach
    </tbody>
</table>
</html>
