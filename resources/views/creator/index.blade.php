@extends('layouts.app')

@section('template_title')
    <div class="d-flex justify-content-between">
        <h4 class="mb-0 py-1">{{__('Creadores')}}</h4>
        <a class="btn btn-primary " href="{{ route('creadores.create') }}"> {{__('Nuevo')}}</a>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                    <!--<div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Creator') }}
                        </span>

                        <div class="float-right">
                            <a href="{{ route('creadores.create') }}" class="btn btn-primary btn-sm float-right"
                                   data-placement="left">
                                    {{ __('Create New') }}
                        </a>
                    </div>
                </div>-->
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

                                    <th>{{__('Usuario')}}</th>
                                    <th>{{__('Teléfono')}}</th>
                                    <th>{{__('Nombre de Marca')}}</th>
                                    <th>{{__('Ícono (BMP)')}}</th>
                                    <th>{{__('Configuración del landing')}}</th>
                                    <th>{{__('Ubicación')}}</th>
                                    <th>{{__('Dirección de correspondencia')}}</th>

                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($creators as $creator)
                                    <tr>
                                        <td>{{ ++$i }}</td>

                                        <td>{{ $creator->username }}</td>
                                        <td>{{ $creator->phone }}</td>
                                        <td>{{ $creator->brand_name }}</td>
                                        <td>{!! $filesManager->getImage($creator->icon,['codec'=>'']) !!}</td>
                                        <td>{{ $creator->landing_conf_json }}</td>
                                        <td>{{ $creator->location }}</td>
                                        <td>{{ $creator->address }}</td>

                                        <td>
                                            <form action="{{ route('creadores.destroy',$creator->username) }}" method="POST">
                                                <a class="btn btn-sm btn-primary "
                                                   href="{{ route('creadores.show',$creator->username) }}"><i
                                                        class="fa fa-fw fa-eye"></i> {{__('Ver')}}</a>
                                                <a class="btn btn-sm btn-success"
                                                   href="{{ route('creadores.edit',$creator->username) }}"><i
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
                {!! $creators->links() !!}
            </div>
        </div>
    </div>
@endsection
