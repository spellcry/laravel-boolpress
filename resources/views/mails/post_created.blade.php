@component('mail::message')
# Nuovo post

Congratulazioni! Un nuovo post è stato aggiunto al tuo blog!

@component('mail::button', ['url' => route('admin.posts.show', $post)])
    {{ $post->title }}
@endcomponent

Grazie,<br>
{{ config('app.name') }}
@endcomponent