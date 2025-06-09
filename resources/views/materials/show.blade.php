@extends('layouts.layout')
@section('title', 'Материалы')
@section('content')
    <h1>"{{ $material->name }}"</h1>
    <span></span>
    <span></span>
    <div class="external border center">
        @foreach($products as $item)
            <div class="internal border">
                <div class="internal-in">
                    <p class="internal-in-h"> {{ $item['name'] }}</p>
                </div>
                <div class="internal-in">
                    <p class="internal-in-h"> {{ $item['quantity'] }} ед. материала</p>
                </div>
            </div>
        @endforeach
    </div>
    <a class="btn" href="{{ route('materials.index') }}">Назад</a>
@endsection
