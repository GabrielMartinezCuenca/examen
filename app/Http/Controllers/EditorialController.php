<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditorialRequest;
use App\Models\Editorial;
use Illuminate\Http\Request;

class EditorialController extends Controller
{

    public function index()
    {
        $editorials = Editorial::all();
        return view('editorials.index', compact('editorials'));
    }

    public function create()
    {
        return view('editorials.create');
    }


    public function store(EditorialRequest $request)
    {
        Editorial::create($request->all());
        return redirect()->action([EditorialController::class, 'index']);
    }

    public function edit(Editorial $editorial)
    {
        return view('editorials.edit', compact('editorial'));
    }


    public function update(EditorialRequest $request, Editorial $editorial)
    {
        $editorial -> update($request->all());
        return redirect()->action([EditorialController::class, 'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Editorial  $editorial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Editorial $editorial)
    {
        $editorial -> delete();
        return redirect()->action([EditorialController::class, 'index']);

    }
}
