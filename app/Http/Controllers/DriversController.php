<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use Brian2694\Toastr\Facades\Toastr;
use DateTime;
use Illuminate\Http\Request;

class DriversController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $drivers= Driver::all();
        $count=1;
        $title="Liste des conducteurs";
        return view('conducteurs.index', compact("drivers","count","title"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $title="Ajout d'un conducteur";
        return view('conducteurs.create',compact("title"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $date = $request['dateNaissance'];
        $dateNaissance = new DateTime($date);
        $dateActuelle= new DateTime();

        if($dateNaissance > $dateActuelle){
            toastr()->error('La date de naissance est dans le futur. Veuillez entrer une nouvelle date.');
            return back();
        }

        $request['dateNaissance']= $dateNaissance->format('Y-m-d');
        Driver::create($request->all());
        toastr()->success('Ajout éffectué avec succès');
        return redirect()->route('conducteurs.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $title="Mise à jour des information d'un conducteur ";
        $driver = Driver::findOrFail($id);
        return view('conducteurs.edit',compact('driver','title'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //;
        try {

            $date = $request['dateNaissance'];
            $dateNaissance = new DateTime($date);
            $dateActuelle= new DateTime();

            if($dateNaissance > $dateActuelle){
                toastr()->error('La date de naissance est dans le futur. Veuillez entrer une nouvelle date.');
                return back();
            }

            $request['dateNaissance']= $dateNaissance->format('Y-m-d');

            $driver = Driver::findOrFail($id);
            $driver->update($request->all());
            toastr()->success('Mise à jour éffectué avec succès.');
            return redirect()->route('conducteurs.index');
        } catch (\Exception $e) {
            toastr()->error('error', 'Une erreur s\'est produite : ' . $e->getMessage());
            return back();
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        try {
            $driver = Driver::findOrFail($id);

            $driver->delete();

            toastr()->success('Conducteur supprimé avec succès.');
            return redirect();
        } catch (\Exception $e) {
            toastr()->error('error', 'Une erreur s\'est produite : ' . $e->getMessage());
            return back();
        }
     }
}
