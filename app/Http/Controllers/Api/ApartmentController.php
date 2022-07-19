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
    public function index($userInput, $userRange)
    {   
        // salvo tutti gli appartamenti
        $apartments = Apartment::all();
        //chiamo l'api di tomtom passandole l'indirizzo inserito dall'utente
        $user_response = Http::get('https://api.tomtom.com/search/2/structuredGeocode.json', [
            'key' => $this->myTomTomApiKey,
            'countryCode' => 'it',
            'streetName' => $userInput
        ]);
        $user_decoded = json_decode($user_response->body());
        //salvo le coordinate che l'api mi ha restituito
        $user_lat = $user_decoded->results[0]->position->lat;
        $user_lon = $user_decoded->results[0]->position->lon;


        $inRangeApts = [];

        foreach($apartments as $apartment){
            $theta = $user_lon - $apartment->longitude;
            $distance =  (sin(deg2rad($user_lat)) * sin(deg2rad($apartment->latitude))) + (cos(deg2rad($user_lat)) * cos(deg2rad($apartment->latitude)) * cos(deg2rad($theta)));
            $distance = acos($distance);
            $distance = rad2deg($distance);
            $distance = $distance * 60 * 1.1515 * 1.609344;
            $distance = round($distance, 2);
            if($distance < $userRange){
                array_push($inRangeApts, $apartment);
            }
        }

        return $inRangeApts;


        
        // $data = [];
        // //definisco il tipo di ricerca che voglio effettuare e il suo raggio
        // $geometryList_array = [[
        //     "type" => "CIRCLE",
        //     "position" => "$user_lat, $user_lon",
        //     "radius" => $userRange * 1000
        // ]];
        // $geometryList = json_encode($geometryList_array);
        // //salvo tutti gli appartamenti del db
        // $apartments = Apartment::all();
        // $apts = response()->json($apartments);
        // //codifico in json la lista di tutti gli appartamenti del db
        // foreach($apts->original as $apt){
        //     $item = [
        //         "apartment" => [
        //             "id" => $apt->id
        //         ],
        //         "position" => [
        //             "lat" => $apt->latitude,
        //             "lon" => $apt->longitude
        //         ]
        //     ];
        //     array_push($data, $item);
        // }
        // $data_encoded = json_encode($data);

        // //chiamo l'api di tomtom passandole il tipo di ricerca e il json degli appartamenti
        // $response = Http::get('https://api.tomtom.com/search/2/geometryFilter.json', [
        //     'key' => $this->myTomTomApiKey,
        //     'geometryList' => $geometryList,
        //     'poiList' => $data_encoded,
        // ]);
        // //in $decoded ci sono gli id degli appartamenti che rientrano nel raggio di ricerca impostato
        // $decoded = json_decode($response->body());
        // //con un ciclo foreach seleziono dal db tutti gli appartamenti interessati
        // $apartmentsList = [];
        // foreach($decoded->results as $apartment){
        //     array_push($apartmentsList, 
        //         Apartment::where("id", $apartment->apartment->id)->with(["images", "services"])->first()
        //     );
        // }
        // //restituisco una risposta in json
        // return response()->json($apartmentsList);
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
