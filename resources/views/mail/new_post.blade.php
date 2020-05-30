<h1>{{ __('New post') }}: {{ $post->title }}</h1>
<p>{{ __('You can read this post after clicking link bellow.') }}</p>
<a href="{{ route('post', $post->id) }}">{{ $post->title }}</a>
<br>
<small>
    @lang('click to <a href=":url">unsubscribe</a> from these emails', ['url' => route('unsubscribe', $subscription->email)])
</small>


