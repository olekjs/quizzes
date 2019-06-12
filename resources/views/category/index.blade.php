@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header text-center h2">Kategorie</div>
        <div class="card-body row">
            @foreach($categories as $category)
                <div class="col-md-3">
                    Tytuł: {{ $category->name }}
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
