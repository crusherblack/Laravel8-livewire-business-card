@include('layouts.header')
<body>
    <div class="d-flex justify-content-center align-items-center vh-100 background-auth-container">
    <img src="{{asset('img/image-right.png')}}" alt="image-right" class="custom-image right-top-corner">
    <img src="{{asset('img/image-left.png')}}" alt="image-right" class="custom-image left-bottom-corner">     
        {{$slot}}
    </div>
    @include('layouts.scripts')
</body>
</html>