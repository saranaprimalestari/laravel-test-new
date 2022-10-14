@extends('dashboard.layouts.main')

@section('container')
<div class="container my-3">
    <div class="row justify-content-center">
        <div class="col-md-8">
                <nav aria-label="breadcrumb" style="--bs-breadcrumb-divider: '>';">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">{{ ucwords(request()->segment(1)) }}</a></li>
                        <li class="breadcrumb-item"><a href="/dashboard/posts">{{ ucwords(request()->segment(2)) }}</a></li>
                        {{-- <li class="breadcrumb-item active" aria-current="page">{{ ucwords(request()->segment(3)) }}</li> --}}
                    </ol>
                </nav>
                <h1 class="mb-3">{{ $post->title }}</h1>
                <p>Category <a href="/posts?category={{ $post->category->slug }}">{{ $post->category->name }}</a> Uploaded on {{ $post->created_at->diffForHumans() }}</p>
                <div class="mb-3">
                    <a class="btn btn-success" href="/dashboard/posts">
                        <span data-feather="arrow-left"></span> Back to all my posts
                    </a>
                    <a class="btn btn-warning" href="/dashboard/posts/{{ $post->slug }}/edit">
                        <span data-feather="edit"></span> Edit
                    </a>
                    <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger" onclick="return confirm('Are you sure to delete this post?')"><span
                                data-feather="x-circle"></span> Delete</button>
                    </form>
                </div>

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
            </div>
        </div>
    </div>
@endsection
