<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Monarobase\CountryList\CountryListFacade;
use App\Apartment;
use App\Image;
use App\Service;

class ApartmentController extends Controller
{
    protected $validationRules = [
        "title" => "required|string|max:150",
        "description" => "string|max:16777215|nullable",
        "rooms" => "required|integer|max:255",
        "beds" => "required|integer|max:255",
        "bathrooms" => "required|integer|max:255",
        "square_meters" => "integer|max:65535|nullable",
        "visible" => "sometimes|accepted",
        "price" => "required|numeric|digits_between:min=0,max=8",
        "nation" => "required|string|max:60",
        "address" => "required|string|max:255"
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apartments = Apartment::all();
        return view('admin.apartments.index', compact('apartments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = Service::all();
        $countries = CountryListFacade::getList('it');
        return view('admin.apartments.create', compact('services', 'countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   

        $request->validate($this->validationRules);
        $data = $request->all();

        $newApartment = new Apartment();
        $newApartment->title = $data['title'];
        $newApartment->description = $data['description'];
        $newApartment->rooms = $data['rooms'];
        $newApartment->beds = $data['beds'];
        $newApartment->bathrooms = $data['bathrooms'];
        $newApartment->square_meters = $data['square_meters'];
        $newApartment->visible = isset($data['visible']);
        $newApartment->price = $data['price'];
        $newApartment->sponsored = false;
        $newApartment->nation = $data['nation'];
        $newApartment->address = $data['address'];

        $newApartment->longitude = 
        $newApartment->latitude = 
        $newApartment->slug = $this->getSlug($newApartment->title);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $apartment = Apartment::findOrFail($id);
        return view('admin.apartments.show', compact('apartment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Apartment $apartment)
    {   
        $services = Service::all();
        $countries = CountryListFacade::getList('it');
        return view('admin.apartments.edit', compact('apartment', 'services', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function fetch(){
        $response = Http::get('https://api.tomtom.com/search/2/structuredGeocode.json', [
            'key' => 'YeAUs1VSBC9gVGieDMDGZZVGtnxy9myl',
            'countryCode'   
        ]);
    }

    /**
     * Generate an unique slug
     *
     * @param  string $title
     * @return string
     */
    private function getSlug($title)
    {
        $slug = Str::of($title)->slug("-");
        $count = 1;
        while( Apartment::where("slug", $slug)->first() ) {
            $slug = Str::of($title)->slug("-") . "-{$count}";
            $count++;
        }
        return $slug;
    }
}
