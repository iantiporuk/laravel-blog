@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $post->title }}</h1>
        <div>
            @if($post->categories->count() > 0)
                @foreach($post->categories as $category)
                    <span class="badge badge-dark">{{$category->name}}</span>
                @endforeach
            @else
                <span class="badge badge-dark">{{ __('untagged') }}</span>
            @endif
        </div>
        <p>{{ $post->text }}</p>
    </div>
@endsection

