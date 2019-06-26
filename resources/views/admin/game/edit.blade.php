@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <create-game :categories="{{ $categories }}" :exist-stages="{{ $game->stages }}" :exist-settings="{{ $game }}" unique-code="{{ $game->unique_code }}"></create-game>
</div>
@endsection
