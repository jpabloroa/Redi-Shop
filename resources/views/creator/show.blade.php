@extends('layouts.app')

@section('template_title')
    {{ $creator->name ?? 'Show Creator' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Creator</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('creadores.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Username:</strong>
                            {{ $creator->username }}
                        </div>
                        <div class="form-group">
                            <strong>Phone:</strong>
                            {{ $creator->phone }}
                        </div>
                        <div class="form-group">
                            <strong>Brand Name:</strong>
                            {{ $creator->brand_name }}
                        </div>
                        <div class="form-group">
                            <strong>Landing Conf Json:</strong>
                            {{ $creator->landing_conf_json }}
                        </div>
                        <div class="form-group">
                            <strong>Location:</strong>
                            {{ $creator->location }}
                        </div>
                        <div class="form-group">
                            <strong>Address:</strong>
                            {{ $creator->address }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
