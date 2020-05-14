@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(session()->has('error'))
    <p class="alert alert-danger">{{ session()->get('error') }}</p>
@endif

@if(session()->has('warning'))
    <p class="alert alert-warning">{{ session()->get('warning') }}</p>
@endif

@if(session()->has('success'))
    <p class="alert alert-success">{{ session()->get('success') }}</p>
@endif
