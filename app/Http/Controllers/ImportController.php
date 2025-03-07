<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\MultiSheetImport;

class ImportController extends Controller
{
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        Excel::import(new MultiSheetImport, $request->file('file'));

        return back()->with('success', 'Data berhasil diimport!');
    }
}


