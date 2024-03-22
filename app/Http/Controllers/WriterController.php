<?php

namespace App\Http\Controllers;

use App\Http\Requests\WriterRequest;
use App\Models\Writer;
use Illuminate\Http\Request;

class WriterController extends Controller
{

    public function index()
    {
        $writers = Writer::all();
        return view('writer.index', compact('writers'));

    }


    public function create()
    {
        return view('writer.create');
    }


    public function store(WriterRequest $request)
    {
        Writer::create($request->all());
        return redirect()->action([WriterController::class, 'index']);
    }




    public function edit(Writer $writer)
    {
       return view('writer.edit', compact('writer'));
    }


    public function update(WriterRequest $request, Writer $writer)
    {
        $writer->update(
            $request->all()
        );
        return redirect()->action([WriterController::class, 'index']);

    }


    public function destroy(Writer $writer)
    {
        $writer -> delete();
        return redirect()->action([WriterController::class, 'index']);

    }
}
