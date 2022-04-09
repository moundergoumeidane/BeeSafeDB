<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\site;

class siteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return site::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required'
        ]);
       /* return site::create(
            $request->all()


        );*/
        $site = new site();
        //input method is used to get the value of input with its
        //name specified

        $site->name = $request->name;

        $site->user_id = auth()->id();
        $site->save();


        return $site;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return  site::find($id);
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
        $site=site::find($id);
        $site->update($request->all());
        return $site;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       return site::destroy($id);
    }
    public function search($name)
    {
        return site::where('name','like','%'.$name.'%')->get();
    }
}
