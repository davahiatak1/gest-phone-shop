<?php

namespace App\Http\Controllers;

use App\ExpenseType;
use Illuminate\Http\Request;

class ExpenseTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('expense-types.index', [
            'expenseTypes' => ExpenseType::all()
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
            'name' => 'max:255|required'
        ]);

        $expenseType = ExpenseType::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        if ($expenseType) {
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
     * @param  \App\ExpenseType  $expenseType
     * @return \Illuminate\Http\Response
     */
    public function show(ExpenseType $expenseType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ExpenseType  $expenseType
     * @return \Illuminate\Http\Response
     */
    public function edit(ExpenseType $expenseType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ExpenseType  $expenseType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ExpenseType $expenseType)
    {
        $request->validate([
            'name' => 'max:255|required'
        ]);


        $expenseType = $expenseType->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        if ($expenseType) {
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
     * @param  \App\ExpenseType  $expenseType
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExpenseType $expenseType)
    {
        $expenseType->delete();
        toast('Suppression réussi','success');
        return redirect(url()->previous());
    }
}
