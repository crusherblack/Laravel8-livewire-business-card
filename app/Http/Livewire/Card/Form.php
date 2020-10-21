<?php

namespace App\Http\Livewire\Card;

use Livewire\Component;
use App\Models\Card;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Form extends Component
{
    use WithFileUploads;    

    public $form = [
        'name'   => '',
        'position'=> '',
        'address'=> '',
        'phone'=> '',
        'email'=> '',       
    ];

    public $photo;

    //realtime validation
    public function updated($field)
    {
        $this->validateOnly($field, [
            'form.name'    => 'required|min:3',
            'form.position' => 'required',
            'form.address' => 'required',
            'form.phone' => 'required',
            'form.email' => 'required|email|unique:cards,email',
            'photo' => 'image|max:5120 ',
        ]);
    }

    public function submit(){
        $photoName = md5($this->photo.microtime()).'.'.$this->photo->extension();

        Storage::putFileAs(
            'public/images',
            $this->photo,
            $photoName
        );

        auth()->user()->card()->create([
            'name'   => $this->form['name'],
            'position'=> $this->form['position'],
            'address'=> $this->form['address'],
            'phone'=> $this->form['phone'],
            'email'=> $this->form['email'], 
            'photo' => $photoName      
        ]);

        $this->clearForm();

        redirect()->route('home');
    }

    public function clearForm(){
        $this->form = [
            'name'   => '',
            'position'=> '',
            'address'=> '',
            'phone'=> '',
            'email'=> '',       
        ];
        $this->photo = '';
    }

    public function render()
    {
        return view('livewire.card.form');
    }

 

}
