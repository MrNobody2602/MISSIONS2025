<?php

namespace App\Http\Controllers;
use App\Models\AddChurch;
use Illuminate\Http\Request;

class AddChurchController extends Controller
{
    public function church_add(){
        return view('components.church_add');
    }

    public function addNewChurch(Request $request) {
        $request->validate([
            'chname' => 'required|string|max:255',
            'chaddress' => 'required|string|max:255'
        ]);
        
        $latestChurchCode = AddChurch::orderBy('id', 'DESC')->value('chcode');
        $nextNumber = 1;

        if($latestChurchCode && preg_match('/^CH(\d+)$/', $latestChurchCode, $matches)){
            $nextNumber = (int)$matches[1] + 1;
        }

        $newChurchCode = 'CH' . $nextNumber;

        $newChurchName = AddChurch::create([
            'chcode' => $newChurchCode,
            'churchname' => $request->input('chname'),       
            'churchaddress' => $request->input('chaddress'),
        ]);

        return redirect()->route('church.add')->with('success', 'Church Added Succesfully');
    }
}