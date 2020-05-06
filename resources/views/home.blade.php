@extends('layouts.main')

@section('title')Index @endsection

@section('content')
    <h1>Home Page of my site</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque suscipit nisl eros, rutrum semper arcu dignissim a. Curabitur eu mi sed quam condimentum imperdiet. Pellentesque urna tortor, pellentesque sed tortor eu, rhoncus lacinia eros. Nam quis tellus lorem. Donec ex metus, gravida vitae posuere vitae, convallis at nibh. Vestibulum vestibulum, tortor vitae elementum tempus, mauris dui feugiat tellus, quis volutpat velit nisi id tortor. Vivamus neque elit, scelerisque in consectetur eu, efficitur vitae est. Maecenas eget eros id tortor scelerisque ornare. Phasellus ac pulvinar sem. Nulla ligula metus, gravida eu fringilla nec, commodo vel lorem. Etiam id placerat enim. Sed nec nunc sed nulla gravida porttitor at eu ante. Pellentesque condimentum lacus eu condimentum tincidunt.</p>
    <p>Suspendisse semper, sapien et pulvinar posuere, nisi sapien convallis odio, a tristique augue est eget magna. Morbi quis ante at nulla fringilla mollis. Curabitur a nibh rhoncus, tempus eros in, tincidunt nibh. Sed ut est pulvinar, aliquet purus sit amet, hendrerit velit. Pellentesque in sem ut sem luctus faucibus. Aliquam posuere pellentesque aliquam. Nullam eu est et augue vehicula dignissim. Duis aliquam finibus dolor, a lacinia dolor varius id. Etiam imperdiet metus eget ex interdum commodo. Sed quis lacinia erat. Proin in pellentesque justo. In fringilla odio id gravida tincidunt. In hac habitasse platea dictumst. Vivamus pellentesque mollis pulvinar. Pellentesque quis lacinia orci.</p>
@endsection

@section('aside')
    @parent
    <p>Test show function</p>
@endsection
