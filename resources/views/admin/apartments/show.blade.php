

@extends('layouts.admin') 


@section('content')
<div class="container">
   <div class="row">
      <div class="col">
         <div class="card" class="w-100">
            @foreach ($apartment->images as $images)
                <img src="{{$images->image}}" class="card-img-top" alt="{{ $apartment->title }}">
            @endforeach
            <div class="card-body">
            <h5 class="card-title font-weight-bold">{{$apartment->title}}</h5>
            <p class="card-text">{{$apartment->description}}</p>
            <p class="card-text">Rooms in apartment: {{$apartment->rooms}}</p>
            <p class="card-text">Number of bed: {{$apartment->beds}}</p>
            <p class="card-text">Number of bathrooms: {{$apartment->bathrooms}}</p>
            <p class="card-text">SM: {{$apartment->square_meters}}</p>
            <p class="card-text">Price for Night: {{$apartment->price}}€</p>
            <span class="card-text">Adress:{{$apartment->address}}</span>
            <span class="card-text">-{{$apartment->nation}}</span>
            </div>
         </div>
      </div>
   </div>
</div>

@endsection
