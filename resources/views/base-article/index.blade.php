@extends('layouts.app')

@section('template_title')
    {{__('Artículos Base')}}
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Base Article') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('articulos-base.create') }}"
                                   class="btn btn-primary btn-sm float-right" data-placement="left">
                                    {{ __('Create New') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @elseif ($message = Session::get('error'))
                        <div class="alert alert-danger">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                <tr>
                                    <th>#</th>
                                    <th>{{__('Id Artículo')}}</th>
                                    <th>{{__('Directorio Archivo Blob - hash/sha256')}}</th>
                                    <th>{{__('Especificaciones artículo - Json')}}</th>
                                    <th>{{__('Tallas - Json')}}</th>
                                    <th>{{__('Precio $COP')}}</th>

                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($baseArticles as $baseArticle)
                                    <tr>
                                        <td>{{ ++$i }}</td>

                                        <td>{{ $baseArticle->article_id }}</td>
                                        <td>{!! $filesManager->getImage($baseArticle->article_blob,['codec'=>'']) !!}</td>
                                        <td>{{ $baseArticle->material_json }}</td>
                                        <td>{{ $baseArticle->sizes_json }}</td>
                                        <td>{{ $baseArticle->price }}</td>

                                        <td>
                                            <form
                                                action="{{ route('articulos-base.destroy',$baseArticle->article_id) }}"
                                                method="POST">
                                                <a class="btn btn-sm btn-primary "
                                                   href="{{ route('articulos-base.show',$baseArticle->article_id) }}"><i
                                                        class="fa fa-fw fa-eye"></i> Show</a>
                                                <a class="btn btn-sm btn-success"
                                                   href="{{ route('articulos-base.edit',$baseArticle->article_id) }}"><i
                                                        class="fa fa-fw fa-edit"></i> Edit</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"><i
                                                        class="fa fa-fw fa-trash"></i> Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $baseArticles->links() !!}
            </div>
        </div>
    </div>
@endsection
