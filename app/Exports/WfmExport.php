<?php

namespace App\Exports;

use App\Models\Wfm;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class WfmExport implements FromCollection,WithHeadings,WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Wfm::all();
    }

    public function map($wfm): array
    {
        return [
            $wfm->no,
            $wfm->tgl_bulan_th,
            $wfm->no_ao,
            $wfm->witel,
            $wfm->olo_isp,
            $wfm->site_kriteria,
            $wfm->sid,
            $wfm->site_id,
            $wfm->order_type,
            $wfm->produk,
            $wfm->satuan,
            $wfm->kapasitas_bw,
            $wfm->longitude,
            $wfm->latitude,
            $wfm->alamat_asal,
            $wfm->alamat_tujuan,
            $wfm->status_ncx,
            $wfm->berita_acara,
            $wfm->tgl_complete,
            $wfm->status_wfm,
            $wfm->alasan_cancel,
            $wfm->cancel_by,
            $wfm->start_cancel,
            $wfm->ready_after_cancel,
            $wfm->integrasi,
            $wfm->metro,
            $wfm->ip,
            $wfm->port,
            $wfm->metro2,
            $wfm->ip2,
            $wfm->port2,
            $wfm->vlan,
            $wfm->vcid,
            $wfm->gpon,
            $wfm->ip3,
            $wfm->port3,
            $wfm->sn,
            $wfm->port4,
            $wfm->type,
            $wfm->nama,
            $wfm->ip4,
            $wfm->downlink,
            $wfm->type2,
            $wfm->capture_done,
            $wfm->pic

        ];
    }

    public function headings(): array
    {
        return [
            'NO',
            'TGL/BLN/THN',
            'NO. AO',
            'WITEL',
            'OLO / ISP',
            'SITE KRITERIA',
            'SID',
            'SITE ID',
            'ORDER TYPE',
            'PRODUK',
            'SATUAN',
            'KAPASITAS [BW]',
            'LONGITUDE',
            'LATITUDE',
            'ALAMAT ASAL',
            'ALAMAT TUJUAN',
            'STATUS NCX',
            'BERITA ACARA',
            'TGL COMPLETE WFM',
            'STATUS WFM',
            'ALASAN CANCEL',
            'CANCEL By',
            'START CANCEL DATE',
            'READY AFTER CANCEL',
            'INTEGRASI',
            'METRO',
            'IP',
            'PORT',
            'METRO',
            'IP',
            'PORT',
            'VLAN',
            'VCID',
            'GPON',
            'IP',
            'PORT',
            'SN',
            'PORT',
            'TYPE',
            'NAMA',
            'IP',
            'DOWNLINK',
            'TYPE',
            'CAPTURE DONE',
            'PIC'
        ];
    }
}
