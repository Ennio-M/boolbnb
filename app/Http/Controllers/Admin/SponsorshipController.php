<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Sponsorship;
use App\Apartment;
use App\User;
use Illuminate\Support\Facades\Auth;


class SponsorshipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sponsors = Sponsorship::all();
        $apartments = Apartment::all()->where("user_id", Auth::user()->id);
        return view('admin.sponsorships.index', compact('sponsors','apartments'));
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
    public function store(Request $request, $apartment_id)
    {
        $data = $request->all();
        $apartment = Apartment::findOrFail($apartment_id);
        $today = date_create(date("Y-m-d"));
        $duration = $data['duration'] . ' hours';
        $expiry = date_add($today, date_interval_create_from_date_string($duration));
        $apartment->sponsorships()->attach($data['sponsorship_id'], ['expiry' => $expiry]);
        return redirect()->route('admin.sponsorships.index')->with("message","Hai sponsorizzato l'appartamento {$apartment->title}");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
