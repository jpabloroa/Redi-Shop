<?php

namespace App\Http\Controllers;

use App\Models\Creator;
use Illuminate\Http\Request;

/**
 * Class CreatorController
 * @package App\Http\Controllers
 */
class CreatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $creators = Creator::paginate();

        return view('creator.index', compact('creators'))
            ->with('i', (request()->input('page', 1) - 1) * $creators->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $creator = new Creator();
        return view('creator.create', compact('creator'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Creator::$rules);

        $creator = Creator::create($request->all());

        return redirect()->route('creadores.index')
            ->with('success', 'Creator created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $creator = Creator::find($id);

        return view('creator.show', compact('creator'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $creator = Creator::find($id);

        return view('creator.edit', compact('creator'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Creator $creator
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Creator $creator)
    {
        request()->validate(Creator::$rules);

        $creator->update($request->all());

        return redirect()->route('creadores.index')
            ->with('success', 'Creator updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $creator = Creator::find($id)->delete();

        return redirect()->route('creadores.index')
            ->with('success', 'Creator deleted successfully');
    }
}
