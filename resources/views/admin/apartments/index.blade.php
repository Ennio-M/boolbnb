@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row">
            @foreach ($apartments as $apartment)
                <div class="col col-md-4 py-1 align-items-center"> 
                    <a href="{{route('admin.apartments.show',$apartment->id)}}">
                        <div class="card text-center">
                            <img class="img-fluid" src="{{$apartment->images[0]->image}}" alt="">
                            <h1>{{$apartment->title}}</h1>
                            <div class="d-flex">
                                <span class="border rounded m-1">{{$apartment->rooms}} Rooms</span>
                                <span class="border rounded m-1">{{$apartment->beds}} Beds</span>
                                <span class="border rounded m-1">{{$apartment->square_meters}} mq.</span>
                                <span class="border rounded m-1">{{$apartment->price}} €/notte</span>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
             @foreach ($apartments as $apartment)
                <div class="col col-md-4 py-1 align-items-center"> 
                    <a href="{{route('admin.apartments.show',$apartment->id)}}">
                        <div class="card text-center">
                            <img class="img-fluid" src="{{$apartment->images[1]->image}}" alt="">
                            <h1>{{$apartment->title}}</h1>
                            <div class="d-flex">
                                <span class="border rounded m-1">{{$apartment->rooms}} Rooms</span>
                                <span class="border rounded m-1">{{$apartment->beds}} Beds</span>
                                <span class="border rounded m-1">{{$apartment->square_meters}} mq.</span>
                                <span class="border rounded m-1">{{$apartment->price}} €/notte</span>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
             @foreach ($apartments as $apartment)
                <div class="col col-md-4 py-1 align-items-center"> 
                    <a href="{{route('admin.apartments.show',$apartment->id)}}">
                        <div class="card text-center">
                            <img class="img-fluid" src="{{$apartment->images[2]->image}}" alt="">
                            <h1>{{$apartment->title}}</h1>
                            <div class="d-flex">
                                <span class="border rounded m-1">{{$apartment->rooms}} Rooms</span>
                                <span class="border rounded m-1">{{$apartment->beds}} Beds</span>
                                <span class="border rounded m-1">{{$apartment->square_meters}} mq.</span>
                                <span class="border rounded m-1">{{$apartment->price}} €/notte</span>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
             @foreach ($apartments as $apartment)
                <div class="col col-md-4 py-1 align-items-center"> 
                    <a href="{{route('admin.apartments.show',$apartment->id)}}">
                        <div class="card text-center">
                            <img class="img-fluid" src="{{$apartment->images[3]->image}}" alt="">
                            <h1>{{$apartment->title}}</h1>
                            <div class="d-flex">
                                <span class="border rounded m-1">{{$apartment->rooms}} Rooms</span>
                                <span class="border rounded m-1">{{$apartment->beds}} Beds</span>
                                <span class="border rounded m-1">{{$apartment->square_meters}} mq.</span>
                                <span class="border rounded m-1">{{$apartment->price}} €/notte</span>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
             @foreach ($apartments as $apartment)
                <div class="col col-md-4 py-1 align-items-center"> 
                    <a href="{{route('admin.apartments.show',$apartment->id)}}">
                        <div class="card text-center">
                            <img class="img-fluid" src="{{$apartment->images[4]->image}}" alt="">
                            <h1>{{$apartment->title}}</h1>
                            <div class="d-flex">
                                <span class="border rounded m-1">{{$apartment->rooms}} Rooms</span>
                                <span class="border rounded m-1">{{$apartment->beds}} Beds</span>
                                <span class="border rounded m-1">{{$apartment->square_meters}} mq.</span>
                                <span class="border rounded m-1">{{$apartment->price}} €/notte</span>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
            
        </div>
    </div>
@endsection