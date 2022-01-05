@extends('layouts.app')

@section('template_title')
    Update Base Article
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Base Article</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('articulos-base.update', $baseArticle->id) }}"  role="form" enctype="multipart/form-data">
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
