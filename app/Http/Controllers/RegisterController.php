<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

// use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
  protected $redirectTo = '/login'; //register başarılı olduğunda yönlendirilecek sayfa

  public function create()
  { // UI SAYFASI DONDUREN

  }
  public function store(Request $request) // KAYIT ISLEMI
  {
    $this->validate($request, [
      //validate işlemleri
      'name' => 'required|string|max:255',
      'email' => 'required|string|email|max:255|unique:users',
      'password' => 'required|string|min:6|confirmed',
    ]);
    //kayıt işlemleri
    $user = new User;
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = bcrypt($request->password);
    $user->save();


    if ($user) { //user oluşursa 
      return redirect($this->redirectTo)->with('success', 'Kayıt işlemi başarıyla tamamlandı.');
    } else {
      return back()->withInput()->with('error', 'Kayıt işlemi sırasında bir hata oluştu.');
    }

  }
}