<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\hwt;
use App\Models\hws;
use App\Models\chall;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;


class ChallengeController extends Controller
{
    public function createchallform(){
        return view('pages.createchallform');
    }

    public function createchall(Request $request){
        
        $realname = $request->file('file')->getClientOriginalName();
        $path = Storage::disk('public')->putFileAs('chall', $request->file('file'), $realname);

        chall::insert([
            'name' => $request->get('name'),
            'file' => $realname,
            'hint' => $request->get('hint'),
            'date' => now()
        ]);

        return redirect()->route('dashboard');
    }

    public function answer(Request $request, $cid){
        $chall = chall::query()
            ->Where('cid', $cid)
            ->firstOrFail();
        
        $ans = Str::substr($chall->file, 0, Str::length($chall->file)-4);
        if($ans == $request->get('ans')) session()->put('correct', $cid);
        return redirect()->route('dashboard');
    }
}