@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <create-game :categories="{{ $categories }}"></create-game>
</div>
@endsection
