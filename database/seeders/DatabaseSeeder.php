<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        DB::table('kementrian')->insert([
            [
                'id' => 1,
                'nama_kementrian' => 'Admin',
                'deskripsi' => 'Kementrian yang isinya hanya admin',
                'periode' => 0,
            ],
            [
                'id' => 2,
                'nama_kementrian' => 'Research and Development',
                'deskripsi' => 'Kementrian Pendidikan dan Penelitian dalam lingkungan Organisasi',
                'periode' => 2023,
            ],
            [
                'id' => 3,
                'nama_kementrian' => 'Human Resource',
                'deskripsi' => 'Kementrian Sumber Daya Manusia dalam lingkungan Organisasi',
                'periode' => 2023,
            ],
            [
                'id' => 4,
                'nama_kementrian' => 'Media and Creative',
                'deskripsi' => 'Kementrian Media dalam lingkungan Organisasi',
                'periode' => 2023,
            ],
            [
                'id' => 5,
                'nama_kementrian' => 'Public Relation',
                'deskripsi' => 'Kementrian Hubungan Masyarakat dalam lingkungan Organisasi',
                'periode' => 2023,
            ],
            
        ]);
        
        DB::table('roles')->insert([
            [
                'id' => 1,
                'nama_role' => 'Admin',
                'periode' => 0,
                'id_kementrian' => 1,
            ],
            [
                'id' => 2,
                'nama_role' => 'Head of Research and Depvelopment',
                'periode' => 2023,
                'id_kementrian' => 2,
            ],
            [
                'id' => 3,
                'nama_role' => 'Head of Human Resource',
                'periode' => 2023,
                'id_kementrian' => 3,
            ],
            [
                'id' => 4,
                'nama_role' => 'Head of Media and Creative',
                'periode' => 2023,
                'id_kementrian' => 4,
            ],
            [
                'id' => 5,
                'nama_role' => 'Head of Public Relation',
                'periode' => 2023,
                'id_kementrian' => 5,
            ],
            [
                'id' => 6,
                'nama_role' => 'Staff of Research and Depvelopment',
                'periode' => 2023,
                'id_kementrian' => 2,
            ],
            [
                'id' => 7,
                'nama_role' => 'Staff of Human Resource',
                'periode' => 2023,
                'id_kementrian' => 3,
            ],
            [
                'id' => 8,
                'nama_role' => 'Staff of Media and Creative',
                'periode' => 2023,
                'id_kementrian' => 4,
            ],
            [
                'id' => 9,
                'nama_role' => 'Staff of Public Relation',
                'periode' => 2023,
                'id_kementrian' => 5,
            ],
            
        ]);
        
        DB::table('users')->insert([
            [
                'id' => 1,
                'username' => 'admin',
                'password' => Hash::make('123'),
                'nim' => '0',
                'nama' => 'Organization Admin',
                'email' => 'admin@example.com',
                'no_telp' => '0',
                'id_role' => 1,
            ],
            [
                'id' => 2,
                'username' => 'mahdy',
                'password' => Hash::make('123'),
                'nim' => '1621',
                'nama' => 'Mahdy',
                'email' => 'mahdy@example.com',
                'no_telp' => '0853',
                'id_role' => 2,
            ],
            [
                'id' => 3,
                'username' => 'devita',
                'password' => Hash::make('123'),
                'nim' => '1621',
                'nama' => 'Devita',
                'email' => 'devita@example.com',
                'no_telp' => '0813',
                'id_role' => 3,
            ],
            [
                'id' => 4,
                'username' => 'dimyadi',
                'password' => Hash::make('123'),
                'nim' => '1621',
                'nama' => 'Dimyadi',
                'email' => 'dimyadi@example.com',
                'no_telp' => '0821',
                'id_role' => 4,
            ],
            [
                'id' => 5,
                'username' => 'tanya',
                'password' => Hash::make('123'),
                'nim' => '1621',
                'nama' => 'Tanya',
                'email' => 'tanya@example.com',
                'no_telp' => '0858',
                'id_role' => 5,
            ],
            [
                'id' => 6,
                'username' => 'randi',
                'password' => Hash::make('123'),
                'nim' => '1621',
                'nama' => 'Randi',
                'email' => 'randi@example.com',
                'no_telp' => '0822',
                'id_role' => 6,
            ],
            [
                'id' => 7,
                'username' => 'budi',
                'password' => Hash::make('123'),
                'nim' => '1622',
                'nama' => 'Budi',
                'email' => 'budi@example.com',
                'no_telp' => '0853',
                'id_role' => 6,
            ],
            [
                'id' => 8,
                'username' => 'anton',
                'password' => Hash::make('123'),
                'nim' => '1622',
                'nama' => 'Anton',
                'email' => 'anton@example.com',
                'no_telp' => '0832',
                'id_role' => 7,
            ],
            [
                'id' => 9,
                'username' => 'dewi',
                'password' => Hash::make('123'),
                'nim' => '1621',
                'nama' => 'Dewi',
                'email' => 'dewi@example.com',
                'no_telp' => '0852',
                'id_role' => 7,
            ],
            [
                'id' => 10,
                'username' => 'andi',
                'password' => Hash::make('123'),
                'nim' => '1622',
                'nama' => 'Andi',
                'email' => 'andi@example.com',
                'no_telp' => '0862',
                'id_role' => 8,
            ],
            [
                'id' => 11,
                'username' => 'fina',
                'password' => Hash::make('123'),
                'nim' => '1623',
                'nama' => 'Fina',
                'email' => 'fina@example.com',
                'no_telp' => '0821',
                'id_role' => 8,
            ],
            [
                'id' => 12,
                'username' => 'niko',
                'password' => Hash::make('123'),
                'nim' => '1623',
                'nama' => 'Niko',
                'email' => 'niko@example.com',
                'no_telp' => '0853',
                'id_role' => 9,
            ],
            [
                'id' => 13,
                'username' => 'lini',
                'password' => Hash::make('123'),
                'nim' => '1622',
                'nama' => 'Lini',
                'email' => 'lini@example.com',
                'no_telp' => '0823',
                'id_role' => 9,
            ],

        ]);

        DB::table('program_kerja')->insert([
            [
                'id' => 1,
                'nama_proker' => 'Workshop',
                'deskripsi' => '',
                'periode' => 2023,
                'tanggal_mulai' => '2023-03-23',
                'tanggal_selesai' => '2023-04-15',
                'total_progress' => 10,
                'pic' => 6,
                'id_kementrian' => 2,
            ],
            [
                'id' => 2,
                'nama_proker' => 'Upgrading',
                'deskripsi' => '',
                'periode' => 2023,
                'tanggal_mulai' => '2023-02-15',
                'tanggal_selesai' => '2023-11-30',
                'total_progress' => 8,
                'pic' => 8,
                'id_kementrian' => 3,
            ],
            [
                'id' => 3,
                'nama_proker' => 'Instagram Post',
                'deskripsi' => '',
                'periode' => 2023,
                'tanggal_mulai' => '2023-02-15',
                'tanggal_selesai' => '2023-02-20',
                'total_progress' => 2,
                'pic' => 11,
                'id_kementrian' => 4,
            ],
            [
                'id' => 4,
                'nama_proker' => 'Studi Banding',
                'deskripsi' => '',
                'periode' => 2023,
                'tanggal_mulai' => '2023-05-17',
                'tanggal_selesai' => '2023-06-02',
                'total_progress' => 7,
                'pic' => 12,
                'id_kementrian' => 5,
            ],
        ]);
        
    }
}
