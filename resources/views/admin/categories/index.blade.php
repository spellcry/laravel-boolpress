@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Elenco categorie disponibili</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <ul>
                    @foreach ($categories as $category)
                        <li><a href="{{ route('admin.categories.show', $category) }}">{{ $category->name }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection