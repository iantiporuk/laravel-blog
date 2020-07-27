@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1>{{__('Unsubscribe')}}</h1>
                <p>{{__('If you wish to unsubscribe notification fill form below.')}}</p>

                @include('inc.messages')

                <form action="{{route('unsubscribe')}}" method="POST">

                    @csrf
                    @method('delete')

                    <div class="form-group">
                        <label for="email">{{__('E-mail')}}:</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{$email}}" required/>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">{{__('Unsubscribe')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
