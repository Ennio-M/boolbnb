@extends('layouts.admin')

@section('content')
<a class="btn btn-link m-2 text-decoration-none" href="{{route('admin.home')}}"><i class="fa-solid fa-rotate-left"></i> Torna alla Home</a>
<h2 class="text-center">Promuovi il tuo appartamento!</h2>
<div class="p-3">
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Titolo</th>
      <th scope="col">€{{$sponsors[0]->price}}/{{$sponsors[0]->duration}}h</th>
      <th scope="col">€{{$sponsors[1]->price}}/{{$sponsors[1]->duration}}h</th>
      <th scope="col">€{{$sponsors[2]->price}}/{{$sponsors[2]->duration}}h</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($apartments as $apartment)
    <tr>
      <th scope="row">{{$apartment->id}}</th>
      <td><a href="{{route('admin.apartments.show',$apartment->id)}}" class="apartment_card text-decoration-none text-muted text-black">{{$apartment->title}}</a></td>
      <td><button class="btn silver-btn">{{$sponsors[0]->name}}</button></td>
      <td><button class="btn gold-btn">{{$sponsors[1]->name}}</button></td>
      <td><button class="btn platinum-btn">{{$sponsors[2]->name}}</button></td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>

@endsection
