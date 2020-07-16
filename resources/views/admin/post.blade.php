@extends('admin.layouts.admin')

@section('content')
    <div class="container">
        <h1>{{ $post ? __('Update post') : __('Create new post') }}</h1>
        <div class="row-cols-2">
            <div>
                <form
                    action="{{ $post ? route('admin.posts.update', $post) : route('admin.posts.store') }}"
                    method="POST"
                    enctype="multipart/form-data">
                    @if ($post) @method('PUT') @endif
                    @csrf
                    <div class="form-group">
                        <label for="title">{{ __('Title') }}</label>
                        <input type="text" name="title" value="{{ $post ? $post->title : '' }}" class="form-control"
                               id="title" maxlength="255" aria-describedby="title" placeholder="{{ __('Title') }}">
                        <small id="title" class="form-text text-muted">
                            {{ __('Title of your post. No more then 255 chars.')}}
                        </small>
                    </div>
                    <div class="form-group">
                        <label for="categories">{{ __('Categories') }}</label>
                        <select class="selectpicker form-control categories" data-style="bg-white" id="categories"
                                name="categories[]" data-live-search="true" multiple required>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}"
                                        {{ ($post && $post->categories->where('id', $category->id)->first()) ? 'selected' : '' }}
                                        data-tokens="{{ $category->name }}">{{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="text">{{ __('Post text') }}</label>
                        <textarea name="text" id="text" class="form-control" rows="6">{{ $post ? $post->text : '' }}
                        </textarea>
                    </div>
                    <div class="form-check form-group">
                        <input type="checkbox" name="active" value="1"
                               {{ $post && $post->active ? 'checked' : '' }} class="form-check-input" id="activate">
                        <label class="form-check-label" for="activate">{{ __('Activate?') }}</label>
                    </div>
                    <div class="form-group">
                        <label for="text">{{ __('Image') }}</label>
                        <input type="file" name="image">
                    </div>
                    <button type="submit" class="btn btn-primary">{{ $post ? __('Update') : __('Post') }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
