@extends('layouts.admin')

@section('content')
<div class="container">
  <div class="row">
    <div class="col">
      <form action="{{route('admin.apartments.update',$apartment->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label for="Title">Title</label>
          <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" aria-describedby="title" name="title" value="{{$apartment->title}}">
          @error('title')
              <div class="alert alert-danger">{{$message}}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="description">Description</label>
          <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" cols="30" rows="15">{{$apartment->description}}</textarea>
          @error('description')
              <div class="alert alert-danger">{{$message}}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="rooms">Rooms</label>
          <input type="number" class="form-control @error('rooms') is-invalid @enderror" id="rooms" aria-describedby="rooms" placeholder="How many rooms?" name="rooms" value={{$apartment->rooms}} min=0 max=255>
          @error('rooms')
              <div class="alert alert-danger">{{$message}}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="beds">Beds</label>
          <input type="number" class="form-control @error('beds') is-invalid @enderror" id="beds" aria-describedby="beds" placeholder="How many beds?" name="beds" value={{$apartment->beds}} min=0 max=255>
          @error('beds')
              <div class="alert alert-danger">{{$message}}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="bathrooms">Bathrooms</label>
          <input type="number" class="form-control @error('bathrooms') is-invalid @enderror" id="bathrooms" aria-describedby="bathrooms" placeholder="How many bathrooms?" name="bathrooms" value={{$apartment->bathrooms}} min=0 max=255>
          @error('bathrooms')
              <div class="alert alert-danger">{{$message}}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="square_meters">Square Meters</label>
          <input type="number" class="form-control @error('square_meters') is-invalid @enderror" id="square_meters" aria-describedby="square_meters" placeholder="Square meters" name="square_meters" value={{$apartment->square_meters}} min=0 max=65535>
          @error('square_meters')
              <div class="alert alert-danger">{{$message}}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="price">Price</label>
          <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" aria-describedby="price" placeholder="Price per night" name="price" step=".01" value={{$apartment->price}}>
          @error('price')
              <div class="alert alert-danger">{{$message}}</div>
          @enderror
        </div>
        
      {{-- select --}}

        <div class="form-group">
          <label for="nation" class="form-label">Country</label>
          <select name="nation" id="nation" class="form-control @error('nation') is-invalid @enderror">
            {{-- <option value="">Select Country</option> --}}
          <option value="{{$apartment->nation}}">{{$country}}</option>
            @foreach($countries as $key => $country)
            <option value="{{$key}}">{{$country}}</option>
            @endforeach
          </select>
            @error('nation')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>

      {{-- /select --}}


        <div class="form-group">
          <label for="address">Address</label>
          <input type="address" class="form-control @error('address') is-invalid @enderror" id="address" aria-describedby="address" placeholder="Address" name="address" value={{$apartment->address}}>
          @error('address')
              <div class="alert alert-danger">{{$message}}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="image">Image Url</label>
          <input type="file" class="form-control p-1 @error('image') is-invalid @enderror" id="image" aria-describedby="image" placeholder="Enter image url" name="image[]" multiple value="{{old('image[]')}}">
          @error('image')
              <div class="alert alert-danger">{{$message}}</div>
          @enderror
        </div>
        <div class="form-group">
          <h5>Services</h5>
          @foreach($services as $service)
          <div class="form-check-inline">
            <div class="form-check">
              <input type="checkbox" class="form-check-input" id="{{$service->slug}}" name="services[]" value="{{$service->id}}" {{in_array($service->id,old("services",[]))}} 
              {{$apartment->services->contains($service->id) ? 'checked' : ''}}>
              <label class="form-check-label" for="{{$service->slug}}">{{$service->slug}}</label>
            </div>
          </div>
          @endforeach
        </div>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="visible" name="visible" {{old('visible') ? 'checked': ''}}>
          <label class="form-check-label" for="visible">Published</label>
        </div>
        <button type="submit" class="btn btn-primary">Salva</button>
      </form>
    </div>
  </div>
</div>
@endsection