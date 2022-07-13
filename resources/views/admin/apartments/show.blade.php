

@extends('layouts.admin') 


@section('content')
<div class="container">
   <div class="row">
      <div class="col">
         <div class="card" class="w-100">
            <div class="container">
               <div class="row">
                  @foreach ($apartment->images as $images)
                  <div class="col-4 py-1">
                     <img src="{{$images->image}}" class="img-thumbnail" alt="{{ $apartment->title }}">
                  </div>
                  @endforeach
               </div>
            </div>
            <div class="card-body">
               <h5 class="card-title font-weight-bold">{{$apartment->title}}</h5>
               <p class="card-text">{{$apartment->description}}</p>
               <p class="card-text">Stanze: {{$apartment->rooms}}</p>
               <p class="card-text">Letti: {{$apartment->beds}}</p>
               <p class="card-text">Bagni: {{$apartment->bathrooms}}</p>
               <p class="card-text">Mq: {{$apartment->square_meters}}</p>
               <p class="card-text">Prezzo: €{{$apartment->price}}/notte</p>
               <span class="card-text">Indirizzo: {{$apartment->address}}</span>
               <span class="card-text">, {{$country}}</span>
               <div class="py-3">
                  <a href="{{route('admin.apartments.edit',$apartment->id)}}" class="btn btn-primary">Modifica appartamento</a>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

@endsection
