@extends('admin.layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8"><h1>{{ __('Posts') }}</h1></div>
            <div class="col-4 text-right">
                <a class="btn btn-success" href="{{ route('admin.posts.create') }}">
                    {{ __('Add new post') }}
                </a>
            </div>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">{{ __('Title') }}</th>
                <th scope="col">{{ __('Is Active') }}</th>
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
                    <td>@if ($post->active)
                            <i class="fa fa-check" aria-hidden="true"></i>
                        @else
                            <i class="fa fa-ban" aria-hidden="true"></i>
                        @endif
                    </td>
                    <td>{{ $post->created_at->format('H:i d/m/i') }}</td>
                    <td>{{ $post->updated_at->format('H:i d/m/i') }}</td>
                    <td>
                        <div class="btn-group btn-group-sm" role="group" aria-label="Action buttons">
                            <form>{{--just for style--}}
                                <a class="btn btn-success" href="{{ route('admin.posts.edit', $post) }}">
                                    {{ __('edit') }}
                                </a>
                            </form>
{{--                            <form action="{{ route('admin.posts.update', $post) }}" method="POST">--}}
{{--                                @method('put')--}}
{{--                                @csrf--}}
{{--                                @if($post->active)--}}
{{--                                    <button class="btn btn-dark">{{ __('deactivate') }}</button>--}}
{{--                                @else--}}
{{--                                    <input type="hidden" name="active" value="1">--}}
{{--                                    <button class="btn btn-warning">{{ __('activate') }}</button>--}}
{{--                                @endif--}}
{{--                            </form>--}}
                            <form action="{{ route('admin.posts.destroy', $post) }}" method="POST">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger">{{ __('delete') }}</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
