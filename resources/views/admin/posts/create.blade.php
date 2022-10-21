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
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Title" value="@php echo old('title') @endphp">
                            @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>                                
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="category">Category</label>                            
                            <select name="category_id" id="category" class="form-control @error('category_id') is-invalid @enderror">
                                @foreach ($categories as $category)
                                    <option @if( old('category_id') == $category->id) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>                                
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>                            
                            <textarea id="content" class="form-control @error('content') is-invalid @enderror" name="content" cols="30" rows="10" placeholder="Content">{{ old('content') }}</textarea>
                            @error('content')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>                                
                            @enderror
                        </div>
                        <input type="submit" class="btn btn-primary btn-sm" value="Salva">
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection