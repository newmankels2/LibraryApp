<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
  public $email, $password;

  public function login()
  {
    $this->validate([
      'email' => 'required',
      'password' => 'required',
    ]);

    // dd($this);

    if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
      return redirect(url('book'));
    } else {
      session()->flash('error', 'Something is wrong');
    }
  }

  public function render()
  {
    return view('livewire.login');
  }
}
