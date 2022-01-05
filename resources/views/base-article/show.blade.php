@extends('layouts.app')

@section('template_title')
    {{ $baseArticle->name ?? 'Show Base Article' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Base Article</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('articulos-base.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Article Id:</strong>
                            {{ $baseArticle->article_id }}
                        </div>
                        <div class="form-group">
                            <strong>Article Blob:</strong>
                            {{ $baseArticle->article_blob }}
                        </div>
                        <div class="form-group">
                            <strong>Material Json:</strong>
                            {{ $baseArticle->material_json }}
                        </div>
                        <div class="form-group">
                            <strong>Sizes Json:</strong>
                            {{ $baseArticle->sizes_json }}
                        </div>
                        <div class="form-group">
                            <strong>Price:</strong>
                            {{ $baseArticle->price }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
