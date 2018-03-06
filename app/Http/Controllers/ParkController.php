<?php

namespace App\Http\Controllers;

use App\Park;
use Illuminate\Http\Request;

class ParkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $parks = Park::active()->get();
        return view('park.index', compact('parks'));
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
        if(Park::create($request->only('plate','longterm'))) {
            return redirect()->back()->with('info','Parkolás rögzítve');
        }
        return redirect()->back()->with('error','Parkolás rögzítése sikertelen!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Park  $park
     * @return \Illuminate\Http\Response
     */
    public function show(Park $park)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Park  $park
     * @return \Illuminate\Http\Response
     */
    public function edit(Park $park)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Park  $park
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Park $park)
    {
        $park->update($request->only('longterm'));
        return redirect()->back()->with('info','Parkolás típusa módosítva!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Park  $park
     * @return \Illuminate\Http\Response
     */
    public function destroy(Park $park)
    {
        //
    }

}
