<?php

namespace App\Http\Controllers;

use App\Models\Invite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class InviteController extends Controller
{


    public function check($code)
    {
        $invite = Invite::where('code_unique',$code)->first();
        return view('check',compact('invite'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invites = Invite::all();
        return view('datatable',compact('invites'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('formulaire');
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
            'nom'=>'required',
            'prenom'=>'required',
            'table'=>'required',
            'place'=>'required',
        ]);

        $invite = Invite::create([
            'nom'=>$request->input('nom'),
            'prenom'=>$request->input('prenom'),
            'table'=>$request->input('table'),
            'nb_place'=>$request->input('place'),
            'telephone'=>$request->input('telephone'),
            'code_unique'=>uniqid()
        ]);

        return redirect(route('invite.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invite  $invite
     * @return \Illuminate\Http\Response
     */
    public function show($code)
    {
        $invite = Invite::where('code_unique',$code)->first();
        return view('profil',compact('invite'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Invite  $invite
     * @return \Illuminate\Http\Response
     */
    public function edit($code)
    {
        $invite = Invite::where('code_unique',$code)->first();
        return view('profil-edit',compact('invite'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Invite  $invite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invite $invite)
    {
        $request->validate([
            'nom'=>'required',
            'prenom'=>'required',
            'table'=>'required',
            'place'=>'required',
        ]);

        $invite->nom = $request->input('nom');
        $invite->prenom = $request->input('prenom');
        $invite->table = $request->input('table');
        $invite->nb_place = $request->input('place');
        $invite->telephone = $request->input('telephone');
        $invite->save();
        
        return redirect(route('invite.show',$invite->code_unique));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invite  $invite
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invite $invite)
    {
        //
    }
}
