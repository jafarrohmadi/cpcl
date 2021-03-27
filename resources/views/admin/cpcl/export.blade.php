<html>
<table>
    <thead>
    <tr>
        <th width="10">
            No.
        </th>
        <th>
            Provinsi
        </th>
        <th>
            Kabupaten
        </th>
        <th>
            Kecamatan
        </th>
        <th>
            Desa
        </th>
        <th>
            Nama Kelompok Tani / Gapoktan
        </th>
        <th>
            Ketua Kelompok Tani / Gapoktan
        </th>
        <th>
            NIK
        </th>
        <th>
            No. HP
        </th>
        <th>
            Luas (Ha)
        </th>

        <th>
            {{ (new \App\Models\Contract)->getFertilizer($contract->type_of_fertilizer) }} ({{ $contract->unit_fertilizer }})
        </th>

        <th>
            Jadwal Tanam
        </th>
        <th>
            Titik Koordinat
        </th>
        <th>
            Jenis Lahan
        </th>
        <th>
            Scan Bast
        </th>
        <th>
            Scan Surat Jalan
        </th>
        <th>
            Open Camera
        </th>
        <th>
            Scan KTP
        </th>
    </tr>
    </thead>
    <tbody>
    @foreach($cpcl as $key => $cpcls)
        <tr data-entry-id="{{ $cpcls->id }}">
            <td>
                {{ $key + 1 }}
            </td>

            <td>
                {{ $cpcls->province ?? '' }}
            </td>
            <td>
                {{ $cpcls->districts ?? '' }}
            </td>
            <td>
                {{ $cpcls->sub_district ?? '' }}
            </td>
            <td>
                {{ $cpcls->village ?? '' }}
            </td>
            <td>
                {{ $cpcls->farmers_group_name ?? '' }}
            </td>
            <td>
                {{ $cpcls->chairman_farmers_group_name ?? '' }}
            </td>
            <td>
                {{ $cpcls->nik ?? '' }}
            </td>
            <td>
                {{ $cpcls->phone_number ?? '' }}
            </td>
            <td>
                {{ $cpcls->area_ha ?? '' }}
            </td>
            <td>
                {{ $cpcls->fertilizer ?? '' }}
            </td>

            <td>
                {{ $cpcls->planting_schedule ?? '' }}
            </td>
            <td>
                {{ $cpcls->coordinate_point ?? '' }}
            </td>

            <td>
                {{ $cpcls->type_of_land ?? '' }}
            </td>
            <td>
                {!!  $cpcls->scan_bast ? getFileLink($cpcls->scan_bast) : ''  !!}
            </td>
            <td>
                {!! $cpcls->scan_of_travel_letters ? getFileLink($cpcls->scan_of_travel_letters): ''  !!}
            </td>
            <td>
                {!! $cpcls->open_camera_photo ? getFileLink($cpcls->open_camera_photo) : ''  !!}
            </td>
            <td>
                {!! $cpcls->scan_ktp ? getFileLink($cpcls->scan_ktp) : ''  !!}
            </td>

        </tr>
    @endforeach
    </tbody>
</table>
</html>
