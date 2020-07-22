<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\UserModel as User;

class AuthController extends Controller {
	
	public function change_password_form(){
		return view('auth.change_password');
	}

	public function change_password(Request $r){
		$this->validate($r,[
			"password_lama" => "required",
			"password_baru" => "required|min:6",
		]);

		$user = User::findOrFail(\Auth::user()->id);

		if(Hash::check($r->password_lama , $user->password)):

			$user->password = Hash::make($r->password_baru);
			
			$user->update();
			$user->touch();
			return redirect()->route('auth.change_password')->with('success','Password berhasil diganti.');
		else:
			return redirect()->route('auth.change_password')->with('error','Password lama anda salah.'); 
		endif;
	}
}