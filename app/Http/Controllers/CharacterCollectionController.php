<?php

namespace App\Http\Controllers;

use App\Level;
use Illuminate\Http\Request;
use App\CharacterCollection;
use App\User;


class CharacterCollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index($user)
    {
        $user = User::find($user);
        $data = CharacterCollection::all();

        return view('home',[
            'user' => $user,
            'collection' => $data
        ]);
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
            'characters_id' => 'required',
            'levels_id' => 'required',
            'user_id' => 'required'
        ]);

        return CharacterCollection::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return CharacterCollection::find($id);
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
        return CharacterCollection::find($id)->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return CharacterCollection::destroy($id);
    }

}
