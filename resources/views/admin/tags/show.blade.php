@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Tag: {{ $tag->name }}</h2>
                <p>{{ $tag->slug }}</p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3>Post correlati:</h3>
                <ul>
                    @forelse ($tag->posts as $post)
                        <li><a href="{{ route('admin.posts.show', $post) }}">{{ $post->title }}</a></li>
                    @empty                        
                        <li>-</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
@endsection