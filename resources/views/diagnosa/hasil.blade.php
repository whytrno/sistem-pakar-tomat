@extends('components.root')

@section('title', 'Diagnosa')

@section('content')
    <div class="m-24 space-y-14">
        <h1 class="text-2xl font-semibold text-primary">Hasil Diagnosa</h1>

        @livewire('hasil')
    </div>
@endsection
