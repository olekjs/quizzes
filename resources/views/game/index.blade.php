@extends('layouts.app')

@section('content')
<div class="container">
    <game :game="{{ $game }}"></game>
</div>
@endsection
