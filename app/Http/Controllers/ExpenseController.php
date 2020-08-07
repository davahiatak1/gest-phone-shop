<?php

namespace App\Http\Controllers;

use App\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('expenses.index', [
            'expenses' => Expense::all()
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
        //dd($request->all());
        $request->validate([
            'date' => 'max:255|required',
            'description' => 'max:255|required',
            'expense_type_id' => 'max:20',
            'amount' => 'integer|required',
            'receipt' => 'file|nullable',
        ]);


        $date = explode('/', $request->date);

        
        $expense = Expense::create([
            'date' => $date[2]. '-' .$date[0]. '-' .$date[1],
            'description' => $request->description,
            'expense_type_id' => ($request->expense_type_id && $request->expense_type_id !=0 )?$request->expense_type_id :null,
            'amount' => (int)($request->amount)??0,
            'receipt' => ($request->file('receipt') && $request->file('receipt')->isValid())? 'storage/'. $request->receipt->storeAs('receipts', 'Receipt'. '-'. time(). '.'.$request->receipt->extension(), 'public') : "",
        ]);

        if ($expense) {
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
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function show(Expense $expense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function edit(Expense $expense)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expense $expense)
    {
        $request->validate([
            'date' => 'max:255|required',
            'description' => 'max:255|required',
            'expense_type_id' => 'max:20',
            'amount' => 'integer|max:20|required',
            'receipt' => 'file',
        ]);

        $date = explode('/', $request->date);

        if ($product->receipt) {
            Storage::disk('public')->delete($product->receipt);
        }

        $expense = $expense->update([
            'date' =>  $date[2]. '-' .$date[0]. '-' .$date[1],
            'description' => $request->description,
            'expense_type_id' => $request->expense_type_id,
            'amount' => $request->amount,
            'receipt' => ($request->file('receipt') && $request->file('receipt')->isValid())? 'storage/'. $request->receipt->storeAs('receipts', 'Receipt'. '-'. time(). '.'.$request->receipt->extension(), 'public') : "",
        ]);


        if ($expense) {
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
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expense $expense)
    {
        $expense->delete();
        toast('Suppression réussi','success');
        return redirect(url()->previous());
    }
}
