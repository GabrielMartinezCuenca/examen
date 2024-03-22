<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoanRequest;
use App\Models\Loan;
use App\Models\User;
use App\Models\Book;

use Illuminate\Http\Request;

class LoanController extends Controller
{

    public function index()
    {
        $loans = Loan::all();
        return view('loans.index', compact('loans'));
    }


    public function create()
    {
        $clients = User::where('role_id', 2)->get();
        $books = Book::where('quantity', '>', 0)->get();
        return view('loans.create', compact('clients', 'books'));
    }


    public function store(LoanRequest $request)
    {
        Loan::create($request->all());
        return redirect()->action([LoanController::class, 'index']);
    }

    public function show(Loan $loan)
    {
        //
    }


    public function edit(Loan $loan)
    {
        $clients = User::where('role_id', 2)->get();
        $books = Book::where('quantity', '>', 0)->get();
        return view('loans.edit', compact('clients', 'books', 'loan'));
    }


    public function update(LoanRequest $request, Loan $loan)
    {
        $loan->update($request->all());
        return redirect()->action([LoanController::class, 'index']);

    }


    public function destroy(Loan $loan)
    {
        $loan->delete();
    }
}
