@extends('admin.layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8"><h1>{{ __('Categories') }}</h1></div>
            <div class="col-4 text-right">
                <a class="btn btn-success" href="{{ route('admin.categories.create') }}">
                    {{ __('Add new category') }}
                </a>
            </div>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">{{ __('Name') }}</th>
                <th scope="col">{{ __('Is Active') }}</th>
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
                    <td>@if ($category->active)
                            <i class="fa fa-check" aria-hidden="true"></i>
                        @else
                            <i class="fa fa-ban" aria-hidden="true"></i>
                        @endif
                    </td>
                    <td>{{ $category->created_at->format('H:i d/m/i') }}</td>
                    <td>{{ $category->updated_at->format('H:i d/m/i') }}</td>
                    <td>
                        <div class="btn-group btn-group-sm" role="group" aria-label="Action buttons">
                            <form>{{--just for style--}}
                                <a class="btn btn-success" href="{{ route('admin.categories.edit', $category) }}">
                                    {{ __('edit') }}
                                </a>
                            </form>
{{--                            <form action="{{ route('admin.categories.update', $category) }}" method="POST">--}}
{{--                                @method('put')--}}
{{--                                @csrf--}}
{{--                                @if($category->active)--}}
{{--                                    <button class="btn btn-dark">{{ __('deactivate') }}</button>--}}
{{--                                @else--}}
{{--                                    <input type="hidden" name="active" value="1">--}}
{{--                                    <button class="btn btn-warning">{{ __('activate') }}</button>--}}
{{--                                @endif--}}
{{--                            </form>--}}
                            <form action="{{ route('admin.categories.destroy', $category) }}" method="POST">
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
