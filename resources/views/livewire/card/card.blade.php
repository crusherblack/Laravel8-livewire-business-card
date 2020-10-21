<div>
<div class="d-flex justify-content-center mb-5">
   <div class="custom-card shadow">
       <h1 class="title-card primary">{{$card->name}}</h1>
       <span class="font-black">{{$card->position}}</span>
       <div style="position:relative">
           @if(Auth::id() == $card->user_id)
           <a href="/form/{{$card->id}}"><img src="{{asset('/img/edit.png')}}" alt="edit" class="img-fluid img-edit"></a>
           @endif           
           <img src="{{asset('/storage/images/'.$card->photo)}}" alt="avatar" class="img-fluid card-img">
       </div>
       <div class="detail-container">
           <span class="font-small black">{{$card->address}}</span>
           <span class="font-small black d-block">{{$card->phone}}</span>
           <div class="d-flex justify-content-between align-items-center">
                <span class="font-small primary mt-1">{{$card->email}}</span>
                @if(Auth::id() == $card->user_id)
                <img src="{{asset('/img/delete.png')}}" alt="edit" class="img-fluid img-delete" data-target="#exampleModal" data-toggle="modal">
                @endif           
           </div>
       </div>
   </div>
</div>
</div>

 @if(Auth::id() == $card->user_id)
<div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">         
           <div class="modal-body">
                <form wire:submit.prevent="submitDelete({{$card->id}})">
                    <div class="form-group">
                       <span class="font-medium primary">Are you sure you want to delete your business card?</span>
                    </div>
                    <div class="d-flex justify-content-end align-items-center">
                        <button class="btn btn-small-primary" >Yes</button>
                        <button class="btn-small-outline" data-dismiss="modal">No</button>
                    </div>
                </form>
            </div>        
        </div>
    </div>
</div>
@endif
