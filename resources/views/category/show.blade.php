@extends('layouts.app')

@section('content')
<div class="container">
    @foreach($games as $game)
        <p>{{ $game->title }}</p>
    @endforeach
</div>
@endsection
