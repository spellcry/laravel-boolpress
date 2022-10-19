@extends('layouts.app')

@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Crea nuovo post</h2>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('admin.posts.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Title" value="@php echo old('title') @endphp">
                            @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>                                
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>                            
                            <textarea id="content" class="form-control" cols="30" rows="10" placeholder="Content"></textarea>
                        </div>
                        <a href="{{ route('admin.posts.store') }}" class="btn btn-primary btn-sm">Salva</a>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection