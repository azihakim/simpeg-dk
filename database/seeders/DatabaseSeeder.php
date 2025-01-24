<?php

namespace Database\Seeders;

use App\Models\Jabatan;
use App\Models\Pegawai;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'jabatan' => 'Super Admin',
            'username' => 'sa',
            'password' => bcrypt('123'),
        ]);

        $jabatan = [
            [
                'nama_jabatan' => 'Software Engineer'
            ],
            [
                'nama_jabatan' => 'Project Manager'
            ],
            [
                'nama_jabatan' => 'Quality Assurance'
            ],
            [
                'nama_jabatan' => 'UI/UX Designer'
            ],
            [
                'nama_jabatan' => 'DevOps Engineer'
            ],
        ];
        foreach ($jabatan as $j) {
            Jabatan::create($j);
        }
        User::create([
            'username' => 'karyawan',
            'jabatan' => 'Karyawan',
            'password' => bcrypt('123'),
        ]);
        Pegawai::create([
            'user_id' => 2,
            'nama' => 'Karyawan 1',
            'divisi_id' => 2,
            'status' => 'Aktif',
            'status_kerja' => 'Kontrak',
            'nik' => '123321',
            'umur' => '20',
            'no_telp' => '0812343710',
            'alamat' => 'Jl. Sukamaju',
        ]);
    }
}
