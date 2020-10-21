<?php

namespace App\Http\Livewire\Card;

use Livewire\Component;
use App\Models\Card;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class EditForm extends Component
{
    use WithFileUploads;    

    public $form = [
        'id' => '',
        'name'   => '',
        'position'=> '',
        'address'=> '',
        'phone'=> '',
        'email'=> '',       
    ];

    public $photo;
    public $photoUrl;

    public function mount($id){
        $card = Card::findOrFail($id);

        $this->form = [
            'id'   => $card->id,
            'name'   => $card->name,
            'position'=> $card->position,
            'address'=> $card->address,
            'phone'=> $card->phone,
            'email'=> $card->email,       
        ];

        $this->photoUrl = $card->photo;
    }

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
        if($this->photo){
            $photoName = md5($this->photo.microtime()).'.'.$this->photo->extension();

            Storage::putFileAs(
                'public/images',
                $this->photo,
                $photoName
            );

            $data = [
                'name'   => $this->form['name'],
                'position'=> $this->form['position'],
                'address'=> $this->form['address'],
                'phone'=> $this->form['phone'],
                'email'=> $this->form['email'], 
                'photo' => $photoName      
            ];
        }else{
            $data = $this->form;
        }
        
        Card::where('id', $this->form['id'])->update($data);

        $this->emit('success', ['type' => 'success', 'message' => 'Succesfully Update Card']);
    }    

    public function render()
    {
        return view('livewire.card.edit-form');
    }
}
