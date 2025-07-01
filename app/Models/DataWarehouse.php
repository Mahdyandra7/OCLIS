<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DataWarehouse extends Model
{
    use HasFactory;

    protected $connection = 'data_warehouse';

    public function getKontribusiUser()
    {
        return DB::connection('data_warehouse')->table('fact_kontribusi_user')
            ->join('dim_progress_proker', 'fact_kontribusi_user.sk_progress_proker', '=', 'dim_progress_proker.sk_progress_proker')
            ->join('dim_user', 'fact_kontribusi_user.sk_user', '=', 'dim_user.sk_user')
            ->join('dim_waktu', 'fact_kontribusi_user.sk_waktu', '=', 'dim_waktu.sk_waktu')
            ->select(
                'dim_waktu.bulan',
                'dim_waktu.tahun',
                'dim_progress_proker.nama_proker',
                'dim_progress_proker.nama_file',
                'dim_progress_proker.status',
                'dim_user.nama_user',
                'dim_user.nama_kementrian AS kementrian_user',
                'fact_kontribusi_user.nilai_kontribusi',
            )
            ->get();
    }

    public function getProgressKementrian()
    {
        return DB::connection('data_warehouse')->table('fact_progress_kementrian')
            ->join('dim_proker_kementrian', 'fact_progress_kementrian.sk_proker_kementrian', '=', 'dim_proker_kementrian.sk_proker_kementrian')
            ->join('dim_waktu', 'fact_progress_kementrian.sk_waktu', '=', 'dim_waktu.sk_waktu')
            ->select(
                'dim_waktu.bulan',
                'dim_waktu.tahun',
                'dim_proker_kementrian.nama_kementrian',
                'dim_proker_kementrian.nama_proker',
                'fact_progress_kementrian.nama_file',
                'fact_progress_kementrian.status',
            )
            ->get();
    }
}