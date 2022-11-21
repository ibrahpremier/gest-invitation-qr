<?php

namespace App\Http\Controllers;

use App\Models\Invite;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Redirect;
use App\Imports\InvitesImport;
use Maatwebsite\Excel\Facades\Excel;

class InviteController extends Controller
{

    public function import_form()
    {
        return view('upload-form');
    }


    public function import(Request $request) 
    {
        $request->validate([
            'liste' => 'required|file|mimes:xls,xlsx,csv'
         ]);
         
        Excel::import(new InvitesImport, $request->file('liste'));
        return redirect(route('invite.index'))->with('success', 'All good!');
    }

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
            'table'=>'required',
            'place'=>'required',
        ]);

        $invite = Invite::create([
            'nom'=>ucwords(strtolower($request->input('nom'))),
            'table'=>strtoupper($request->input('table')),
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
            'table'=>'required',
            'nb_place'=>'required',
        ]);

        $invite->update($request->all());
        
        return redirect(route('invite.show',$invite->code_unique));

        // return Redirect::back();

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
