@if(session()->has('message'))
    <div class="fixed top-0 left-1/2 transform bg-laravel text-white px-48 py-3 -translate-x-1/2">
        <p>{{session('message')}}</p>
    </div>
@endif
