<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $user = User::query();
        return view('pages.user.index',[
            'users' => $user->orderBy('id', 'DESC')->paginate(5)->onEachSide(1)->withQueryString()
        ]);
    }

    public function create()
    {
        return view('pages.user.create');
    }

    public function edit($slug){
        $user = User::query()->where('slug',$slug)->firstOrFail();

        return view('pages.user.edit',[
            'user' => $user
        ]);
    }

    public function update(Request $request, $id){

        $validatedData = $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|email:rfc,dns',
            'roles' => 'required'
        ]);

        User::find($id)->update($validatedData);

        return redirect()->route('users')->with('success','Data Berhasil Diubah');
    }

    public function destroy($id){
        $user = User::findOrFail($id);

        $user->delete();

        return back()->with('success','Data Berhasil Dihapus');
    }
}
