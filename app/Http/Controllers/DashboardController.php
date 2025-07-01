<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserData;
use App\Models\Kementrian;
use App\Models\Role;
use App\Models\ProgramKerja;
use App\Models\FileProker;
use App\Models\DataWarehouse;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $users = UserData::all();
        $dept = Kementrian::all();
        $roles = Role::all();
        $roleUser = Role::where('id', $user->id_role)->first();
        $selectedDept = $roleUser->id_kementrian;

        if ($selectedDept) {
            $proker = ProgramKerja::where('id_kementrian', $selectedDept)->get();
        } else {
            $proker = collect();
        }

        $prokerIds = $proker->pluck('id');
        $fileproker = FileProker::whereIn('id_proker', $prokerIds)->get();

        $maxProgress = [];
        foreach ($proker as $program) {
            $maxProgress[$program->id] = $fileproker->where('id_proker', $program->id)->max('progress_ke');
        }

        $username = $user->nama;
        $userrole = $roleUser->nama_role;

        $dataKontribusiUser = (new DataWarehouse())->getKontribusiUser();
        $dataProgressKementrian = (new DataWarehouse())->getProgressKementrian();

        $RnDcount = [];
        $HRcount = [];
        $MnCcount = [];
        $PRcount = [];

        // Mengambil data dari tabel dengan kondisi nama_kementrian
        $dataRnD = $dataProgressKementrian
            ->where('nama_kementrian', 'Research and Development');
        $dataHR = $dataProgressKementrian
            ->where('nama_kementrian', 'Human Resource');
        $dataMnC = $dataProgressKementrian
            ->where('nama_kementrian', 'Media and Creative');
        $dataPR = $dataProgressKementrian
            ->where('nama_kementrian', 'Public Relation');

        // Loop untuk setiap bulan dari 1 hingga 12
        for ($bulan = 1; $bulan <= 12; $bulan++) {
            // Filter data berdasarkan bulan
            $RnDData = $dataRnD->where('bulan', $bulan);
            $HRData = $dataHR->where('bulan', $bulan);
            $MnCData = $dataMnC->where('bulan', $bulan);
            $PRData = $dataPR->where('bulan', $bulan);

            // Menghitung jumlah baris
            $countRnD = $RnDData->count();
            $countHR = $HRData->count();
            $countMnC = $MnCData->count();
            $countPR = $PRData->count();

            // Menyimpan hasil count ke dalam array
            $RnDcount[$bulan] = $countRnD;
            $HRcount[$bulan] = $countHR;
            $MnCcount[$bulan] = $countMnC;
            $PRcount[$bulan] = $countPR;
        }

        $RnDcountsList = array_values($RnDcount);
        $HRcountsList = array_values($HRcount);
        $MnCcountsList = array_values($MnCcount);
        $PRcountsList = array_values($PRcount);

        $monthSelect = $request->input('monthSelect');
        $Verifiedcount = [];
        $Pendingcount = [];
        $Revisioncount = [];

        $dataVerified = $dataProgressKementrian
            ->where('status', 'Verified');
        $dataPending = $dataProgressKementrian
            ->where('status', 'Pending');
        $dataRevision = $dataProgressKementrian
            ->where('status', 'Revision');

        $departments = ['Research and Development', 'Human Resource', 'Media and Creative', 'Public Relation'];

        if ($monthSelect == '0') {
            foreach ($departments as $depart) {
                $VerifiedData = $dataVerified->where('nama_kementrian', $depart);
                $PendingData = $dataPending->where('nama_kementrian', $depart);
                $RevisionData = $dataRevision->where('nama_kementrian', $depart);

                $countVerified = $VerifiedData->count();
                $countPending = $PendingData->count();
                $countRevision = $RevisionData->count();

                $Verifiedcount[$depart] = $countVerified;
                $Pendingcount[$depart] = $countPending;
                $Revisioncount[$depart] = $countRevision;
            }
        } else {
            foreach ($departments as $depart) {
                $VerifiedData = $dataVerified->where('bulan', $monthSelect)->where('nama_kementrian', $depart);
                $PendingData = $dataPending->where('bulan', $monthSelect)->where('nama_kementrian', $depart);
                $RevisionData = $dataRevision->where('bulan', $monthSelect)->where('nama_kementrian', $depart);
        
                $countVerified = $VerifiedData->count();
                $countPending = $PendingData->count();
                $countRevision = $RevisionData->count();
        
                $Verifiedcount[$depart] = $countVerified;
                $Pendingcount[$depart] = $countPending;
                $Revisioncount[$depart] = $countRevision;
            }
        }

        $VerifiedcountList = array_values($Verifiedcount);
        $PendingcountList = array_values($Pendingcount);
        $RevisioncountList = array_values($Revisioncount);

        $Usercount = [];
        $dataUser = $dataKontribusiUser;

        $stafff = ['Randi', 'Budi', 'Anton', 'Dewi', 'Andi', 'Fina', 'Niko', 'Lini'];

        if ($monthSelect == '0') {
            foreach ($stafff as $staf) {
                $StaffData = $dataUser->where('nama_user', $staf);

                $countStaff = $StaffData->sum('nilai_kontribusi');

                $Usercount[$staf] = $countStaff;
            }
        } else {
            foreach ($stafff as $staf) {
                $StaffData = $dataUser->where('bulan', $monthSelect)->where('nama_user', $staf);

                $countStaff = $StaffData->sum('nilai_kontribusi');

                $Usercount[$staf] = $countStaff;
            }
        }

        $UsercountList = array_values($Usercount);

        if ($user->id_role == 1) {
            return view('role-admin.admin-index', compact('users', 'dept', 'roles', 'username', 'userrole', 'dataKontribusiUser', 'dataProgressKementrian', 'dataProgressKementrian', 'RnDcountsList', 'HRcountsList', 'MnCcountsList', 'PRcountsList', 'VerifiedcountList', 'PendingcountList', 'RevisioncountList','UsercountList','stafff'));
        } elseif (in_array($user->id_role, [2, 3, 4, 5])) {
            return view('role-head/head-index', compact('users', 'dept', 'roles', 'proker', 'maxProgress', 'username', 'userrole', 'dataKontribusiUser', 'dataProgressKementrian', 'RnDcountsList', 'HRcountsList', 'MnCcountsList', 'PRcountsList', 'VerifiedcountList', 'PendingcountList', 'RevisioncountList','UsercountList','stafff'));
        } else {
            return view('role-staff/staff-index', compact('users', 'dept', 'roles', 'proker', 'maxProgress', 'username', 'userrole', 'dataKontribusiUser', 'dataProgressKementrian','RnDcountsList', 'HRcountsList', 'MnCcountsList', 'PRcountsList', 'VerifiedcountList', 'PendingcountList', 'RevisioncountList','UsercountList','stafff'));
        }
    }

    public function showData(Request $request)
    {
        $dataKontribusiUser = (new DataWarehouse())->getKontribusiUser();
        $dataProgressKementrian = (new DataWarehouse())->getProgressKementrian();

        $monthSelect = $request->input('monthSelect');
        $Usercount = [];
        $dataUser = $dataKontribusiUser;

        $stafff = ['Randi', 'Budi', 'Anton', 'Dewi', 'Andi', 'Fina', 'Niko', 'Lini'];

        if ($monthSelect == '0') {
            foreach ($stafff as $staf) {
                $StaffData = $dataUser->where('nama_user', $staf);

                $countStaff = $StaffData->sum('nilai_kontribusi');

                $Usercount[$staf] = $countStaff;
            }
        } else {
            foreach ($stafff as $staf) {
                $StaffData = $dataUser->where('bulan', $monthSelect)->where('nama_user', $staf);

                $countStaff = $StaffData->sum('nilai_kontribusi');

                $Usercount[$staf] = $countStaff;
            }
        }

        $UsercountList = array_values($Usercount);

        return view('role-head/your_view_name', [
            'dataKontribusiUser' => $dataKontribusiUser,
            'dataProgressKementrian' => $dataProgressKementrian,
            'UsercountList' => $UsercountList,
        ]);
    }
}
