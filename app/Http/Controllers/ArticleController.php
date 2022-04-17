<?php

namespace App\Http\Controllers;

use App\Http\Tools\FileManager;
use App\Models\Article;
use Illuminate\Http\Request;

/**
 * Class ArticleController
 * @package App\Http\Controllers
 */
class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::paginate();
        $filesManager = new FileManager();

        $filesManager->imagesDirectory = 'public/images/base_articles';

        return view('article.index', compact('articles', 'filesManager'))
            ->with('i', (request()->input('page', 1) - 1) * $articles->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $article = new Article();
        return view('article.create', compact('article'));
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
            request()->validate(Article::$rules);

            $article = Article::create($request->all());

            return redirect()->route('articulos.index')
                ->with('success', 'Article created successfully.');

            /*
            $formater = new Formatter();
            $fileManager = new FileManager();

            $fileManager->imagesDirectory = 'public/images/base_articles';

            $Article = Article::create([
                'article_id' => $request->article_id,
                'article_blob' => $fileManager->storeImage($request->file('article_blob')),
                'specs_json' => (isset($request->specs_json) && $request->specs_json != null) ? $request->specs_json : '{}',
                'sizes_json' => (isset($request->sizes_json) && $request->sizes_json != null) ? $request->sizes_json : '{}',
                'price' => DB::raw('CAST(' . $request->price . ' as decimal(16,2))'),
                'updated_at' => $formater->getTime('0 days', 'America/Bogota', 'Y-m-d H:i:s')
            ]);

            return redirect()->route('articulos.index')
                ->with('success', 'Recurso ' . $request->article_id . ' creado exitosamente');*/
        } catch (\Exception $e) {
            return redirect()->route('articulos.index')
                ->with('error', 'Error! - Detalles: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public
    function show($id)
    {
        $article = Article::find($id);

        return view('article.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public
    function edit($id)
    {
        $article = Article::find($id);

        return view('article.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Article $article
     * @return \Illuminate\Http\Response
     */
    public
    function update(Request $request, Article $article)
    {
        request()->validate(Article::$rules);

        $article->update($request->all());

        return redirect()->route('articulos.index')
            ->with('success', 'Article updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public
    function destroy($id)
    {
        $article = Article::find($id)->delete();

        return redirect()->route('articulos.index')
            ->with('success', 'Article deleted successfully');
    }
}
