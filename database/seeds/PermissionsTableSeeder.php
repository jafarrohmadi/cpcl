<?php

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'          => '1',
                'title'       => 'user_management_access',
                'description' => 'User Management Access',
                'created_at'  => '2019-04-15 19:14:42',
                'updated_at'  => '2019-04-15 19:14:42',
            ],
            [
                'id'          => '2',
                'title'       => 'finish_contract_access',
                'description' => 'Finish Contract Access',
                'created_at'  => '2019-04-15 19:14:42',
                'updated_at'  => '2019-04-15 19:14:42',
            ],
            [
                'id'          => '3',
                'title'       => 'update_all_data_after_finish_access',
                'description' => 'Update All Data After Finish Access',
                'created_at'  => '2019-04-15 19:14:42',
                'updated_at'  => '2019-04-15 19:14:42',
            ],
            [
                'id'          => '4',
                'title'       => 'activity_logs_show',
                'description' => 'Activity Logs Show',
                'created_at'  => '2019-04-15 19:14:42',
                'updated_at'  => '2019-04-15 19:14:42',
            ],

        ];

        Permission::insert($permissions);

        $seed = [
            'contract_number'            => 'Nomor Kontrak',
            'contract_document'          => 'Dokumen Kontrak',
            'contract_addendum_number'   => 'Nomor Addendum Kontrak',
            'contract_addendum_document' => 'Dokumen Addendum Kontrak',
            'start_date'                 => 'Tanggal Dimulai',
            'end_date'                   => 'Tanggal Berakhir',
            'work_unit'                  => 'Satuan Kerja',
            'cpcl'                       => 'CPCL',
            'item_position'              => 'Posisi Barang',
            'quality_test'               => 'Uji Mutu',
            'item_receive'               => 'Barang Sudah Diterima',
            'contract_value'             => 'Nilai Kontrak',
            'tax'                        => 'Pajak',
            'tax_pph'                    => 'Pajak PPh',
            'real_value'                 => 'Nilai Real Yang Diterima',
            'billing_document'           => 'Dokumen Penagihan',
            'billing_progress'           => 'Proses Penagihan',
            'type_of_fertilizer'         => 'Jenis Pupuk',
            'number_of_row_cpcl'         => 'Jumlah Row CPCL',
            'total_kg_fertilizer'        => 'Total PUPUK',
        ];

        $i = 5;
        foreach ($seed as $key => $seeds) {

            $data[] =
                [
                    'id'          => $i++,
                    'title'       => $key . "_create",
                    'description' => $seeds . ' Create',
                    'created_at'  => '2019-04-15 19:14:42',
                    'updated_at'  => '2019-04-15 19:14:42',
                ];
            $data[] = [
                'id'          => $i++,
                'title'       => $key . '_edit',
                'description' => $seeds . ' Edit',
                'created_at'  => '2019-04-15 19:14:42',
                'updated_at'  => '2019-04-15 19:14:42',
            ];
            $data[] = [
                'id'          => $i++,
                'title'       => $key . '_show',
                'description' => $seeds . ' Show',
                'created_at'  => '2019-04-15 19:14:42',
                'updated_at'  => '2019-04-15 19:14:42',
            ];
        }

        $cpclData = [
            'province'                    => 'Provinsi',
            'districts'                   => 'Kabupaten',
            'sub_district'                => 'Kecamatan',
            'village'                     => 'Desa',
            'farmers_group_name'          => 'Nama Kelompok Tani / Gapoktan',
            'chairman_farmers_group_name' => 'Ketua Kelompok Tani / Gapoktan',
            'nik'                         => 'NIK',
            'phone_number'                => 'No. HP',
            'area_ha'                     => 'Luas (Ha)',
            'scan_bast'                   => 'Scan Bast/Scan Surat Jalan/Open Camera/Scan KTP',
            'fertilizer'                  => 'Jumlah Satuan Pupuk',
        ];
        foreach ($cpclData as $key => $seeds) {

            $data[] =
                [
                    'id'          => $i++,
                    'title'       => "cpcl_" . $key . "_create",
                    'description' => $seeds . ' Create',
                    'created_at'  => '2019-04-15 19:14:42',
                    'updated_at'  => '2019-04-15 19:14:42',
                ];
            $data[] = [
                'id'          => $i++,
                'title'       => "cpcl_" . $key . '_edit',
                'description' => $seeds . ' Edit',
                'created_at'  => '2019-04-15 19:14:42',
                'updated_at'  => '2019-04-15 19:14:42',
            ];
            $data[] = [
                'id'          => $i++,
                'title'       => "cpcl_" . $key . '_show',
                'description' => $seeds . ' Show',
                'created_at'  => '2019-04-15 19:14:42',
                'updated_at'  => '2019-04-15 19:14:42',
            ];
        }

        Permission::insert($data);

    }
}
