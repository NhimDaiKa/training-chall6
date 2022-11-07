<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\hwt;
use App\Models\hws;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;


class HomeworkController extends Controller
{

    public function createhomeworkform(){
        return view('pages.createhomework');
    }

    public function createhomework(Request $request){
        
        $path = Storage::disk('public')->putFile('homework', $request->file('file'));

        hwt::insert([
            'name' => $request->get('name'),
            'file' => $request->file('file')->getClientOriginalName(),
            'path' => $path,
            'date' => now()
        ]);

        return redirect()->route('dashboard');
    }

    public function turnin(Request $request, $prjid){

        $path = Storage::disk('public')->putFile('file', $request->file('file'));

        $user = User::query()
            ->Where('pid', session()->get('pid'))
            ->firstOrFail();

        hws::insert([
            'file' => $request->file('file')->getClientOriginalName(),
            'path' => $path,
            'date' => now(),
            'pid' => $user->pid,
            'user' => $user->user,
            'prj_id' => $prjid
        ]);

        return redirect()->route('dashboard');
    }

    public function downhomework($hid){
        $db = hwt::query()
                ->Where('hid', $hid)
                ->firstOrFail();
        
        redirect()->route('dashboard');
        return Storage::download('public/'.$db->path, $db->file);
    }

    public function downanswer($hid){
        $db = hws::query()
                ->Where('hid', $hid)
                ->firstOrFail();
        
        redirect()->route('dashboard');
        return Storage::download('public/'.$db->path, $db->file);
    }
}