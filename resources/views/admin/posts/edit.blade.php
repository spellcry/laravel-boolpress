@extends('layouts.app')

@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Modifica post</h2>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('admin.posts.update', $post) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Title" value="@php echo old('title', $post->title) @endphp">
                            @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>                                
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="category">Category</label>                            
                            <select name="category_id" id="category" class="form-control @error('category_id') is-invalid @enderror">
                                    <option value="">--Nessuna Categoria--</option>
                                @foreach ($categories as $category)
                                    <option @if( old('category_id', $post->category_id) == $category->id) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>                                
                            @enderror
                        </div>
                        <div class="form-group d-flex flex-column">
                            <label for="category">Tags</label> 
                            <div class="d-flex">
                                @foreach ($tags as $tag)
                                    <div class="form-check mr-2">
                                        <input type="checkbox" @if( in_array($tag->id, old('tags', $post->tags()->pluck('id')->toArray())) ) checked @endif class="form-check-input" name="tags[]" id="tags-{{ $tag->id }}" value="{{ $tag->id }}">
                                        <label class="form-check-label" for="tags-{{ $tag->id }}">{{ $tag->name }}</label>
                                    </div>                            
                                @endforeach
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="image">Aggiungi immagine cover</label>
                            <input type="file" class="form-control-file @error('image') is-invalid @enderror" name="image" id="image">                            
                            @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>                                
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input type="checkbox" @if(old('delete_img')) checked @endif class="form-check-input" name="delete_img" id="delete_img" value="1">
                                <label class="form-check-label" for="delete_img">Elimina immagine cover</label>
                            </div>
                            @error('delete_img')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>                                
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>                            
                            <textarea id="content" class="form-control @error('content') is-invalid @enderror" name="content" cols="30" rows="10" placeholder="Content">{{ old('content', $post->content) }}</textarea>
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