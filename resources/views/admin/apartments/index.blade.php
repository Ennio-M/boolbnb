@extends('layouts.admin')
@section('content')
<div class="container">
    <a class="btn btn-link my-2" href="{{route('admin.home')}}"><i class="fa-solid fa-rotate-left"></i> Torna alla Home</a>
    <div class="row">
        @foreach ($apartments as $apartment)
            <div class="col col-md-4 py-1 align-items-center"> 
                <div class="card text-center">
                    <img class="img-fluid" src="{{asset('storage/' . $apartment->images->first()->image)}}" alt="">
                    <h1>{{$apartment->title}}</h1>
                    <div class="d-flex justify-content-center">
                        <span class="m-1"><i class="fa-solid fa-location-dot"></i> {{$apartment->address}}</span>
                        <span class="m-1"><i class="fa-solid fa-euro-sign"></i> {{$apartment->price}}/notte</span>
                    </div>
                </div>
                <div class="text-center">
                    <a href="{{route('admin.apartments.show',$apartment->id)}}" class="btn my-2">Mostra</a>
                    <a href="{{route('admin.apartments.edit',$apartment->id)}}" class="btn my-2">Modifica</a>
                    <form action="{{route('admin.apartments.destroy',$apartment->id)}}" method="POST">
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