@extends('layouts.app')

@section('template_title')
    {{ $article->name ?? 'Show Article' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Article</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('articulos.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Article Id:</strong>
                            {{ $article->article_id }}
                        </div>
                        <div class="form-group">
                            <strong>Creator Id:</strong>
                            {{ $article->creator_id }}
                        </div>
                        <div class="form-group">
                            <strong>Article Blob:</strong>
                            {{ $article->article_blob }}
                        </div>
                        <div class="form-group">
                            <strong>Base Article Id:</strong>
                            {{ $article->base_article_id }}
                        </div>
                        <div class="form-group">
                            <strong>Price:</strong>
                            {{ $article->price }}
                        </div>
                        <div class="form-group">
                            <strong>Stock:</strong>
                            {{ $article->stock }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
