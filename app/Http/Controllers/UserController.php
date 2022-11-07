<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\hwt;
use App\Models\hws;
use App\Models\chall;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;


class UserController extends Controller
{

    public function login(Request $request){
        try{
            $user = User::query()
                ->Where('user', $request->get('user'))
                ->Where('pass', $request->get('pass'))
                ->firstOrFail();

            session()->put('pid', $user->pid);
            session()->put('user', $user->user);
            session()->put('role', $user->role);

            return redirect()->route('dashboard');
        } catch(\throwable $e){
            session()->flush();
            return redirect()->route('formlogin');
        }
    }

    public function dashboard(){
        try{
            $user = User::query()
                ->Where('pid', session()->get('pid'))
                ->firstOrFail();
            $pid = $user->pid;

            $hwt = hwt::orderBy('date', 'desc')
                ->get();

            if($user->role == 1) $hws = hws::all();
            else{ 
                $hws = hws::query()
                    ->Where('pid', $pid)
                    ->get();
            }

            $chall = chall::orderBy('date','desc')
                ->get();

            return view ('pages.dashboard', [
                'data' => $user,
                'hwt' => $hwt,
                'hws' => $hws,
                'chall' => $chall
            ]);
        } catch(\throwable $e){
            session()->flush();
            return redirect()->route('formlogin');
        }
    }

    public function logout(){
        session()->flush();
        return redirect()->route('formlogin');
    }

    public function profile(){
        try{
            $user = User::query()
                ->Where('pid', session()->get('pid'))
                ->firstOrFail();

            return view ('pages.profile', [
                'data' => $user
            ]);
        } catch(\throwable $e){
            session()->flush();
            return redirect()->route('formlogin');
        }
    }

    public function userlist(){
        try{
            $list = User::query()
                ->Where('role', 0)
                ->get();

            $user = User::query()
                ->Where('pid', session()->get('pid'))
                ->firstOrFail();

            return view('pages.userlist', [
                'data' => $user,
                'list' => $list
            ]);
        } catch(\throwable $e){
            session()->flush();
            return redirect()->route('formlogin');
        }
    }

    public function createuserform(){
        try{
            $user = User::query()
                ->Where('pid', session()->get('pid'))
                ->firstOrFail();

            return view('pages.createuser', [
                'data' => $user
            ]);
        } catch(\throwable $e){
            session()->flush();
            return redirect()->route('formlogin');
        }
    }

    public function createuser(Request $request){
        try{
            $db = User::insert([
                'user' => $request->get('user'),
                'pass' => $request->get('pass'),
                'name' => $request->get('name'),
                'role' => 0,
                'avatar' => $request->get('avatar'),
                'email' => $request->get('email'),
                'sdt' => $request->get('sdt'),
            ]);

            return redirect()->route('userlist');
        } catch(\throwable $e){
            return redirect()->route('userlist');
        }
    }

    public function edituser($pid){
        $user = User::query()
            ->Where('pid', session()->get('pid'))
            ->firstOrFail();

        $change = User::query()
            ->Where('pid', $pid)
            ->firstOrFail();

        return view('pages.edituser',[
            'data' => $user,
            'change' => $change
        ]);
    }

    public function edit(Request $request, $pid){
        $db = User::Where('pid',$pid)->update([
            'user' => $request->get('user'),
            'pass' => $request->get('pass'),
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'sdt' => $request->get('sdt'),
        ]);

        return redirect()->route('userlist');
    }

    public function deleteuser($pid){
        return view('pages.delete',[
            'pid' => $pid
        ]);
    }

    public function delete($pid){
        User::Where('pid', $pid)->delete();
        return redirect()->route('userlist');
    }

    public function editprofile(Request $request){
        if($request->file('avatar')){
            $path = Storage::disk('public')->putFile('photo', $request->file('avatar'));
            $db = User::Where('pid', session()->get('pid'))->update([
                'pass' => $request->get('pass'),
                'email' => $request->get('email'),
                'sdt' => $request->get('sdt'),
                'bio' => $request->get('bio'),
                'avatar' => $path
            ]);
        }
        else {
            $db = User::Where('pid',session()->get('pid'))->update([
                'pass' => $request->get('pass'),
                'email' => $request->get('email'),
                'sdt' => $request->get('sdt'),
                'bio' => $request->get('bio'),
            ]);
        }
            
        return redirect()->route('profile');
    }

    public function otherprofile($pid){
        try{
            $user = User::query()
                ->Where('pid', $pid)
                ->firstOrFail();

            return view ('pages.otherprofile', [
                'data' => $user
            ]);
        } catch(\throwable $e){
            return redirect()->route('userlist');
        }
    }

}
