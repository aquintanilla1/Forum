@if(count($errors) > 0)
    @foreach($errors->all() as $error)
        {{ $error }}
        <br>
    @endforeach
@endif

@if(session('success'))
    {{session('success')}}
@endif

@if(session('error'))
    {{session('error')}}
@endif