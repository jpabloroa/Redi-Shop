@extends('layouts.app')

@section('template_title')
    <div class="d-flex justify-content-between">
        <h4 class="mb-0 py-1">{{__('Actualizar datos')}}</h4>
        <a class="btn btn-primary " href="{{ route('socios.index') }}"> {{__('Atrás')}}</a>
    </div>
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                    <!--<span class="card-title">{{__('Actualizar datos')}}</span>-->
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('socios.update', $partner->username) }}" role="form"
                              enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('partner.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
