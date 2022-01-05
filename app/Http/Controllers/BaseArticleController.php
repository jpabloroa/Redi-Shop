<?php

namespace App\Http\Controllers;

use App\Models\BaseArticle;
use Illuminate\Http\Request;

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

        return view('base-article.index', compact('baseArticles'))
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(BaseArticle::$rules);

        $baseArticle = BaseArticle::create($request->all());

        return redirect()->route('articulos-base.index')
            ->with('success', 'BaseArticle created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $baseArticle = BaseArticle::find($id);

        return view('base-article.show', compact('baseArticle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $baseArticle = BaseArticle::find($id);

        return view('base-article.edit', compact('baseArticle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  BaseArticle $baseArticle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BaseArticle $baseArticle)
    {
        request()->validate(BaseArticle::$rules);

        $baseArticle->update($request->all());

        return redirect()->route('articulos-base.index')
            ->with('success', 'BaseArticle updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $baseArticle = BaseArticle::find($id)->delete();

        return redirect()->route('articulos-base.index')
            ->with('success', 'BaseArticle deleted successfully');
    }
}
