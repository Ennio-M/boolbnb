@extends('layouts.admin');

@section('content')

<form action="{{route('admin.apartments.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="Title">Title</label>
      <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" aria-describedby="title" placeholder="Enter title" name="title" value="{{old('title')}}">
      @error('title')
          <div class="alert alert-danger">{{$message}}</div>
      @enderror
    </div>
    <div class="form-group">
      <label for="description">Description</label>
      <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" cols="30" rows="15" placeholder="Enter your description">{{old('description')}}</textarea>
      @error('description')
          <div class="alert alert-danger">{{$message}}</div>
      @enderror
    </div>
    <div class="form-group">
      <label for="rooms">Rooms</label>
      <input type="text" class="form-control @error('rooms') is-invalid @enderror" id="rooms" aria-describedby="rooms" placeholder="How many rooms?" name="rooms" value="{{old('rooms')}}">
      @error('rooms')
          <div class="alert alert-danger">{{$message}}</div>
      @enderror
    </div>
    <div class="form-group">
      <label for="beds">Beds</label>
      <input type="text" class="form-control @error('beds') is-invalid @enderror" id="beds" aria-describedby="beds" placeholder="How many beds?" name="beds" value="{{old('beds')}}">
      @error('beds')
          <div class="alert alert-danger">{{$message}}</div>
      @enderror
    </div>
    <div class="form-group">
      <label for="bathrooms">Bathrooms</label>
      <input type="text" class="form-control @error('bathrooms') is-invalid @enderror" id="bathrooms" aria-describedby="bathrooms" placeholder="How many bathrooms?" name="bathrooms" value="{{old('bathrooms')}}">
      @error('bathrooms')
          <div class="alert alert-danger">{{$message}}</div>
      @enderror
    </div>
    <div class="form-group">
      <label for="square_meters">Square Meters</label>
      <input type="text" class="form-control @error('square_meters') is-invalid @enderror" id="square_meters" aria-describedby="square_meters" placeholder="Square meters" name="square_meters" value="{{old('square_meters')}}">
      @error('square_meters')
          <div class="alert alert-danger">{{$message}}</div>
      @enderror
    </div>
    <div class="form-group">
      <label for="price">Price</label>
      <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" aria-describedby="price" placeholder="Price per night" step=".01" name="price" value="{{old('price')}}">
      @error('price')
          <div class="alert alert-danger">{{$message}}</div>
      @enderror
    </div>

    {{-- select --}}

    <div class="form-group">
      <label for="countries" class="form-label">Country</label>
      <select name="country" id="country" class="form-control @error('country') is-invalid @enderror">
        <option value="">Select Country</option>
        @foreach($countries as $key => $country)
        <option value="{{$key}}">{{$country}}</option>
        @endforeach
      </select>
        @error('category_id')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>

    {{-- /select --}}

    <div class="form-group">
      <label for="address">Address</label>
      <input type="address" class="form-control @error('address') is-invalid @enderror" id="address" aria-describedby="address" placeholder="Address" name="address" value="{{old('address')}}">
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
            <input type="checkbox" class="form-check-input" id="{{$service->slug}}" name="services[]" value="{{$service->id}}" {{in_array($service->id,old("services",[]))}}>
            <label class="form-check-label" for="{{$service->slug}}">{{$service->name}}</label>
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
@endsection