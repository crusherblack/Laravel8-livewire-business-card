<div>
    <div class="search-container">
        <input wire:model.debounce.500ms="search" type="text" class="form-control custom-search" placeholder="Search Card">
        <button class="btn btn-search "><img src="{{asset('img/search.png')}}" alt="search button" class="img-fluid"></button>
    </div>
    <div class="card-container">
        <div class="row mt-5">
            @forelse($cards as $card)
            <div class="col-sm-4">
                <livewire:card.card :card="$card" :key="$card->id"/>
            </div> 
            @empty
            <div class="d-flex justify-content-center align-items-center w-100">
                <h1 class="title primary">Cards Not Found</h1>
            </div>
            @endforelse
        </div>
        <div class="d-flex justify-content-center" >
            {{ $cards->links() }}
        </div>
    </div>
</div>
