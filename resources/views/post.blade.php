@extends('layouts.main')

@section('container')
    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @php
                    // dd($post)
                @endphp
                <h1 class="mb-3">{{ $post->title }}</h1>
                <p>By, <a href="/posts?author={{ $post->author->username }}">{{ $post->author->name }}</a> in <a
                        href="/posts?category={{ $post->category->slug }}">{{ $post->category->name }}</a></p>
                <p>Uploaded on {{ $post->created_at->diffForHumans() }}</p>
                @if ($post->image)
                <div style="max-height: 350px; overflow: hidden;">
                    <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top"
                        alt="{{ $post->category->name }}" class="img-fluid">
                </div>
                @else
                    <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" class="card-img-top"
                        alt="{{ $post->category->name }}" class="img-fluid">
                @endif

                <article class="my-3 fs-5">
                    {!! $post->body !!}
                </article>
                <a href="/blog">Back to Post</a>
            </div>
        </div>
    </div>
@endsection
