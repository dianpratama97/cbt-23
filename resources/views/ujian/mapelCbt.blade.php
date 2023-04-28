<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pilih Mapel UJIAN') }}
        </h2>
    </x-slot>


    <div class="container">
        <div class="card mt-2">
            <div class="card-body">
                @foreach ($ujian as $item)
                    <a href="detail/{{ $item->id }}" class="btn btn-sm btn-primary">{{ $item->name }}</a>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
