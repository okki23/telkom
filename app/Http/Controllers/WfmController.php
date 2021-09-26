<?php

namespace App\Http\Controllers;

use App\Exports\WfmExport;
use App\Http\Controllers\Controller;
use App\Imports\WfmImport;
use App\Models\Database;
use App\Models\Diconnect;
use App\Models\Wfm;
use App\Models\Rekap;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class WfmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('wfm.index', ["title" => "WFM", 'wfms' => Wfm::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('wfm.create', ["title" => "Tambah Data - WFM", 'database' => Database::all(),'rekap' => Rekap::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Wfm $wfm)
    {

        // $wfm->rekap_id = $request->rekap_id;
        // $wfm->tgl_bulan_th = $request->tgl_bulan_th;
        // $wfm->no_ao = $request->no_ao;
        // $wfm->witel = $request->witel;
        // $wfm->olo_isp = $request->olo_isp;
        // $wfm->site_kriteria = $request->site_kriteria;
        // $wfm->sid = $request->sid;
        // $wfm->site_id = $request->site_id;
        // $wfm->order_type = $request->order_type;
        // $wfm->produk = $request->produk;
        // $wfm->satuan = $request->satuan;
        // $wfm->kapasitas_bw = $request->kapasitas_bw;
        // $wfm->longitude = $request->longitude;
        // $wfm->latitude = $request->latitude;
        // $wfm->alamat_asal = $request->alamat_asal;
        // $wfm->alamat_tujuan = $request->alamat_tujuan;
        // $wfm->status_ncx = $request->status_ncx;
        // $wfm->berita_acara = $request->berita_acara;
        // $wfm->tgl_complete = $request->tgl_complete;
        // $wfm->status_wfm = $request->status_wfm;
        // $wfm->alasan_cancel = $request->alasan_cancel;
        // $wfm->cancel_by = $request->cancel_by;
        // $wfm->start_cancel = $request->start_cancel;
        // $wfm->ready_after_cancel = $request->ready_after_cancel;
        // $wfm->integrasi = $request->integrasi;
        // $wfm->metro = $request->metro;
        // $wfm->ip = $request->ip;
        // $wfm->port = $request->port;
        // $wfm->metro2 = $request->metro2;
        // $wfm->ip2  = $request->ip2;
        // $wfm->port2 = $request->port2;
        // $wfm->vlan = $request->vlan;
        // $wfm->vcid = $request->vcid;
        // $wfm->gpon = $request->gpon;
        // $wfm->ip3 = $request->ip3;
        // $wfm->port3 = $request->port3;
        // $wfm->sn = $request->sn;
        // $wfm->port4 = $request->port4;
        // $wfm->type = $request->type;
        // $wfm->capture_metro = $request->capture_metro;
        // $wfm->capture_gpon = $request->capture_gpon;
        // $wfm->pic = $request->pic;
        // $wfm->save();

        $wfm = Wfm::create([
        'rekap_id' => $request->rekap_id,
        'tgl_bulan_th' => $request->tgl_bulan_th,
        'no_ao' => $request->no_ao,
        'witel' => $request->witel,
        'olo_isp' => $request->olo_isp,
        'site_kriteria' => $request->site_kriteria,
        'sid' => $request->sid,
        'site_id' => $request->site_id,
        'order_type' => $request->order_type,
        'produk' => $request->produk,
        'satuan' => $request->satuan,
        'kapasitas_bw' => $request->kapasitas_bw,
        'longitude' => $request->longitude,
        'latitude' => $request->latitude,
        'alamat_asal' => $request->alamat_asal,
        'alamat_tujuan' => $request->alamat_tujuan,
        'status_ncx' => $request->status_ncx,
        'berita_acara' => $request->berita_acara,
        'tgl_complete' => $request->tgl_complete,
        'status_wfm' => $request->status_wfm,
        'alasan_cancel' => $request->alasan_cancel,
        'cancel_by' => $request->cancel_by,
        'start_cancel' => $request->start_cancel,
        'ready_after_cancel' => $request->ready_after_cancel,
        'integrasi' => $request->integrasi,
        'metro' => $request->metro,
        'ip' => $request->ip,
        'port' => $request->port,
        'metro2' => $request->metro2,
        'ip2'  => $request->ip2,
        'port2' => $request->port2,
        'vlan' => $request->vlan,
        'vcid' => $request->vcid,
        'gpon' => $request->gpon,
        'ip3' => $request->ip3,
        'port3' => $request->port3,
        'sn' => $request->sn,
        'port4' => $request->port4,
        'type' => $request->type,
        'capture_metro' => $request->capture_metro,
        'capture_gpon' => $request->capture_gpon,
        'pic' => $request->pic
        ]);

        if($wfm->order_type == "DISCONNECT"){
            Diconnect::create([
                'wfm_id' => $wfm->id,
                'older' => $wfm->no_ao,
                'customer' => $wfm->olo_isp,
                'lokasi' => $wfm->alamat_asal,
                'kota' => $wfm->witel,
                'jenis_ont' => "",
                'status' => "",
                'plan_cabut' => "",
                'pic' => "",
            ]);
        };

        // if($wfm->order_type == "DISCONNECT"){
        //         $diconnect = new Diconnect();
        //         $diconnect->wfm_id = $wfm->id;
        //         $diconnect->older = $wfm->no_ao;
        //         $diconnect->customer = $wfm->olo_isp;
        //         $diconnect->lokasi = $wfm->alamat_asal;
        //         $diconnect->kota = $wfm->witel;
        //         $diconnect->jenis_ont = "";
        //         $diconnect->status = "";
        //         $diconnect->plan_cabut = "";
        //         $diconnect->pic = "";
        //     }

        //    Handphone::create([
    //        'user_id' => $user->id,
    //        'noHp' => $request->noHp
    //    ]);

        return redirect()->route('wfm.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Wfm $wfm)
    {

        return view('wfm.edit', ["title" => "Edit Data - WFM", 'database' => Database::all(), 'wfm' => $wfm,'rekap' => Rekap::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Wfm $wfm)
    {

        $wfm = new Wfm();
        $wfm->rekap_id = $request->rekap_id;
        $wfm->tgl_bulan_th = $request->tgl_bulan_th;
        $wfm->no_ao = $request->no_ao;
        $wfm->witel = $request->witel;
        $wfm->olo_isp = $request->olo_isp;
        $wfm->site_kriteria = $request->site_kriteria;
        $wfm->sid = $request->sid;
        $wfm->site_id = $request->site_id;
        $wfm->order_type = $request->order_type;
        $wfm->produk = $request->produk;
        $wfm->satuan = $request->satuan;
        $wfm->kapasitas_bw = $request->kapasitas_bw;
        $wfm->longitude = $request->longitude;
        $wfm->latitude = $request->latitude;
        $wfm->alamat_asal = $request->alamat_asal;
        $wfm->alamat_tujuan = $request->alamat_tujuan;
        $wfm->status_ncx = $request->status_ncx;
        $wfm->berita_acara = $request->berita_acara;
        $wfm->tgl_complete = $request->tgl_complete;
        $wfm->status_wfm = $request->status_wfm;
        $wfm->alasan_cancel = $request->alasan_cancel;
        $wfm->cancel_by = $request->cancel_by;
        $wfm->start_cancel = $request->start_cancel;
        $wfm->ready_after_cancel = $request->ready_after_cancel;
        $wfm->integrasi = $request->integrasi;
        $wfm->metro = $request->metro;
        $wfm->ip = $request->ip;
        $wfm->port = $request->port;
        $wfm->metro2 = $request->metro2;
        $wfm->ip2  = $request->ip2;
        $wfm->port2 = $request->port2;
        $wfm->vlan = $request->vlan;
        $wfm->vcid = $request->vcid;
        $wfm->gpon = $request->gpon;
        $wfm->ip3 = $request->ip3;
        $wfm->port3 = $request->port3;
        $wfm->sn = $request->sn;
        $wfm->port4 = $request->port4;
        $wfm->type = $request->type;
        $wfm->capture_metro = $request->capture_metro;
        $wfm->capture_gpon = $request->capture_gpon;
        $wfm->pic = $request->pic;
        $wfm->save();


        // if($request->order_type == "DISCONNECT"){
        //     $diconnect = new Diconnect();
        //     $diconnect->wfm_id = $wfm->id;
        //     $diconnect->older = $wfm->no_ao;
        //     $diconnect->customer = $wfm->olo_isp;
        //     $diconnect->lokasi = $wfm->alamat_asal;
        //     $diconnect->kota = $wfm->witel;
        //     $diconnect->jenis_ont = "";
        //     $diconnect->status = "";
        //     $diconnect->plan_cabut = "";
        //     $diconnect->pic = "";
        // }

        if($wfm->order_type == "DISCONNECT"){
            Diconnect::create([
                'wfm_id' => $wfm->id,
                'older' => $wfm->no_ao,
                'customer' => $wfm->olo_isp,
                'lokasi' => $wfm->alamat_asal,
                'kota' => $wfm->witel,
                'jenis_ont' => "",
                'status' => "",
                'plan_cabut' => "",
                'pic' => "",
            ]);
        }


    //     $user = User::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => Hash::make($request->password)
    //     ]);

    //    Handphone::create([
    //        'user_id' => $user->id,
    //        'noHp' => $request->noHp
    //    ]);
        return redirect()->route('wfm.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wfm $wfm)
    {

        $wfm->delete();
        return back();
    }

    public function exportWfm()
    {
        return Excel::download(new WfmExport, 'wfm.xlsx');
    }

    public function importWfm(Request $request, Wfm $wfm)
    {
        $file = $request->file('file');
        $namaFile = $file->getClientOriginalName();
        $file->move('database_temp', $namaFile);

        Excel::import(new WfmImport, public_path('/database_temp/' . $namaFile));

        return redirect()->route('wfm.index');
    }
}
