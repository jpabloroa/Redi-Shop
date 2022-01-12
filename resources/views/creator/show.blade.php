@extends('layouts.app')

@section('template_title')
    <div class="d-flex justify-content-between">
        <h4 class="mb-0 py-1">Ver: {{$creator->username}}</h4>
        <a class="btn btn-primary " href="{{ route('creadores.index') }}"> {{__('Atrás')}}</a>
    </div>
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">

                    <!--<div class="float-left">
                            <span class="card-title">Show Creator</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('creadores.index') }}"> Back</a>
                        </div>-->
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>{{__('Ícono')}}:</strong>
                            {!! $filesManager->getImage($creator->icon, ['codec' => '']) !!}
                        </div>
                        <div class="form-group">
                            <strong>{{__('Usuario')}}:</strong>
                            {{ $creator->username }}
                        </div>
                        <div class="form-group">
                            <strong>{{__('Teléfono')}}:</strong>
                            {{ $creator->phone }}
                        </div>
                        <div class="form-group">
                            <strong>{{__('Nombre de Marca')}}:</strong>
                            {{ $creator->brand_name }}
                        </div>
                        <div class="form-group">
                            <strong>{{__('Configuración Landing Page (JSON)')}}:</strong>
                            {{ $creator->landing_conf_json }}
                        </div>
                        <div class="form-group">
                            <strong>{{__('Ubicación')}}:</strong>
                            {{ $creator->location }}
                        </div>
                        <div class="form-group">
                            <strong>{{__('Dirección de correspondencia')}}:</strong>
                            {{ $creator->address }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
