@extends('layouts.app')

@section('template_title')
    <div class="d-flex justify-content-between">
        <h4 class="mb-0 py-1">{{__('Nuevo socio')}}</h4>
        <a class="btn btn-primary " href="{{ route('socios.index') }}"> {{__('Atrás')}}</a>
    </div>
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                    <!--<span class="card-title">{{__('Nuevo Socio')}}</span>-->
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('socios.store') }}" role="form"
                              enctype="multipart/form-data">
                            @csrf

                            @include('partner.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
