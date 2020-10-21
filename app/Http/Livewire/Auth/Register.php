<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use App\Models\User;

class Register extends Component
{
    public $form = [
        'name'                  => '',
        'email'                 => '',
        'password'              => '',
        'password_confirmation' => '',
    ];

    public function submit()
    {
        $this->validate([
            'form.email'    => 'required|email|unique:users,email',
            'form.name'     => 'required',
            'form.password' => 'required|confirmed',
        ]);

        try {
             User::create([
                'name'                  => $this->form['name'],
                'email'                 => $this->form['email'],
                'password'              => bcrypt($this->form["password"]),
            ]);
            session()->flash('success', 'Register Success Please Login');
            redirect()->route('login');        
        } catch (\Throwable $th) {
            session()->flash('error', 'Server Error');
        }       
    }

    public function render()
    {
        return view('livewire.auth.register')->layout('layouts.auth');;
    }
}
