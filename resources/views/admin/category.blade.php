@extends('admin.layouts.admin')

@section('content')
    <div class="container">
        <h1>{{ $category ? __('Update category') : __('Create new category') }}</h1>
        <div class="row-cols-2">
            <div>
                <form
                    action="{{ $category ? route('admin-categories-update-submit', $category->id) : route('admin-categories-create-submit') }}"
                    method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="title">{{ __('Title') }}</label>
                        <input type="text" name="name" value="{{ $category ? $category->name : '' }}"
                               class="form-control"
                               id="name" maxlength="255" aria-describedby="title" placeholder="{{ __('Name') }}">
                        <small id="name" class="form-text text-muted">
                            {{ __('Name of your category. No more then 255 chars.')}}
                        </small>
                    </div>
                    <div class="form-check form-group">
                        <input type="checkbox" name="activate" value="1"
                               {{ $category && $category->active ? 'checked' : '' }} class="form-check-input"
                               id="activate">
                        <label class="form-check-label" for="activate">{{ __('Activate?') }}</label>
                    </div>
                    <button type="submit" class="btn btn-primary">{{ $category ? __('Update') : __('Post') }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
