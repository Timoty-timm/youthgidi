<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanaLain extends Model
{
    use HasFactory;
    protected $table="danalain_tb";
    protected $fillable = [ 'keterangan', 'jenis', 'jumlah','saldo'];

    public static function getSaldo()
    {
        $pemasukan = DanaLain::where('jenis', 'pemasukan')->sum('jumlah');
        $pengeluaran = DanaLain::where('jenis', 'pengeluaran')->sum('jumlah');
        return  $pengeluaran- $pemasukan ;
    }
}
