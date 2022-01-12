<?php

namespace App\Http\Controllers;

use App\Http\Tools\FileManager;
use App\Http\Tools\Formatter;
use App\Http\Tools\MetaData;
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
        $filesManager = new FileManager();

        $filesManager->imagesDirectory = 'public/images/creators';

        return view('creator.index', compact('creators', 'filesManager'))
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Creator::$rules);

        $formatter = new Formatter();
        $fileManager = new FileManager();
        $meta = new MetaData();

        $fileManager->imagesDirectory = 'public/images/creators';

        $creator = Creator::create([
            'username' => $request->username,
            'phone' => $request->phone,
            'icon' => (is_null($request->icon)) ? 'default' : $fileManager->storeImage($request->file('icon')),
            'brand_name' => (is_null($request->brand_name)) ? 'user-' . base64_encode($request->username) : $request->brand_name,
            'address' => (is_null($request->address)) ? ((isset($meta->getFormattedLocation($request->latitude, $request->longitude)['formatted'])) ? $meta->getFormattedLocation($request->latitude, $request->longitude)['formatted'] : 'Unable to Locate') : $request->address,
            'landing_conf_json' => $request->landing_conf_json,
            'location' => $request->latitude . ',' . $request->longitude,
            'updated_at' => $formatter->getTime('0 days', 'America/Bogota', 'Y-m-d H:i:s')
        ]);

        return redirect()->route('creadores.index')
            ->with('success', 'Recurso ' . $id . ' creado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $creator = Creator::where('username', '=', $id)->get()[0];
        $filesManager = new FileManager();

        $filesManager->imagesDirectory = 'public/images/creators';

        return view('creator.show', compact('creator', 'filesManager'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $creator = Creator::where('username', '=', $id)->get()[0];
        $fileManager = new FileManager();

        $fileManager->imagesDirectory = 'public/images/creators';

        return view('creator.edit', compact('creator', 'fileManager'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Creator $creator
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Creator $creator, $id = '')
    {
        try {
            request()->validate(Creator::$rules);

            $formater = new Formatter();
            $fileManager = new FileManager();
            $meta = new MetaData();

            $fileManager->imagesDirectory = 'public/images/creators';

            $creator->where('username', '=', $id)->update([
                //'username' => $request->username,
                'phone' => $request->phone,
                'icon' => (is_null($request->file('icon'))) ? $request->existing_icon : $fileManager->updateImage($request->existing_icon, $request->file('icon')),
                'brand_name' => (is_null($request->brand_name)) ? 'user-' . base64_encode($request->username) : $request->brand_name,
                'address' => (is_null($request->address)) ? ((isset($meta->getFormattedLocation($request->latitude, $request->longitude)['formatted'])) ? $meta->getFormattedLocation($request->latitude, $request->longitude)['formatted'] : 'Unable to Locate') : $request->address,
                'landing_conf_json' => $request->landing_conf_json,
                //'location' => $request->latitude . ',' . $request->longitude,
                'updated_at' => $formater->getTime('0 days', 'America/Bogota', 'Y-m-d H:i:s')
            ]);

            return redirect()->route('creadores.index')
                ->with('success', 'Recurso ' . $id . ' actualizado exitosamente');
        } catch (\Exception $e) {
            return redirect()->route('creadores.index')
                ->with('error', 'Error! - Detalles: Perico' . $e->getMessage());
        }
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        try {
            $creator = Creator::where('username', '=', $id);

            $fileManager = new FileManager();
            $fileManager->imagesDirectory = 'public/images/creators';
            $fileManager->deleteImage($creator->get()[0]->icon);

            //
            $creator->delete();

            return redirect()->route('creadores.index')
                ->with('success', 'Recurso ' . $id . ' eliminado exitosamente');
        } catch (\Exception $e) {
            return redirect()->route('creadores.index')
                ->with('error', 'Error! - Detalles: ' . $e->getMessage());
        }
    }
}
