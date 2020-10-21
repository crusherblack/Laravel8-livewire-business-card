<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Card;
use Livewire\WithPagination;

class Adminpage extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $cards = Card::where('name', 'like', '%'.$this->search.'%')->orderBy('created_at', 'DESC')->paginate(6);
        return view('livewire.adminpage', compact('cards'));
    }
}
