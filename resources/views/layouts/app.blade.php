@include('layouts.header')
<body>
    <nav class="d-flex justify-content-center align-items-center custom-navbar">
        <div>
            @auth
                
                @if(Auth::id())
                    @if(Auth::user()->role == 'ADMIN')
                        <a href="/admin" class="font-medium space font-clickable">List Card</a>
                    @endif
                    @if(Auth::user()->role != 'ADMIN')
                    <a href="/home" class="font-medium space font-clickable">My Card</a>
                    @endif
                @endif
                @if(Auth::user()->card->isEmpty() && Auth::user()->role != 'ADMIN')
                <a href="/form" class="font-medium space font-clickable">Make Card</a>
                @endif
                <livewire:auth.logout/> 
            @endauth
            @guest
                <a href="/login" class="font-medium space font-clickable">Login</a>
            @endguest
        </div>        
    </nav>

    <div class="d-flex background-app-container flex-column">
        <img src="{{asset('img/image-app-right.png')}}" alt="image-right" class="custom-image right-bottom-corner">
        <img src="{{asset('img/image-app-left.png')}}" alt="image-right" class="custom-image left-top-corner">  
        {{$slot}}
    </div>

     @include('layouts.scripts')
</body>
</html>