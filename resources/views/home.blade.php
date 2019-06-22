@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow mb-3">
        <div class="card-body">
            <p class="h3">Gry</p>
            <div class="row">
                @foreach ($games as $game)
                    <div class="col-md-3">
                        <a href="{{ route('gra.index', $game->unique_code) }}" class="btn btn-primary">{{ $game->title }}</a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="card shadow mb-3">
        <div class="card-body">
            <p class="h3">Kategorie</p>
            <div class="row">
                @foreach ($categories as $category)
                    <div class="col-md-3">
                        <a href="{{ route('kategoria.show', $category->name) }}" class="btn btn-primary">{{ $category->name }}</a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
