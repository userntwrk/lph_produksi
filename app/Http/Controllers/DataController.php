<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Collection;
use App\Models\Load;

class DataController extends Controller implements ToCollection, WithHeadingRow
{    
    public function index()
    {
        $title = 'Table Load Joint';
        $load = Load::all();

        return view('report.data', compact('load', 'title'), ['load' => $load]);
    }

    public function import(Request $request)
    {
        $request->validate([
            'excel_file' => 'required|mimes:xlsx,xls',
        ]);

        $file = $request->file('excel_file');

        Excel::import($this, $file);

        return redirect()->back()->with('success', 'Data imported successfully.');
    }

    public function collection(Collection $rows){
        foreach ($rows as $row) {
            $column1 = $row['partname'];
            $column2 = $row['skema'];
            $column3 = $row['status'];
            $column4 = $row['size'];
            $column5 = $row['warna'];
            $column6 = $row['kode_joint'];
            $column7 = $row['terminal'];
            $column8 = $row['std_ch'];

            Load::create([
                'partname' => $column1,
                'skema' => $column2,
                'status' => $column3,
                'size' => $column4,
                'warna' => $column5,
                'kode_joint' => $column6,
                'terminal' => $column7,
                'std_ch' => $column8,
            ]);            
        }                       
    }
    
    public function show($partname){
        $title = 'Detail Load Joint';
        $load = Load::where('partname', $partname)->first();

        return view('report.detail', compact('load', 'title'));
    }
    
}
