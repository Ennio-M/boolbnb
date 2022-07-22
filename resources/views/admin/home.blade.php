@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-body text-center">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <a class="btn btn-link my-1 text-decoration-none"href="{{route('admin.apartments.create')}}">Crea appartamento</a>
                <a class="btn btn-link text-decoration-none"href="{{route('admin.apartments.index')}}">Visualizza i tuoi appartamenti</a>
                <a class="btn btn-link text-decoration-none"href="{{route('admin.sponsorships.index')}}">Sponsorizza un appartamento</a>
            </div>
        </div>
    </div>
</div>


@endsection
