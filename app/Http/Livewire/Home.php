<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Card;

class Home extends Component
{

    public function render()
    {
        $card = Card::where('user_id', auth()->user()->id)->first();
        return view('livewire.home', compact('card'));
    }

    public function submitDelete($id){
        Card::where('id', $id)->delete();
        redirect()->route('home');
    }
}
