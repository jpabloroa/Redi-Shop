@extends('layouts.app')

@section('template_title')
    {{ $partner->name ?? 'Show Partner' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Partner</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('socios.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Partner Id:</strong>
                            {{ $partner->partner_id }}
                        </div>
                        <div class="form-group">
                            <strong>Brand Name:</strong>
                            {{ $partner->brand_name }}
                        </div>
                        <div class="form-group">
                            <strong>Address:</strong>
                            {{ $partner->address }}
                        </div>
                        <div class="form-group">
                            <strong>Phone:</strong>
                            {{ $partner->phone }}
                        </div>
                        <div class="form-group">
                            <strong>Email:</strong>
                            {{ $partner->email }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
