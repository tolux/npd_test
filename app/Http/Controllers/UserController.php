<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Csvfile;

class UserController extends Controller
{
    //
    public const UNIQUE_ATTRIBUTE = 'email';
    public function upload(Request $request)
    {
        // dd($request);

        $request->validate([
            'csv' => 'required|mimes:csv,txt',
        ]);

        $file = $request->file('csv');
        $fileContents = file($file->getPathname());


        //  getting the column title , and converting to an array
        $csvHeader = explode( ',',  strtolower(array_shift($fileContents)));

        // the index of unique attribute
        $uniqueIndex = array_search($this::UNIQUE_ATTRIBUTE, $csvHeader);

        $duplicateRecords = [];

        foreach ($fileContents as $line) {
            $record = str_getcsv($line);
            $existingRecord = Csvfile::where('email', $record[$uniqueIndex])->first();
            if(!$existingRecord){
                Csvfile::create([
                    'name' => $record[1],
                    'email' => $record[2],
                    'phone' => $record[3],
                    'address' => $record[4],
                ]);
            }else{
                array_push($duplicateRecords, $record);
            }
        }
        session()->flash('success', 'CSV file imported successfully!');
        session()->flash('duplicateRecords',sizeof($duplicateRecords));

        return redirect()->back();

    }
}
