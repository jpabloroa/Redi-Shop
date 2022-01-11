@extends('layouts.app')

@section('template_title')
    <div class="d-flex justify-content-between">
        <h4 class="mb-0 py-1">Ver: {{$partner->username}}</h4>
        <a class="btn btn-primary " href="{{ route('socios.index') }}"> {{__('Atrás')}}</a>
    </div>
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                    <!--<div class="float-left">
                            <span class="card-title">{{$partner->name}}</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('socios.index') }}"> {{__('Atrás')}}</a>
                        </div>-->
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>{{__('Nombre de marca')}}:</strong>
                            {{ $partner->brand_name }}
                        </div>
                        <div class="form-group">
                            <strong>{{__('Nombre socio')}}:</strong>
                            {{ $partner->username }}
                        </div>
                        <div class="form-group">
                            <strong>{{__('Dirección')}}:</strong>
                            {{ $partner->address }}
                        </div>
                        <div class="form-group">
                            <strong>{{__('Teléfono')}}:</strong>
                            {{ $partner->phone }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
