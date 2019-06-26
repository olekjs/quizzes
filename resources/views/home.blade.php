@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-body">
                    <h4 class="card-title text-center">Popularne quizy</h4><hr>
                    <div class="row">
                        @foreach($games as $game)
                            <div class="col-6">
                                <div class="card card-body">
                                    <strogn>{{ $game->title }}</strogn>
                                    <a href="{{ route('gra.index', $game->unique_code) }}" class="btn btn-primary">GRAJ</a>
                                </div> 
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-body">
                    <h4 class="card-title text-center">Szukaj quizu</h4><hr>
                    {{ Form::open(['route' => 'home', 'method' => 'GET']) }}
                        <div class="row">
                            <div class="col-md-8">
                                {{ Form::text('search', null, ['class' => 'form-control']) }}
                            </div> 
                            <div class="col-md-4">
                                {{ Form::submit('Szukaj', ['class' => 'btn btn-outline-success btn-block']) }}
                            </div>
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>

   {{--  <div class="card shadow mb-3">
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
    </div> --}}
</div>
@endsection
