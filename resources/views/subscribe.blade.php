@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1>{{__('Subscribe')}}</h1>
                <p>{{__('If you wish to get the notices about new post on this blog by email subscribe by filling the form
                below.')}}</p>

                <form>
                    <div class="form-group">
                        <label for="email">{{__('E-mail')}}:</label>
                        <input type="email" name="email" id="email" class="form-control" required/>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">{{__('Subscribe')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
