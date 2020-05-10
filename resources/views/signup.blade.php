@extends('layouts.plain')

@section('styles')
    <link rel="stylesheet" href="css/signin.css">
@endsection

@section('title')Sign Up @endsection

@section('content')
    <div class="text-center page-signin">
        <form class="form-signin" action="{{route('sign-up-post')}}" method="post">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @csrf
            <h1 class="h3 mb-3 font-weight-normal">Please sign up</h1>

            <label for="firstName" class="sr-only">First Name</label>
            <input type="text" name="firstname" id="firstName" class="form-control" placeholder="First Name"
                   required="" autofocus=""/>

            <label for="lastName" class="sr-only">Last Name</label>
            <input type="text" name="lastname" id="lastName" class="form-control" placeholder="Last Name"
                   required="" autofocus=""/>

            <label for="birthday" class="sr-only">Birthday</label>
            <input type='text' name="birthday" id="birthday" class="form-control" placeholder="Birthday"
                   required=""/>

            <label for="inputEmail" class="sr-only">Email address</label>
            <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address"
                   required="">

            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password"
                   required="">

            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign up</button>
            <p class="mt-5 mb-3 text-muted">© 2020</p>
        </form>
    </div>
    <script type="text/javascript">
        $(function () {
            $('#birthday').datepicker();
        });
    </script>
@endsection
