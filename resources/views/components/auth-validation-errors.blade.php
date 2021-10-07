@props(['errors'])

@if ($errors->any())
    <div {!! $attributes->merge(['class' => 'alert alert-danger']) !!} role="alert">
        @foreach ($errors->all() as $error)
        {!! $error !!}
        @endforeach
    </div>
@endif
