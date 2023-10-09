<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DemoController extends Controller
{
    public function displayTable(Request $request)
    {
        $title = 'Demo Date';
        // Get the date from the user
        $selectedDate = $request->input('date');

        // Retrieve the available shifts from the database
        $shifts = DB::table('laporans')->select('shift')->distinct()->get();

        // Retrieve the data based on the selected date
        $query = "SELECT * FROM tampil 
        INNER JOIN laporans b ON tampil.NoLot = b.NoLot
        WHERE b.shift = ?";
        $rows = DB::select($query, [$selectedDate]);

        // dd($rows);

        // Return the view with the data
        return view('demo', [
            'shifts' => $shifts,
            'selectedDate' => $selectedDate,
            'data' => $rows,
            'title' => $title
        ]);
    }
}
