<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    public function edit($id){

        $user = User::find($id);
        return view('profile.edit')->with('user', $user);
    }


    public function update(Request $request, $id){
       
        $user = User::find($id);
        $user->name = $request -> input('name');
        $user->email = $request -> input('email');
    
        if ( ! $request -> input('password') == '')
        {
            $user->password = bcrypt($request -> input('password'));
        }
    
        $user->save();
    
        
        return redirect('home')->with('success', 'Account Updated');
    }
}
