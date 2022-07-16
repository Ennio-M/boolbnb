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
        $data = [];
        $geometryList_array = [[
            "type" => "CIRCLE",
            "position" => "45.46188, 9.18675",
            "radius" => 10000
        ]];
        $geometryList = json_encode($geometryList_array);
        //dd($geometryList);
        $apartments = Apartment::all();
        $apts = response()->json($apartments);

        foreach($apts->original as $apt){
            $apartment = [
                "apartment" => [
                    "id" => $apt->id
                ],
                "position" => [
                    "lat" => $apt->latitude,
                    "lon" => $apt->longitude
                ]
            ];
            array_push($data, $apartment);
        }
        $data_encoded = json_encode($data);
        //dd($data_encoded);

        $response = Http::get('https://api.tomtom.com/search/2/geometryFilter.json', [
            'key' => $this->myTomTomApiKey,
            'geometryList' => $geometryList,
            'poiList' => $data_encoded,
        ]);
        $decoded = json_decode($response->body());

        dd($decoded);
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
