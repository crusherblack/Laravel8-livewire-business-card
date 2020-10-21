<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class Login extends Component
{
    public $form = [
        'email'   => '',
        'password'=> '',
    ];

    public function submit()
    {
        $this->validate([
            'form.email'    => 'required|email',
            'form.password' => 'required',
        ]);
        try {
            $user = User::where([
                "email" => $this->form["email"],
            ])->get();

            if(count($user) == 1 && Auth::attempt($this->form)){                
                session()->flash('success', "Yes! Login successful. You'r authenticated user");
                if($user[0]->role == 'ADMIN'){
                    redirect()->route('adminpage');
                }else{
                    redirect()->route('home');
                }                
            }else{
                session()->flash('error', 'You credentials does not match. Please try again later.');
            }
        } catch (\Throwable $th) {
            dd($th);
        }              
    }

    public function render()
    {
        return view('livewire.auth.login')->layout('layouts.auth');
    }   
}
