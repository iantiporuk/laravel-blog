@extends('admin.layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8"><h1>{{ __('Categories') }}</h1></div>
            <div class="col-4 text-right">
                <a class="btn btn-success" href="{{ route('admin-categories-create') }}">
                    {{ __('Add new category') }}
                </a>
            </div>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">{{ __('Name') }}</th>
                <th scope="col">{{ __('Create date') }}</th>
                <th scope="col">{{ __('Last Update date') }}</th>
                <th scope="col">{{ __('Action') }}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <th scope="row">{{ $category->id }}</th>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->created_at->format('H:i d/m/i') }}</td>
                    <td>{{ $category->updated_at->format('H:i d/m/i') }}</td>
                    <td>
                        <div class="btn-group btn-group-sm" role="group" aria-label="Action buttons">
                            <a class="btn btn-success" href="{{ route('admin-categories-update', $category->id) }}">
                                {{ __('edit') }}
                            </a>
                            @if($category->active)
                                <a class="btn btn-dark" href="{{ route('admin-categories-deactivate', $category->id) }}">
                                    {{ __('deactivate') }}
                                </a>
                            @else
                                <a class="btn btn-warning" href="{{ route('admin-categories-activate', $category->id) }}">
                                    {{ __('activate') }}
                                </a>
                            @endif
                            <a class="btn btn-danger" href="{{ route('admin-categories-delete', $category->id) }}">
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
