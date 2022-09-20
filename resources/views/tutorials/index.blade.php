<x-layout>
    @include('partials._hero')
    @include('partials._search')

    @if(count($users) == 0)
        <p>There are no users</p>
    @else
        <div
            class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4"
        >
            <h2>{{$title}}</h2>

            @foreach($users as $user)
                <p>{{$user->name}}</p>
            @endforeach
        </div>
    @endif

</x-layout>

