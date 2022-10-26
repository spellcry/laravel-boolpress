@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Elenco tags disponibili</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <ul>
                    @foreach ($tags as $tag)
                        <li><a href="{{ route('admin.tags.show', $tag) }}">{{ $tag->name }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection