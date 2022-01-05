@extends('layouts.app')

@section('template_title')
    Base Article
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
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                <tr>
                                    <th>No</th>

                                    <th>Article Id</th>
                                    <th>Article Blob</th>
                                    <th>Material Json</th>
                                    <th>Sizes Json</th>
                                    <th>Price</th>

                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($baseArticles as $baseArticle)
                                    <tr>
                                        <td>{{ ++$i }}</td>

                                        <td>{{ $baseArticle->article_id }}</td>
                                        <td>{{ $baseArticle->article_blob }}</td>
                                        <td>{{ $baseArticle->material_json }}</td>
                                        <td>{{ $baseArticle->sizes_json }}</td>
                                        <td>{{ $baseArticle->price }}</td>

                                        <td>
                                            <form
                                                action="{{ route('articulos-base.destroy',$baseArticle->id) }}"
                                                method="POST">
                                                <a class="btn btn-sm btn-primary "
                                                   href="{{ route('articulos-base.show',$baseArticle->id) }}"><i
                                                        class="fa fa-fw fa-eye"></i> Show</a>
                                                <a class="btn btn-sm btn-success"
                                                   href="{{ route('articulos-base.edit',$baseArticle->id) }}"><i
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
