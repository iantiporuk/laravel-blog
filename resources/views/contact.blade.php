@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{__('Contact Us')}}</h1>
    <div class="row">
        <div class="col-md-8">
            <div class="well well-sm">
                @include('inc.messages')
                <form class="form-horizontal" action="{{route('contact-submit')}}" method="post">
                    <fieldset>
                        @csrf
                        <div class="form-group">
                            <label class="control-label" for="name">{{__('Your Name')}}</label>
                            <input id="name" name="name" type="text" placeholder="{{__('Your name')}}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="email">{{__('Your E-mail')}}</label>
                            <input id="email" name="email" type="email" placeholder="{{__('Your email')}}"
                                   class="form-control">
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="subject">{{__('Subject')}}</label>
                            <input id="subject" name="subject" type="text" placeholder="{{__('Subject')}}"
                                   class="form-control">
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="message">{{__('Your message')}}</label>
                            <textarea class="form-control" id="message" name="message"
                                      placeholder="{{__('Please enter your message here...')}}" rows="5"></textarea>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg">{{__('Submit')}}</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
        <div class="col-md-4 text-center">
            <ul class="list-unstyled mb-0 d-inline-flex d-md-block">
                <li>
                    <i class="fas fa-map-marker-alt mt-4 fa-2x"></i>
                    <p>Minsk 220000, USA</p>
                </li>
                <li class="ml-5 mr-5 m-md-0">
                    <i class="fas fa-phone mt-4 fa-2x"></i>
                    <p>+ 01 234 567 89</p>
                </li>
                <li>
                    <i class="fas fa-envelope mt-4 fa-2x"></i>
                    <p>contact@laravelblog.com</p>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection
