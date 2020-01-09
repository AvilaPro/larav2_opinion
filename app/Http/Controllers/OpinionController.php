<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Opinion;

class OpinionController extends Controller

{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Opinion::where('user_id', auth()->id())->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $opinion = new Opinion();
        $opinion->description = $request->description;
        $opinion->user_id = auth()->id();
        $opinion->save();

        return $opinion;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //EN ESTE CASO NO SE USARA SHOW YA QUE NO
    //NECESITAMOS MOSTRAR MUCHO CUANDO ESTEMOS SOBRE EL.

    public function show($id)
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
        $opinion = Opinion::find($id);
        $opinion->description = $request->description;
        $opinion->save();

        return $opinion;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $opinion = Opinion::find($id);
        $opinion->delete();
    }
}
