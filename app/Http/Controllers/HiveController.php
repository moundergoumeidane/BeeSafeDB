<?php

namespace App\Http\Controllers;

use App\Models\hive;
use App\Http\Requests\StorehiveRequest;
use App\Http\Requests\UpdatehiveRequest;
use Illuminate\Http\Request;

class HiveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return hive::all();
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
     * @param  \App\Http\Requests\StorehiveRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
        'temperature'=>'required',
        'humidity'=>'required',
        'weight'=>'required',
        'sound_level'=>'required',
        'longitude'=>'required',
        'latitude'=>'required',
        'activity'=>'required'
        ]);
        /* return hive::create(
             $request->all()


         );*/
        $hive = new hive();
        //input method is used to get the value of input with its
        //name specified

        $hive->temperature = $request->temperature;
        $hive->humidity = $request->humidity;
        $hive->weight = $request->weight;
        $hive->sound_level = $request->sound_level;
        $hive->longitude = $request->longitude;
        $hive->latitude = $request->latitude;
        $hive->activity = $request->activity;

        $hive->site_id = $request->site_id;
        $hive->save();


        return $hive;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\hive  $hive
     * @return \Illuminate\Http\Response
     *
     */
    public function show($id)
    {
        return  hive::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\hive  $hive
     * @return \Illuminate\Http\Response
     */
    public function edit(hive $hive)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatehiveRequest  $request
     * @param  \App\Models\hive  $hive
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $hive=hive::find($id);
        $hive->update($request->all());
        return $hive;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\hive  $hive
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return hive::destroy($id);

    }
}
