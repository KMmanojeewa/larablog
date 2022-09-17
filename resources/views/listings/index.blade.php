<x-layout>
    @include('partials._hero')
    @include('partials._search')

    {{--<h1>{{$heading}}</h1>--}}

    @if(count($listings) == 0)
        <p>There are no listings</p>
    @else
        <div
            class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4"
        >
            @foreach($listings as $listing)
                <x-listing-card :listing="$listing"></x-listing-card>
            @endforeach
        </div>
    @endif
    <div class="mt-6 p-4">
        {{$listings->links()}}
    </div>
</x-layout>

