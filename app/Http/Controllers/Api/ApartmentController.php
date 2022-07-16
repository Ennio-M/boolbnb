<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Apartment;
use App\Image;

class ApartmentController extends Controller
{
    protected $myTomTomApiKey = 'YeAUs1VSBC9gVGieDMDGZZVGtnxy9myl';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apartments = Apartment::all();
        $apts = response()->json($apartments);

        // $response = Http::get('https://api.tomtom.com/search/2/search/' . $apt_json, [
        //     'key' => $this->myTomTomApiKey,
        //     'lat' => 45.46188,
        //     'lon' => 9.18675,
        //     'radius' => 20000
        // ]);

        // $decoded = json_decode($response->body());
        // dd($decoded);

        // $apt_json = [];

        // foreach($apts->original as $apt){
            
        // }
        $data1 = array(
            "apartment" => [
                "id" => 24
            ],
            "position" => [
                "lat" => 45.46188,
                "lon" => 9.18675
            ]
        );

        $data2 = array(
            "apartment" => [
                "id" => 23
            ],
            "position" => [
                "lat" => 32.46188,
                "lon" => 14.18675
            ]
        );

        $data = $data1 + $data2;
        dd($data);
        $data_encoded = json_encode($data);
        dd($data_encoded);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $apartment = Apartment::where('slug', $slug)->with('images','services')->first();
        if (empty($apartment)) {
            return response()->json(["message" => "Post not found"], 404);
        }
        return response()->json($apartment);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
}
