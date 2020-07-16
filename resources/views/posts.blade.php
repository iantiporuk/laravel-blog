@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ __('Posts') }}</h1>
        <div class="row">
            @foreach($posts as $post)
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        @if ($post->image)
                            <img src="{{Storage::url($post->image)}}" width="100%" height="225">
                        @else
                            <svg class="bd-placeholder-img card-img-top" width="100%" height="225"
                                 xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice"
                                 focusable="false"
                                 role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title>
                                <rect width="100%" height="100%" fill="#55595c"></rect>
                                <text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                            </svg>
                        @endif
                        <div class="card-body">
                            <div>
                                @if($post->categories->count() > 0)
                                    @foreach($post->categories as $category)
                                        <span class="badge badge-dark">{{$category->name}}</span>
                                    @endforeach
                                @else
                                    <span class="badge badge-dark">{{ __('untagged') }}</span>
                                @endif
                            </div>
                            <h3>{{$post->title}}</h3>
                            <p class="card-text">
                                {{substr($post->text, 0, 50)}}@if(strlen($post->text) > 50)...@endif
                            </p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="{{ route('post', $post->id) }}">
                                        <button class="btn btn-sm btn-outline-secondary">{{__('View')}}</button>
                                    </a>
                                </div>
                                <small class="text-muted">{{date('d M y h:m:s', strtotime($post->created_at))}}</small>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

