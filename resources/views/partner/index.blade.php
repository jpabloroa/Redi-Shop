@extends('layouts.app')

@section('template_title')
    <div class="d-flex justify-content-between">
        <h4 class="mb-0 py-1">{{__('Socios')}}</h4>
        <a class="btn btn-primary " href="{{ route('socios.create') }}"> {{__('Nuevo')}}</a>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                    <!-- <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                {{ __('Socio') }}
                        </span>
                        <div class="float-right">
                            <a href="{{ route('socios.create') }}" class="btn btn-primary btn-sm float-right"
                                   data-placement="left">
                                    {{ __('Create New') }}
                        </a>
                    </div>
                    </div>-->
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <h5>{!! $message !!}</h5>
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

                                    <th>{{__('Nombre de Marca')}}</th>
                                    <th>{{__('Nombre de socio')}}</th>
                                    <th>{{__('Teléfono')}}</th>
                                    <th>{{__('Dirección')}}</th>
                                    <th>{{__('Actualizado el:')}}</th>

                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($partners as $partner)
                                    <tr>
                                        <td>{{ ++$i }}</td>

                                        <td>{{ $partner->brand_name }}</td>
                                        <td>{{ $partner->username }}</td>
                                        <td>{{ $partner->phone }}</td>
                                        <td>{{ $partner->address }}</td>
                                        <td>{{ $partner->updated_at }}</td>


                                        <td>
                                            <form action="{{ route('socios.destroy',$partner->username) }}"
                                                  method="POST">
                                                <a class="btn btn-sm btn-primary "
                                                   href="{{ route('socios.show',$partner->username) }}"><i
                                                        class="fa fa-fw fa-eye"></i> {{__('Ver')}}</a>
                                                <a class="btn btn-sm btn-success"
                                                   href="{{ route('socios.edit',$partner->username) }}"><i
                                                        class="fa fa-fw fa-edit"></i> {{__('Editar')}}</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"><i
                                                        class="fa fa-fw fa-trash"></i> {{__('Eliminar')}}
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
                {!! $partners->links() !!}
            </div>
        </div>
    </div>
@endsection
