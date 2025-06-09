@extends('layouts.layout')
@section('title', 'Материалы')
@section('content')
    <div class="nav">
        <a class="btn" href="{{route('materials.create')}}">Создать что-то</a>
        <a class="btn" href="{{ route('home') }}">← Назад</a>
    </div>
    <div class="external border center">
        @foreach ($materials as $material)
            <div class="internal border">
                <div class="internal-in">
                    <a href="{{ route('materials.edit', $material->id) }}">
                        <h2 class="internal-in-h"> {{ $material->materialType->name}} | {{$material->name}}</h2>
                    </a>
                    <div>Минимальное количество: {{$material->minimum}}</div>
                    <div>Количество на складе: {{$material->warehouse}}</div>
                    <div>Цена: {{$material->price}}/{{$material->unit->name}} | {{$material->packaging}}</div>
                </div>
                <div>
                    <h2>{{ number_format($material->quantity, 2, '.', ' ') }}</h2>
                </div>
            </div>
            <a href="{{ route('materials.show', $material->id) }}">Ссылка на что-то *клик*</a>
        @endforeach
    </div>
    <a class="btn" href="{{route('home')}}">Назад</a>
@endsection
