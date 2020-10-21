<div>
<div class="card-container d-flex justify-content-center">
    <div>
        <h1 class="title primary mt-5 text-left">Make Card</h1>
        <form wire:submit.prevent="submit">
            <div class="d-flex justify-content-center">
                @if(session()->has('error')) <span class="text-primary">{{ session('error') }}</span> @endif
            </div>   
            <div class="form-group white-space">
                    <input type="text" class="form-control custom-search" wire:model="form.name"
                        placeholder="FullName" />
                    @error('form.name') <span class="text-primary">{{ $message }}</span> @enderror
            </div>
            <div class="form-group white-space">
                    <input type="text" class="form-control custom-search" placeholder="Position"
                        wire:model="form.position" />
                    @error('form.position') <span class="text-primary">{{ $message }}</span> @enderror
            </div>
            <div class="form-group white-space">
                    <textarea class="form-control custom-search" placeholder="Address"
                        wire:model="form.address" ></textarea>
                    @error('form.address') <span class="text-primary">{{ $message }}</span> @enderror
            </div>
             <div class="form-group white-space">
                    <input type="number" class="form-control custom-search" placeholder="Phone"
                        wire:model="form.phone" autocomplete="new-password" />
                    @error('form.phone') <span class="text-primary">{{ $message }}</span> @enderror
            </div>
            <div class="form-group white-space">
                    <input type="email" class="form-control custom-search" placeholder="Email"
                        wire:model="form.email" />
                    @error('form.email') <span class="text-primary">{{ $message }}</span> @enderror
            </div>
             <div class="form-group white-space">
                    <label for="upload-photo" class="btn btn-primary font-medium" >{{ $photo ? 'Change Photo' : 'Attache Photo'}} <i class="fas fa-paperclip" wire:loading.remove wire:target="photo"></i><img src="{{asset('img/loading.gif')}}" wire:loading wire:target="photo" class="img-fluid"/></label>
                    <input type="file" wire:model="photo" id="upload-photo" style=" opacity: 0;
                    position: absolute;
                    z-index: -1;"/>
                    @if ($photo)
                        <div class="img-preview">
                            <label class="text-primary">Photo Preview:</label>
                            <img src="{{ $photo->temporaryUrl() }}" class="img-fluid custom-img">
                        </div>                                 
                    @else
                        <div class="img-preview">             
                        <label class="text-primary">Photo Preview:</label>
                            <img src="{{asset('/storage/images/'.$photoUrl)}}" class="img-fluid custom-img">
                        </div>
                    @endif
             </div>
            <div class="form-group d-flex justify-content-center">
                <button class="btn btn-primary font-medium" type="submit">Save</button>
            </div>
        </form>
    </div>   
</div>
</div>