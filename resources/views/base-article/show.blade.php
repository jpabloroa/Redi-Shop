@extends('layouts.app')

@section('template_title')
    <div class="d-flex justify-content-between">
        <h4 class="mb-0 py-1">Ver: {{$baseArticle->article_id}}</h4>
        <a class="btn btn-primary " href="{{ route('articulos-base.index') }}"> {{__('Atrás')}}</a>
    </div>
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <!--
                        <div class="float-left">
                            <span class="card-title">{{__('Ver '.$baseArticle->article_id)}}</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('articulos-base.index') }}"> Back</a>
                        </div>-->
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>{{__('Directorio Archivo Blob - hash/sha256')}}:</strong>
                            {!! $filesManager->getImage($baseArticle->article_blob, ['codec' => '']) !!}
                        </div>
                        <div class="form-group">
                            <strong>{{__('Id Artículo')}}:</strong>
                            {{ $baseArticle->article_id }}
                        </div>
                        <div class="form-group">
                            <strong>{{__('Especificaciones artículo - Json')}}:</strong>
                            {{ $baseArticle->material_json }}
                        </div>
                        <div class="form-group">
                            <strong>{{__('Tallas - Json')}}:</strong>
                            {{ $baseArticle->sizes_json }}
                        </div>
                        <div class="form-group">
                            <strong>{{__('Precio $COP')}}:</strong>
                            {{ $baseArticle->price }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
