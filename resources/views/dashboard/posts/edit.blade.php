@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
        <h1 class="h2">Edit post</h1>
    </div>
    <div class="col-md-8 mb-5">
        <form action="/dashboard/posts/{{ $post->slug }}" method="post" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required
                    autofocus value="{{ old('title', $post->title) }}">
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" required
                    value="{{ old('slug', $post->slug) }}">
                @error('slug')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select class="form-select form-select-md" name="category_id">
                    @foreach ($categories as $category)
                        {{-- @if (old('category_id') === (string) $category->id) --}}
                        @if (old('category_id', $post->category->id) == $category->id)
                            <option value="{{ $category->id }}" selected>
                                {{ $category->name }}
                            </option>
                        @else
                            <option value="{{ $category->id }}">
                                {{ $category->name }}
                            </option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    @if ($post->image)
                        <img src="{{ asset('storage/'. $post->image) }}" class="img-preview img-fluid mt-3 col-sm-5 d-block">
                    @else
                        <img class="img-preview img-fluid mt-3 col-sm-5 d-block">
                    @endif
                    {{-- <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="preview_img(event)"> --}}
                    <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image"
                        onchange="previewImage()">
                    @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="col-sm-5">
                        {{-- <img class="img-fluid mt-3" id="img-preview" src="" alt="" style="max-width: 800px; max-height: 400px;"> --}}
                        <img class="img-preview img-fluid mt-3">
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="body" class="form-label">Body</label>
                @error('body')
                    <p class="text-danger">{{ $message }}</p>
                    {{-- <div class="invalid-feedback">
                    {{ $message }}
                </div> --}}
                @enderror
                <input id="body" type="hidden" name="body" value="{{ old('body', $post->body) }}">
                <trix-editor input="body"></trix-editor>
            </div>
            <button type="submit" class="btn btn-primary">Update Post</button>
        </form>
    </div>
    <script>
        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');

        title.addEventListener('change', function() {
            fetch('/dashboard/posts/checkSlug?title=' + title.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });
    </script>
    <script>
        function previewImage() {
            // mengambil sumber image dari input dengan id image
            const image = document.querySelector('#image');

            // mengambil tag img dari class img-preview
            const imgPreview = document.querySelector('.img-preview');

            // mengubah style tampilan image menjadi block
            imgPreview.style.display = 'block';

            // perintah untuk mengambil data gambar
            const oFReader = new FileReader();
            // mengambil dari const image
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(OFREvent) {
                imgPreview.src = OFREvent.target.result;
            }
        }
    </script>
@endsection
