<?php

namespace App\Exports;

use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class DataExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DB::table('orders')
            ->leftjoin('users','users.id','=','orders.id_admin')
            ->leftjoin('transports','transports.id', '=','orders.id_transport')
            ->leftjoin('drivers','drivers.id','=', 'orders.id_driver')
            ->select(
                'orders.name as Peminjam',
                'orders.nomor as Nomor HP',
                'users.name as ADMIN',
                'transports.name as Kendaran',
                'drivers.name as Pengemudi',
                'orders.id_approver as ID_penyetuju',
                'orders.awal_pinjam as Awal Pesan',
                'orders.akhir_pinjam as Pengembalian',
                'orders.status as Status'
            )
            ->get();
    }
    public function headings(): array
    {
        return [
            'Peminjam',
            'Nomor HP',
            'ADMIN',
            'Kendaraan',
            'Driver',
            'APPROVER_ID',
            'Awal Pinjam',
            'Waktu Pengembalian',
            'Status',
        ];
    }
}
