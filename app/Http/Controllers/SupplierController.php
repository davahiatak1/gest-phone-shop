<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
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
        return view('suppliers.index', [
            'suppliers' => Supplier::all()
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
            'name' => 'max:255|required',
            'phones' => 'max:255',
            'email' => 'max:255',
            'address' => 'max:255',
            'particular_name' => 'max:255',
            'particular_phones' => 'max:255',
            'particular_email' => 'max:255',
        ]);

        $supplier = Supplier::create([
            'name' => $request->name,
            'phones' => $request->phones,
            'email' => $request->email,
            'address' => $request->address,
            'particular_name' => $request->particular_name,
            'particular_phones' => $request->particular_phones,
            'particular_email' => $request->particular_email,
        ]);

        if ($supplier) {
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
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        $request->validate([
            'name' => 'max:255|required',
            'phones' => 'max:255',
            'email' => 'max:255',
            'address' => 'max:255',
            'particular_name' => 'max:255',
            'particular_phones' => 'max:255',
            'particular_email' => 'max:255',
        ]);


        $supplier = $supplier->update([
            'name' => $request->name,
            'phones' => $request->phones,
            'email' => $request->email,
            'address' => $request->address,
            'particular_name' => $request->particular_name,
            'particular_phones' => $request->particular_phones,
            'particular_email' => $request->particular_email,
        ]);

        if ($supplier) {
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
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        $supplier->delete();
        toast('Suppression réussi','success');
        return redirect(url()->previous());
    }
}
