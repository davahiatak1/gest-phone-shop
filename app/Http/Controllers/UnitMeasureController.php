<?php

namespace App\Http\Controllers;

use App\UnitMeasure;
use Illuminate\Http\Request;

class UnitMeasureController extends Controller
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
        return view('unit-measures.index', [
            'unitMeasures' => UnitMeasure::all()
        ]);
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
        $request->validate([
            'unit' => 'max:255|required'
        ]);

        $unitMeasure = UnitMeasure::create([
            'unit' => $request->unit
        ]);

        if ($unitMeasure) {
            toast('Enregistrement réussi','success');
            return redirect(url()->previous());
        }else{
            toast("Une erreur est survenu lors de l'enregistrement",'error');
            return redirect(url()->previous());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UnitMeasure  $unitMeasure
     * @return \Illuminate\Http\Response
     */
    public function show(UnitMeasure $unitMeasure)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UnitMeasure  $unitMeasure
     * @return \Illuminate\Http\Response
     */
    public function edit(UnitMeasure $unitMeasure)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UnitMeasure  $unitMeasure
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UnitMeasure $unitMeasure)
    {
        $request->validate([
            'unit' => 'max:255|required'
        ]);


        $unitMeasure = $unitMeasure->update([
            'unit' => $request->unit
        ]);

        if ($unitMeasure) {
            toast('Modification réussi','success');
            return redirect(url()->previous());
        }else{
            toast('Une erreur est survenu lors de la modification','error');
            return redirect(url()->previous());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UnitMeasure  $unitMeasure
     * @return \Illuminate\Http\Response
     */
    public function destroy(UnitMeasure $unitMeasure)
    {
        $unitMeasure->delete();
        toast('Suppression réussi','success');
        return redirect(url()->previous());
    }
}
