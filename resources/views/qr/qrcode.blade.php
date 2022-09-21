<x-layout>
    <div class="mx-4">
        <div class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24" >

            <h2>Simple QR Code</h2>

            <div class="card-body">
                {!! QrCode::size(200)->generate('This is By kosa 123') !!}
            </div>

        </div>

        <div class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24" >

            <h2>Color QR Code</h2>

            <div class="card-body">
                {!! QrCode::size(200)->backgroundColor(255,90,0)->generate('Tao Tao') !!}
            </div>

        </div>
    </div>
</x-layout>
