<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;


class CombineController extends Controller
{
    public function index(Request $request, $selectedDate = null)
    {
        $title = 'Laporan Harian Hasil Produksi W/H';
        $note = '';

        if ($request->has('note')) {
            $note = $request->input('note');
            session(['note' => $note]);
        } elseif (session()->has('note')) {
            $note = session('note');
        }

        if (!$selectedDate) {
            $selectedDate = date('Y-m-d');
        }

        $dates = DB::table('tampil')
            ->select(DB::raw('DATE(laporans.shift) as date'))
            ->join('laporans', 'tampil.NoLot', '=', 'laporans.NoLot')
            ->groupBy('date')
            ->get();
        
        $data = DB::table('tampil')
            ->select('tampil.*', 'laporans.shift')
            ->join('laporans', 'tampil.NoLot', '=', 'laporans.NoLot')
            ->whereDate('laporans.shift', $selectedDate)
            ->get();

        return view('report.laporan', compact('dates', 'selectedDate', 'data', 'title', 'note'));
    }

    public function export(Request $request, $selectedDate = null)
    {
        $id = Auth::user()->id;
        $nolot = $request->NoLot;
        $base = User::where('id', Auth::user()->id)->first();

        $selectedDate = Carbon::parse($selectedDate);
        $data = DB::table("tampil")
            ->join('laporans', 'tampil.NoLot', '=', 'laporans.NoLot')
            ->whereDate('laporans.shift', $selectedDate->format('Y-m-d'))
            ->get();            

        $timeDifference = DB::table('laporans')
            ->select(DB::raw('TIMEDIFF(End, Start) as time_difference'))
            ->whereDate('shift', $selectedDate->format('Y-m-d'))
            ->first();

        $timedifference = $timeDifference ? $timeDifference->time_difference : '00:00:00';
        // count sum the total time from result of time difference
        $totalTime = DB::table('laporans')
            ->select(DB::raw('SEC_TO_TIME(SUM(TIME_TO_SEC(TIMEDIFF(End, Start)))) as total_time'))
            ->whereDate('shift', $selectedDate->format('Y-m-d'))
            ->first();

        $sum = $data->sum('Hasil');

        foreach ($data as $item) {
            $nolot = $item->NoLot;
        }

        $shifts = DB::select("SELECT date_format(shift, '%T') as shift FROM users WHERE id = '$id'");
        $shif = null;
        $shift = null;

        $varshift = null;
        foreach ($shifts as $shift) {
            $varshift = $shift->shift;
        }

        if ($varshift >= '07:30:00' && $varshift <= '19:00:00') {
            $shif = '1';
        } else if (($varshift >= '19:00:00' && $varshift <= '23:59:59') || ($varshift >= '00:00:00' && $varshift <= '07:30:00')) {
            $shif = '2';
        } else {
            $shif = '3';
        }

        // add note with ajax to display in pdf
        $note = '';
        if (session()->has('note')) {
            $note = session('note');
        }

        // dd($note);
        // Limit the rows of table for export pdf to 10 rows per page
        
        
        $pdf = PDF::loadView('report.export', compact('data', 'base', 'shift', 'shif', 'selectedDate', 'timedifference', 'totalTime', 'sum', 'note'))->setPaper('A2', 'landscape');
        $pdfContent = $pdf->output();

        $response = response($pdfContent);
        $response->header('Content-Type', 'application/pdf');
        $response->header('Content-Disposition', 'inline; filename="Laporan_Hasil_Produksi_WH.pdf"');

        return $response;
    }

    // public function export(Request $request)
    // {        
    //     $nolot = $request->NoLot;
    //     $base = User::where('id', Auth::user()->id)->first();
    //     $shifts = DB::select("SELECT * FROM laporans WHERE NoLot = '$nolot'");
    //     $shif = null;
    //     $shift = null;

    //     if (!empty($shifts)) {
    //         $firstShift = $shifts[0];
    //         $shift = $firstShift->shift;

    //         if ($shift >= '07:30:00' && $shift <= '16:30:00') {
    //             $shif = '1';
    //         } elseif ($shift >= '19:00:00' && $shift <= '03:00:00') {
    //             $shif = '2';
    //         } elseif ($shift >= '23:30:00' || $shift <= '12:00:00') {
    //             $shif = '3';
    //         }
    //     } else {
    //         $shif = '1';
    //     }

    //     $data = DB::select("SELECT * FROM tampil INNER JOIN laporans b ON tampil.NoLot = b.NoLot");
    //     // dd($nolot, $shif, $data);

    //     $pdf = PDF::loadView('report.export', compact('data', 'base', 'shift', 'shif'))->setPaper('a2', 'landscape');
    //     return $pdf->stream('Laporan Hasil Produksi W/H.pdf');
    // }




    public function getProcedure($selectedDate = null)
    {
        $title = 'Combine Procedure';
        if (!$selectedDate) {
            $selectedDate = date('d-m-Y');
        }

        $data = DB::select("CALL COMBINE()");

        return view('report.laporan', compact('data', 'selectedDate', 'title'), ['data' => $data]);
    }

    public function cleanData($selectedDate = null)
    {
        $title = 'Clear Procedure';
        if (!$selectedDate) {
            $selectedDate = date('d-m-Y');
        }

        $data = DB::select("CALL CLEAR()");

        return view('report.laporan', compact('data', 'selectedDate', 'title'), ['data' => $data]);
    }

    // Display Date Selection Dropdown
    public function pickDate(Request $request)
    {
        $title = 'Laporan Harian Hasil Produksi W/H';
        $selectedDate = $request->input('date', date('d-m-Y'));

        $dates = DB::table('tampil')
            ->select(DB::raw('DATE(laporans.shift) as date'))
            ->join('laporans', 'tampil.NoLot', '=', 'laporans.NoLot')
            ->groupBy('date')
            ->get();

        $data = DB::table('tampil')
            ->select('tampil.*', 'laporans.shift')
            ->join('laporans', 'tampil.NoLot', '=', 'laporans.NoLot')
            ->whereDate('laporans.shift', $selectedDate)
            ->get();

        return view('report.laporan', compact('dates', 'selectedDate', 'data', 'title'));
    }
}