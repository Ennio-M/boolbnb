@extends('layouts.admin')
@section('content')
<div class="container">
    <a class="btn btn-link my-2" href="{{route('admin.home')}}"><i class="fa-solid fa-rotate-left"></i> Torna alla Home</a>
    <div class="row">
        @foreach ($apartments as $apartment)
            <div class="col col-md-4 py-1 align-items-center">
                <a href="{{route('admin.apartments.show',$apartment->id)}}" class="apartment_card">
                    <div class="card text-center">
                        <img class="img-fluid" src="{{asset('storage/' . $apartment->images->first()->image)}}" alt="">
                        <h2>{{$apartment->title}}</h2>
                        <div class="d-flex justify-content-center">
                            <span class="m-1"><i class="fa-solid fa-location-dot"></i> {{$apartment->address}}</span>
                            <span class="m-1"><i class="fa-solid fa-euro-sign"></i> {{$apartment->price}}/notte</span>
                        </div>
                    </div>
                </a>
                <div class="text-center">
                    <a href="{{route('admin.apartments.edit',$apartment->id)}}" class="btn my-2">Modifica</a>
                    <form action="{{route('admin.apartments.destroy',$apartment->id)}}" method="POST" class="d-inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn">Cancella</button>
                    </form>
                </div>
                
            </div>
        @endforeach 
    </div>
</div>
@endsection