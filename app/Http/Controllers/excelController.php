<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Reader\Exception;
use App\Jobs\ImportJob;


class excelController extends Controller
{
    public function excel(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|file|mimes:ods'
        ]);
        $file = $request->file('file');
        $spreadsheet = IOFactory::load($file->getRealPath());
        $sheet = $spreadsheet->getActiveSheet();
        $row_limit = $sheet->getHighestDataRow();
        $column_limit = $sheet->getHighestDataColumn();
        $row_range = range(1, $row_limit);
        $column_range = range('A', $column_limit);
        $data = [];
        foreach ($row_range as $row) {
            $rowData = [];
            foreach ($column_range as $column) {
                $rowData[$column] = $sheet->getCell($column . $row)->getValue();
            }

            $data[] = $rowData;
        }
        foreach ($data as $row) {
            $rowData = [
                'name' => $row['A'],
                'age' => $row['B'],
                'email' => $row['C'],
                'address' => $row['D'],
                'phoneno' => $row['E'],
                'fathername' => $row['F'],
                'mothername' => $row['G'],
                'salary' => $row['H'],
                'roletype' => $row['I'],
                'status' => $row['J'],
                'project' => $row['K'],
                'term' => $row['L'],
                'laptop' => $row['M'],
                'department' => $row['N'],
                'unit' => $row['O'],
                'bank' => $row['P']
            ];

            

            dispatch(new ImportJob($rowData));
        }
        // dd($insertData);
        
    }
    //     $this->validate($request, [
    //         'file' => 'required|file|mimes:ods'
    //     ]);

    //     try {
    //         $file = $request->file('file');
    //         $spreadsheet = IOFactory::load($file->getRealPath());
    //         $sheet = $spreadsheet->getActiveSheet();
    //         $row_limit = $sheet->getHighestDataRow();
    //         $column_limit = $sheet->getHighestDataColumn();
    //         $row_range = range(1, $row_limit);
    //         $column_range = range('A', $column_limit);
            
    //         $data = [];

    //         foreach ($row_range as $row) {
    //             $rowData = [];

    //             foreach ($column_range as $column) {
    //                 $rowData[$column] = $sheet->getCell($column . $row)->getValue();
    //             }

    //             $data[] = $rowData;
    //         }
    //         $insertData = [];
    //         foreach ($data as $row) {
    //             $rowData = [
    //                 'name' => $row['A'],
    //                 'age' => $row['B'],
    //                 'email' => $row['C'],
    //             ];
    //             $insertData[] = $rowData;
    //         }
    //         DB::table('client_data')->insert($insertData);
    //         return redirect()->back()->with('success', 'Data has been successfully imported.');
    //     }
    //     catch (Exception $e) {
    //         // Log the error
    //         \Log::error($e->getMessage());

    //         return redirect()->back()->with('error', 'An error occurred while importing the data.');
    //     }
    // }
}
