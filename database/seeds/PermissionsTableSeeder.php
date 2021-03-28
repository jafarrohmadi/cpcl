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
                'title'       => 'permission_create',
                'description' => 'Permission Create',
                'created_at'  => '2019-04-15 19:14:42',
                'updated_at'  => '2019-04-15 19:14:42',
            ],
            [
                'id'          => '3',
                'title'       => 'permission_edit',
                'description' => 'Permission Edit',
                'created_at'  => '2019-04-15 19:14:42',
                'updated_at'  => '2019-04-15 19:14:42',
            ],
            [
                'id'          => '4',
                'title'       => 'permission_show',
                'description' => 'Permission Show',
                'created_at'  => '2019-04-15 19:14:42',
                'updated_at'  => '2019-04-15 19:14:42',
            ],
            [
                'id'          => '5',
                'title'       => 'permission_delete',
                'description' => 'Permission Delete',
                'created_at'  => '2019-04-15 19:14:42',
                'updated_at'  => '2019-04-15 19:14:42',
            ],
            [
                'id'          => '6',
                'title'       => 'permission_access',
                'description' => 'Permission Access',
                'created_at'  => '2019-04-15 19:14:42',
                'updated_at'  => '2019-04-15 19:14:42',
            ],
            [
                'id'          => '7',
                'title'       => 'role_create',
                'description' => 'Role Create',
                'created_at'  => '2019-04-15 19:14:42',
                'updated_at'  => '2019-04-15 19:14:42',
            ],
            [
                'id'          => '8',
                'title'       => 'role_edit',
                'description' => 'Role Edit',
                'created_at'  => '2019-04-15 19:14:42',
                'updated_at'  => '2019-04-15 19:14:42',
            ],
            [
                'id'          => '9',
                'title'       => 'role_show',
                'description' => 'Role Show',
                'created_at'  => '2019-04-15 19:14:42',
                'updated_at'  => '2019-04-15 19:14:42',
            ],
            [
                'id'          => '10',
                'title'       => 'role_delete',
                'description' => 'Role Delete',
                'created_at'  => '2019-04-15 19:14:42',
                'updated_at'  => '2019-04-15 19:14:42',
            ],
            [
                'id'          => '11',
                'title'       => 'role_access',
                'description' => 'Role Access',
                'created_at'  => '2019-04-15 19:14:42',
                'updated_at'  => '2019-04-15 19:14:42',
            ],
            [
                'id'          => '12',
                'title'       => 'user_create',
                'description' => 'User Create',
                'created_at'  => '2019-04-15 19:14:42',
                'updated_at'  => '2019-04-15 19:14:42',
            ],
            [
                'id'          => '13',
                'title'       => 'user_edit',
                'description' => 'User Edit',
                'created_at'  => '2019-04-15 19:14:42',
                'updated_at'  => '2019-04-15 19:14:42',
            ],
            [
                'id'          => '14',
                'title'       => 'user_show',
                'description' => 'User Show',
                'created_at'  => '2019-04-15 19:14:42',
                'updated_at'  => '2019-04-15 19:14:42',
            ],
            [
                'id'          => '15',
                'title'       => 'user_delete',
                'description' => 'User Delete',
                'created_at'  => '2019-04-15 19:14:42',
                'updated_at'  => '2019-04-15 19:14:42',
            ],
            [
                'id'          => '16',
                'title'       => 'user_access',
                'description' => 'User Access',
                'created_at'  => '2019-04-15 19:14:42',
                'updated_at'  => '2019-04-15 19:14:42',
            ],
            [
                'id'          => '17',
                'title'       => 'finish_contract_access',
                'description' => 'Finish Contract Access',
                'created_at'  => '2019-04-15 19:14:42',
                'updated_at'  => '2019-04-15 19:14:42',
            ],
            [
                'id'          => '18',
                'title'       => 'update_all_data_after_finish_access',
                'description' => 'Update All Data After Finish Access',
                'created_at'  => '2019-04-15 19:14:42',
                'updated_at'  => '2019-04-15 19:14:42',
            ],
        ];

        Permission::insert($permissions);

        $seed = [
            'contract_number'     => 'Nomor Kontrak',
            'start_date'          => 'Tanggal Dimulai',
            'end_date'            => 'Tanggal Berakhir',
            'work_unit'           => 'Satuan Kerja',
            'cpcl'                => 'CPCL',
            'item_position'       => 'Posisi Barang',
            'quality_test'        => 'Uji Mutu',
            'item_receive'        => 'Barang Sudah Diterima',
            'contract_value'      => 'Nilai Kontrak',
            'tax'                 => 'Pajak',
            'real_value'          => 'Nilai Real Yang Diterima',
            'billing_progress'    => 'Proses Penagihan',
            'type_of_fertilizer'  => 'Jenis Pupuk',
            'number_of_row_cpcl'  => 'Jumlah Row CPCL',
            'total_kg_fertilizer' => 'Total PUPUK',
        ];

        $i = 19;
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
            $data[] = [
                'id'          => $i++,
                'title'       => $key . '_delete',
                'description' => $seeds . ' Delete',
                'created_at'  => '2019-04-15 19:14:42',
                'updated_at'  => '2019-04-15 19:14:42',
            ];
        }


        $cpclData = [
            'province' => 'Provinsi',
            'districts' => 'Kabupaten',
            'sub_district' => 'Kecamatan',
            'village' => 'Desa',
            'farmers_group_name' => 'Nama Kelompok Tani / Gapoktan',
            'chairman_farmers_group_name' => 'Ketua Kelompok Tani / Gapoktan',
            'nik' => 'NIK',
            'phone_number' => 'No. HP',
            'area_ha' => 'Luas (Ha)',
            'planting_schedule' => 'Jadwal Tanam',
            'coordinate_point' => 'Titik Koordinat',
            'type_of_land' => 'Jenis Lahan',
            'scan_bast' => 'Scan Bast',
            'scan_of_travel_letters' => 'Scan Surat Jalan',
            'open_camera_photo' => 'Open Camera',
            'scan_ktp' => 'Scan KTP',
            'fertilizer' => 'Jumlah Satuan Pupuk',
        ];
        foreach ($cpclData as $key => $seeds) {

            $data[] =
                [
                    'id'          => $i++,
                    'title'       => "cpcl_".$key . "_create",
                    'description' => $seeds . ' Create',
                    'created_at'  => '2019-04-15 19:14:42',
                    'updated_at'  => '2019-04-15 19:14:42',
                ];
            $data[] = [
                'id'          => $i++,
                'title'       => "cpcl_".$key . '_edit',
                'description' => $seeds . ' Edit',
                'created_at'  => '2019-04-15 19:14:42',
                'updated_at'  => '2019-04-15 19:14:42',
            ];
            $data[] = [
                'id'          => $i++,
                'title'       => "cpcl_".$key . '_show',
                'description' => $seeds . ' Show',
                'created_at'  => '2019-04-15 19:14:42',
                'updated_at'  => '2019-04-15 19:14:42',
            ];
            $data[] = [
                'id'          => $i++,
                'title'       => "cpcl_".$key . '_delete',
                'description' => $seeds . ' Delete',
                'created_at'  => '2019-04-15 19:14:42',
                'updated_at'  => '2019-04-15 19:14:42',
            ];
        }


        Permission::insert($data);

    }
}
