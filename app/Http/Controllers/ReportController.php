<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Laporan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index()
    {
        $title = 'Laporan Harian Hasil Produksi W/H';

        $no_reg = Auth::user()->no_reg;
        $laporan = DB::select("SELECT * FROM laporans WHERE no_reg = '$no_reg'");

        return view('/index', ["laporan" => $laporan, "title" => $title, "no_reg" => $no_reg]);
    }

    // public function getnoreg()
    // {
    //     $no_reg = Auth::user()->no_reg;
    //     echo $no_reg;
    // }

    public function create()
    {
        $title = 'Produksi Joint';
        // $noregValue = $this->getNoRegValue();

        return view('/create', compact('title'));
    }

    // public function autofill(Request $request)
    // {
    //     $NoLot = $request->input('NoLot');
    //     $laporan = Laporan::where('NoLot', $NoLot)->first();

    //     if ($laporan) {
    //         $data = [
    //             'kode_joint' => $laporan->kodejoint,
    //             'std_ch' => $laporan->Std_CH,
    //             'n1' => $laporan->N1,
    //             'n2' => $laporan->N2,
    //             'n3' => $laporan->N3,
    //             'std_tes' => $laporan->Std_Tes,
    //         ];
    //         return response()->json($data);
    //     }
    //     return view('/create', compact('laporan'));
    //     // return response()->json(['message' => 'Data not found']);
    // }

    public function getdata(Request $request)
    {
        $nolot = $request->input('no_lot');
        $kodejoint = $request->input('kode_joint');

        $data = DB::select("SELECT * FROM laporans WHERE NoLot = '$nolot' AND kodejoint = '$kodejoint'");

        $data2 = DB::select("SELECT b.std_ch, c.standar FROM rphmesin a LEFT JOIN loads b ON a.partname = b.partname 
        LEFT JOIN standar_tes c ON a.ukuran = c.ukuran
        WHERE a.lotno = '$nolot' AND b.kode_joint = '$kodejoint' GROUP BY b.std_ch, c.standar");

        $std_ch = '';
        $n1 = '';
        $n2 = '';
        $n3 = '';
        $std_tes = '';
        $n1_tes = '';
        $hasil = '';
        $w_set = '';
        $w_tes = '';
        $shift = '';

        foreach ($data2 as $data2) {
            $std_ch = $data2->std_ch;           
            $std_tes = $data2->standar; 
        }

        foreach ($data as $data) {
            $nolot = $data->NoLot;
            $n1 = $data->N1;
            $n2 = $data->N2;
            $n3 = $data->N3;            
            $n1_tes = $data->N1_tes;
            $hasil = $data->Hasil;
            $w_set = $data->w_setting;
            $w_tes = $data->w_tes;
            $shift = $data->shift;
        }

        $output = array('no_lot' => $nolot, 'std_ch' => $std_ch, 'n1' => $n1, 'n2' => $n2, 'n3' => $n3, 'std_tes' => $std_tes, 'n1_tes' => $n1_tes, 'hasil' => $hasil, 'w_set' => $w_set, 'w_tes' => $w_tes, 'shift' => $shift);

        return response()->json($output);
    }

    // public function autofill(Request $request)
    // {
    //     $NoLot = $request->input('NoLot');
    //     $laporan = Laporan::where('NoLot', $NoLot)->first();

    //     if ($laporan) {
    //         $data = [
    //             'kodejoint' => $laporan->kode_joint,
    //             'Std_CH' => $laporan->Std_CH,
    //             'N1' => $laporan->N1,
    //             'N2' => $laporan->N2,
    //             'N3' => $laporan->N3,
    //             'Std_tes' => $laporan->Std_Tes,
    //         ];

    //         return response()->json([
    //             'success' => true,
    //             'data' => $data,
    //         ]);
    //     }

    //     return response()->json([
    //         'success' => false,
    //         'message' => 'Data not found',
    //     ]);
    // }


    public function store(Request $request)
    {
        // $noregValue = $this->getNoRegValue();

        $noreg = $request->no_reg;
        $nolot = $request->no_lot;
        $kodejoint = $request->kode_joint;
        $std_ch = $request->std_ch;
        $n1 = $request->n1;
        $n2 = $request->n2;
        $n3 = $request->n3;
        $std_tes = $request->std_tes;
        $n1_tes = $request->n1_tes;
        $hasil = $request->hasil;
        $w_set = $request->w_set;
        $w_tes = $request->w_tes;
        $shift = $request->shift;
        $start = $request->start;
        $end = $request->end;

        $data = DB::select("SELECT count(*) as jumlah FROM laporans WHERE NoLot = '$nolot'");
        $jumlah = 0;
        foreach ($data as $data) {
            $jumlah = $data->jumlah;
        }

        $data = array(
            'no_reg' => $noreg,
            'NoLot' => $nolot,
            'kodejoint' => $kodejoint,
            'Std_CH' => $std_ch,
            'N1' => $n1,
            'N2' => $n2,
            'N3' => $n3,
            'Std_tes' => $std_tes,
            'N1_tes' => $n1_tes,
            'Hasil' => $hasil,
            'w_setting' => $w_set,
            'w_tes' => $w_tes,
            'shift' => $shift,
            'start' => $start,
            'end' => $end,
        );

        if ($jumlah == 0) {
            DB::table('laporans')->insert($data);
        } else {
            DB::table('laporans')->where('NoLot', $nolot)->update($data);
        }

        // dd($data);
        return redirect('/index/create');

        // return $request->all();        
    }

    public function show($NoLot)
    {
        $title = 'Detail Data Laporan';
        $laporan = Laporan::where('NoLot', $NoLot)->first();

        return view('/detail', compact('laporan', 'title'));
    }

    // public function edit($NoLot)
    // {
    //     $laporan = Laporan::where('NoLot', $NoLot)->first();

    //     return view('/edit', compact('laporan'));
    // }

    // public function update(Request $request, $NoLot)
    // {
    // $laporan = Laporan::where('NoLot', $NoLot)->first();
    // $laporan->NoLot = $request->no_lot;
    // $laporan->kodejoint = $request->kode_joint;
    // $laporan->Std_CH = $request->std_ch;
    // $laporan->N1 = $request->n1;
    // $laporan->N2 = $request->n2;
    // $laporan->N3 = $request->n3;
    // $laporan->Std_tes = $request->std_tes;
    // $laporan->N1_tes = $request->n1_tes;
    // $laporan->Hasil = $request->hasil;
    // $laporan->w_setting = $request->w_set;
    // $laporan->w_tes = $request->w_tes;
    // $laporan->Rework = $request->rework;

    // $laporan->update();

    // return redirect('/index');
    // }

    public function destroy($NoLot)
    {
        $laporan = Laporan::where('NoLot', $NoLot);
        $laporan->delete();

        return redirect('/index');
    }

    public function search(Request $request)
    {
        $title = 'Laporan Harian Hasil Produksi W/H';
        $no_reg = Auth::user()->no_reg;
        $search = $request->get('search');
        $laporan = DB::select("select * from laporans where no_reg = '$no_reg' and NoLot like '%$search%'");

        // $data = DB::table('loads')->where('partname', 'like', '%' . $search . '%');

        return view('/index', ['laporan' => $laporan, 'title' => $title]);
    }

    // public function getRouteKey($slug): mixed
    // {
    //     $slug = $this->getRouteKeyName();

    //     return view('/index', compact('slug'));
    // }
}