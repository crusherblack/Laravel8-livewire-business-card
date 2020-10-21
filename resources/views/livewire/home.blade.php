<div>
    <div class="card-container">
        <div class="row mt-5">
            @if($card)
            <div class="col-sm-12">
                <livewire:card.card :card="$card" :key="$card->id"/>
            </div> 
            @else
            <div class="d-flex justify-content-center align-items-center w-100">
                <img src="{{asset('img/empty.png')}}" alt="empty card" class="img-fluid">
            </div>
            @endif
        </div>
    </div>
</div>
