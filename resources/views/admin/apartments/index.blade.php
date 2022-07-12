@extends('layouts.admin')
@section('content')
    <section>
        @foreach ($apartments as $apartment)
            <a href="{{route('admin.apartments.show', $apartment->id)}}">Appartamento</a>
        @endforeach
    </section>
@endsection