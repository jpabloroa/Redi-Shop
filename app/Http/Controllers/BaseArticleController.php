<?php

namespace App\Http\Controllers;

use App\Http\Tools\FileManager;
use App\Http\Tools\Formatter;
use App\Models\BaseArticle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class BaseArticleController
 * @package App\Http\Controllers
 */
class BaseArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $baseArticles = BaseArticle::paginate();
        $filesManager = new FileManager();

        $filesManager->imagesDirectory = 'public/images/base_articles';

        return view('base-article.index', compact('baseArticles', 'filesManager'))
            ->with('i', (request()->input('page', 1) - 1) * $baseArticles->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $baseArticle = new BaseArticle();
        return view('base-article.create', compact('baseArticle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            request()->validate(BaseArticle::$rules);

            $formater = new Formatter();
            $fileManager = new FileManager();

            $fileManager->imagesDirectory = 'public/images/base_articles';

            $baseArticle = BaseArticle::create([
                'article_id' => $request->article_id,
                'article_blob' => $fileManager->storeImage($request->file('article_blob')),
                'specs_json' => (isset($request->specs_json) && $request->specs_json != null) ? $request->specs_json : '{}',
                'sizes_json' => (isset($request->sizes_json) && $request->sizes_json != null) ? $request->sizes_json : '{}',
                'price' => DB::raw('CAST(' . $request->price . ' as decimal(16,2))'),
                'updated_at' => $formater->getTime('0 days', 'America/Bogota', 'Y-m-d H:i:s')
            ]);

            return redirect()->route('articulos-base.index')
                ->with('success', 'Recurso ' . $request->article_id . ' creado exitosamente');
        } catch (\Exception $e) {
            return redirect()->route('articulos-base.index')
                ->with('error', 'Error! - Detalles: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $baseArticle = BaseArticle::where("article_id", '=', $id)->get()[0];
        $filesManager = new FileManager();

        $filesManager->imagesDirectory = 'public/images/base_articles';

        return view('base-article.show', compact('baseArticle', 'filesManager'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $baseArticle = BaseArticle::where("article_id", '=', $id)->get()[0];
        $filesManager = new FileManager();

        $filesManager->imagesDirectory = 'public/images/base_articles';

        return view('base-article.edit', compact('baseArticle', 'filesManager'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param BaseArticle $baseArticle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BaseArticle $baseArticle, $id = '')
    {
        try {
            request()->validate(BaseArticle::$rules);

            $formater = new Formatter();
            $filesManager = new FileManager();

            $filesManager->imagesDirectory = 'public/images/base_articles';

            $toUpdate = [
                'article_blob' => (is_null($request->article_blob)) ? $request->existing_blob : $filesManager->updateImage($request->existing_blob, $request->file('article_blob')),
                'specs_json' => (isset($request->specs_json) && $request->specs_json != null) ? $request->specs_json : '{}',
                'sizes_json' => (isset($request->sizes_json) && $request->sizes_json != null) ? $request->sizes_json : '{}',
                'price' => DB::raw('CAST(' . $request->price . ' as decimal(16,2))'),
                'updated_at' => $formater->getTime('0 days', 'America/Bogota', 'Y-m-d H:i:s')
            ];

            $baseArticle->where("article_id", '=', $id)->update($toUpdate);

            return redirect()->route('articulos-base.index')
                ->with('success', 'Recurso ' . $request->article_id . ' editado exitosamente');
        } catch (\Exception $e) {
            return redirect()->route('articulos-base.index')
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
            $baseArticle = BaseArticle::where("article_id", '=', $id);

            $filesManager = new FileManager();
            $filesManager->imagesDirectory = 'public/images/base_articles';
            $filesManager->deleteImage($baseArticle->get()[0]->article_blob);

            //
            $baseArticle->delete();

            return redirect()->route('articulos-base.index')
                ->with('success', 'Recurso ' . $id . ' eliminado exitosamente');
        } catch (\Exception $e) {
            return redirect()->route('articulos-base.index')
                ->with('error', 'Error! - Detalles: ' . $e->getMessage());
        }
    }
}
