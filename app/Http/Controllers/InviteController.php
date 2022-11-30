<?php

namespace App\Http\Controllers;

use App\Models\Invite;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Redirect;
use App\Imports\InvitesImport;
use App\Models\Table;
use Maatwebsite\Excel\Facades\Excel;
use Flasher\Prime\FlasherInterface;

class InviteController extends Controller
{

    public function remove(Invite $invite)
    {
        $table = Table::findorfail($invite->table_id);
        $table->disponible = $table->disponible + $invite->nb_place;
        $table->save();

        $invite->table_id = null;
        $invite->nb_place = null;
        $invite->save();

        flash()->addSuccess('Invité retiré de cette table');
        return back();
    }

    public function save_add_to_table(Request $request)
    {
        $table = Table::findorfail($request->input('table_id'));
        $invite = Invite::findorfail($request->input('invite_id'));
        if($request->input('nb_place')<=$table->disponible){
            $invite->nb_place = $request->input('nb_place');
            $invite->table_id = $request->input('table_id');
            $invite->save();
            $table->disponible = $table->disponible - $request->input('nb_place');
            $table->save();
            flash()->addSuccess('Invité ajouté');
            // return redirect(route('table.show',$request->input('table_id')));
        } else {
            flash()->addDanger('Nombre de place insuffisant');
        }

        return back();

    }

    public function add_to_table_frm()
    {
        $invites = Invite::where('table_id',null)->get();
        return view('add-to-table',compact('invites'));
    }

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
        return redirect(route('invite.index'))->with('success', 'Liste des invités importés!');
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
        $tables = Table::all();
        return view('formulaire',compact('tables'));
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
            // 'table'=>'required',
            // 'place'=>'required',
        ]);

        // $table = Table::where('id')

        $invite = Invite::create([
            'nom'=>ucwords(strtolower($request->input('nom'))),
            // 'table_id'=>strtoupper($request->input('table')),
            // 'nb_place'=>$request->input('place'),
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
        $tables = Table::all();
        $invite = Invite::where('code_unique',$code)->first();
        return view('profil-edit',compact('invite','tables'));
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
        ]);

        $invite->update($request->all());
        
        return redirect(route('invite.show',$invite->code_unique));
        // return back()->with('success','Infos mis à jour');

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
