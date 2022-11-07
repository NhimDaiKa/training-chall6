<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\message;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

class ChatController extends Controller
{

    public function chatbox($pid){
        $mess = message::query()
            ->Where('sid', session()->get('pid'))
            ->orWhere('sid', $pid)
            ->get();

        return view('pages.chat',[
            'pid' => $pid,
            'mess' => $mess,
        ]);
    }

    public function editchat($pid, $mid){
        $mess = message::query()
            ->Where('sid', session()->get('pid'))
            ->orWhere('sid', $pid)
            ->get();

        return view('pages.chat',[
            'pid' => $pid,
            'mess' => $mess,
            'mid' => $mid
        ]);
    }

    public function deleteid($pid, $mid){
        return view('pages.delete',[
            'pid' => $pid,
            'mid' => $mid
        ]);
    }

    public function deletemess($pid, $mid){
        message::Where('mid', $mid)->delete();
        
        $mess = message::query()
            ->Where('sid', session()->get('pid'))
            ->orWhere('sid', $pid)
            ->get();

        return redirect('chatbox/'.$pid);
    }

    public function editmess(Request $request, $pid, $mid){
        message::Where('mid', $mid)->update([
            'mess' => $request->get('mess'),
        ]);

        return redirect('chatbox/'.$pid);
    }

    public function sendmess(Request $request, $pid){

        $send = User::query()
            ->Where('pid', session()->get('pid'))
            ->firstOrFail();

        $recv = User::query()
            ->Where('pid', $pid)
            ->firstOrFail();

        message::insert([
            'sid' => ($send->pid),
            'send' => ($send->user),
            'sava' => ($send->avatar),
            'rid' => ($recv->pid),
            'receive' => ($recv->user),
            'rava' => ($recv->avatar),
            'mess' => $request->get('mess')
        ]);
        
        return redirect('chatbox/'.$pid);
    }
}