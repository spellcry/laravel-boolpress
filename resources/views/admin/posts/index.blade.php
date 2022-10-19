@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8">
                <h2>Posts</h2>
            </div>
            <div class="col-4 d-flex justify-content-end align-items-center">
                <a href="{{ route('admin.posts.create') }}" class="btn btn-success btn-sm">Crea nuovo post</a>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <table class="table">
                    <thead class="thead-light">
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Created at</th>
                        <th scope="col" colspan="2">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                        <tr>
                          <th scope="row">{{ $post->id }}</th>
                          <td>{{ $post->title }}</td>
                          <td>{{ $post->slug }}</td>
                          <td>{{ $post->created_at }}</td>
                          <td><a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-primary btn-sm">Modifica</a></td>
                          <td><a href="{{ route('admin.posts.destroy', $post) }}" class="btn btn-danger btn-sm">Elimina</a></td>
                        </tr>                                                  
                        @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
@endsection