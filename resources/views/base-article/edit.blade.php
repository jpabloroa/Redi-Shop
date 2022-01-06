@extends('layouts.app')

@section('template_title')
    {{__('Actualizar Artículo Base')}}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{__('Editar Artículo Base #'.$baseArticle->article_id)}}</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('articulos-base.update', $baseArticle->article_id) }}"
                              role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('base-article.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
