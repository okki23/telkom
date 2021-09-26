<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wfm extends Model
{
    use HasFactory;
    protected $fillable = [
        'rekap_id',
        'tgl_bulan_th',
        'no_ao',
        'witel',
        'olo_isp',
        'site_kriteria',
        'sid',
        'site_id',
        'order_type',
        'produk',
        'satuan',
        'kapasitas_bw',
        'longitude',
        'latitude',
        'alamat_asal',
        'alamat_tujuan',
        'status_ncx',
        'berita_acara',
        'tgl_complete',
        'status_wfm',
        'alasan_cancel',
        'cancel_by',
        'start_cancel',
        'ready_after_cancel',
        'integrasi',
        'metro',
        'ip',
        'port',
        'metro2',
        'ip2',
        'port2',
        'vlan',
        'vcid',
        'gpon',
        'ip3',
        'port3',
        'sn',
        'port4',
        'type',
        'capture_metro',
        'capture_gpon',
        'pic'
    ];

    public function diconnect()
    {
        return $this->hasOne(Diconnect::class);
    }
}
