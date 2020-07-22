<?php

namespace App\Exports;

use App\Models\Riwayat;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class HistoryExport implements WithHeadings,FromArray
{
    /**
     * @param $month 
     * @param $year 
     * @param $id -> user 
     */
    public function __construct($month,$year,$tabungan){
        $this->month = $month;
        $this->year = $year;
        $this->tabungan = $tabungan;
    }

	public function headings(): array
    {
        return [
            '#',
            'Nama Nasabah',
            'Tanggal',
            'Aksi',
            'Jumlah',
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function array(): array
    {
        
        $histories = Riwayat::where(["tabungan_id" => $this->tabungan->id])
                                ->whereMonth('created_at','=',$this->month)
                                ->whereYear('created_at','=',$this->year)
                                ->orderBy('created_at','DESC')
                                ->get();

		$history_result= [];
        $no = 1;

		foreach ($histories as $row) {
			
			$history_result[] = [
				"No" => $no,
				"Nama Nasabah" => $this->tabungan->anggota->nama,
				"Tanggal Pinjam" => Date( 'Y/m/d' , strtotime($row->created_at) ) ,
				"Aksi" => ( $row->action != "simpan" ) ? "Penambahan Saldo" : "Pengambilan Saldo",
				"Jumlah" => $row->value,
			];
			$no++;
		}


        return $history_result;
    }
}
