<?php

namespace App\Http\Controllers;

use App\Http\Tools\Formatter;
use App\Models\Partner;
use Illuminate\Http\Request;

/**
 * Class PartnerController
 * @package App\Http\Controllers
 */
class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partners = Partner::paginate();

        return view('partner.index', compact('partners'))
            ->with('i', (request()->input('page', 1) - 1) * $partners->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $partner = new Partner();
        return view('partner.create', compact('partner'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Partner::$rules);

        $formater = new Formatter();

        $partner = Partner::create([
            'username' => $request->username,
            'phone' => $request->phone,
            'brand_name' => (!is_null($request->brand_name)) ? $request->brand_name : $request->username,
            'address' => (!is_null($request->address)) ? $request->address : 'Remote Location',
            'updated_at' => $formater->getTime('0 days', 'America/Bogota', 'Y-m-d H:i:s')
        ]);

        return redirect()->route('socios.index')
            ->with('success', 'Bienvenido a la familia de socios de ' . config('app.name') . ' <strong>' . $request->username . '</strong>!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $partner = Partner::where('username', '=', $id)->get()[0];

        return view('partner.show', compact('partner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $partner = Partner::where('username', '=', $id)->get()[0];

        return view('partner.edit', compact('partner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Partner $partner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Partner $partner, $id = '')
    {
        request()->validate(Partner::$rules);

        $formater = new Formatter();

        $toUpdate = [
            'username' => $request->username,
            'phone' => $request->phone,
            'brand_name' => (!is_null($request->brand_name)) ? $request->brand_name : $request->username,
            'address' => (!is_null($request->address)) ? $request->address : 'Remote Location',
            'updated_at' => $formater->getTime('0 days', 'America/Bogota', 'Y-m-d H:i:s')
        ];

        $partner->where('username', '=', $id)->update($toUpdate);;

        return redirect()->route('socios.index')
            ->with('success', 'Datos de <strong>' . $id . '</strong> actualizados satisfactoriamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $partner = Partner::where('username', '=', $id)->delete();

        return redirect()->route('socios.index')
            ->with('success', 'Datos de <strong>' . $id . '</strong> eliminados satisfactoriamente');
    }
}
