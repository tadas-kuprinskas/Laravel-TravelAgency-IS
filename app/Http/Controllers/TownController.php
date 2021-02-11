<?php

namespace App\Http\Controllers;

use App\Models\Town;
use Illuminate\Http\Request;

class TownController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (isset($request->country_id) && $request->country_id !== 0) {
            $towns = \App\Models\Town::where('country_id', $request->country_id)->orderBy('title')->get();

        } elseif (isset($request->search)) {
            $towns = \App\Models\Town::where('title', $request->search)->orderBy('title')->get();

        } else {
            $towns = \App\Models\Town::orderBy('title')->get();
        }

        $countries = \App\Models\Country::orderBy('title')->get();
        return view('town.index', ['towns' => $towns, 'countries' => $countries]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = \App\Models\Country::orderBy('title')->get();
        return view('town.create', ['countries' => $countries]);
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
            'title' => 'required',
            'population' => 'required',
            'country_id' => 'required',
        ]);

        $town = new Town();
        $town->fill($request->all());
        $town->save();
        return redirect()->route('town.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Town  $town
     * @return \Illuminate\Http\Response
     */
    public function show(Town $town)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Town  $town
     * @return \Illuminate\Http\Response
     */
    public function edit(Town $town)
    {
        $countries = \App\Models\Country::orderBy('title')->get();
        return view('town.edit', ['town' => $town, 'countries' => $countries]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Town  $town
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Town $town)
    {
        $request->validate([
            'title' => 'required',
            'population' => 'required',
            'country_id' => 'required',
        ]);

        $town->fill($request->all());
        $town->save();
        return redirect()->route('town.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Town  $town
     * @return \Illuminate\Http\Response
     */
    public function destroy(Town $town)
    {
        $town->delete();
        return redirect()->route('town.index');
    }
}
