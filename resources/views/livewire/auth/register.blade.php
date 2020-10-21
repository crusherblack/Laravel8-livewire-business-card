<div>   
        <h1 class="title">Sign Up</h1>
        <form wire:submit.prevent="submit">
            <div class="d-flex justify-content-center">
                @if(session()->has('error')) <span class="text-white">{{ session('error') }}</span> @endif
            </div>   
            <div class="form-group">
                    <input type="text" class="form-control custom-input" wire:model="form.name"
                        placeholder="Firstname" />
                    @error('form.name') <span class="text-white">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                    <input type="email" class="form-control custom-input" placeholder="Email"
                        wire:model="form.email" />
                    @error('form.email') <span class="text-white">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                    <input type="password" class="form-control custom-input" placeholder="Password"
                        wire:model="form.password" autocomplete="new-password"/>
                    @error('form.password') <span class="text-white">{{ $message }}</span> @enderror
            </div>
            <div class="form-group white-space">
                    <input type="password" class="form-control custom-input" placeholder="Confirm Password"
                        wire:model="form.password_confirmation" />
            </div>
            <div class="form-group">
                <button class="btn btn-white" type="submit">Register</button>
            </div>
            <div class="form-group d-flex justify-content-center">
                <a href="/login" class="font-medium" >Already have an account ? Click <b class="font-clickable">Here</b></a>
            </div>
        </form>
</div>