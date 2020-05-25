@extends('admin.layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-10"><h1>{{ __('Posts') }}</h1></div>
            <div class="col-2">
                <a class="btn btn-success" href="{{ route('admin-posts-create') }}">
                    {{ __('Add new post') }}
                </a>
            </div>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">{{ __('Title') }}</th>
                <th scope="col">{{ __('Create date') }}</th>
                <th scope="col">{{ __('Last Update date') }}</th>
                <th scope="col">{{ __('Action') }}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr>
                    <th scope="row">{{ $post->id }}</th>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->created_at->format('H:i d/m/i') }}</td>
                    <td>{{ $post->updated_at->format('H:i d/m/i') }}</td>
                    <td>
                        <div class="btn-group btn-group-sm" role="group" aria-label="Action buttons">
                            <a class="btn btn-success" href="{{ route('admin-posts-update', $post->id) }}">
                                {{ __('update') }}
                            </a>
                            @if($post->active)
                                <a class="btn btn-dark" href="{{ route('admin-posts-deactivate', $post->id) }}">
                                    {{ __('deactivate') }}
                                </a>
                            @else
                                <a class="btn btn-warning" href="{{ route('admin-posts-activate', $post->id) }}">
                                    {{ __('activate') }}
                                </a>
                            @endif
                            <a class="btn btn-danger" href="{{ route('admin-posts-delete', $post->id) }}">
                                {{ __('delete') }}
                            </a>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
