@extends('layouts.app')

@section('template_title')
    {{ $order->article_id ?? 'Show Order' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Order</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('pedidos.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Order Id:</strong>
                            {{ $order->order_id }}
                        </div>
                        <div class="form-group">
                            <strong>Article Id:</strong>
                            {{ $order->article_id }}
                        </div>
                        <div class="form-group">
                            <strong>Creator Id:</strong>
                            {{ $order->creator_id }}
                        </div>
                        <div class="form-group">
                            <strong>Value Added Taxes:</strong>
                            {{ $order->value_added_taxes }}
                        </div>
                        <div class="form-group">
                            <strong>Partner Id:</strong>
                            {{ $order->partner_id }}
                        </div>
                        <div class="form-group">
                            <strong>Delivery Address:</strong>
                            {{ $order->delivery_address }}
                        </div>
                        <div class="form-group">
                            <strong>Delivery Information:</strong>
                            {{ $order->delivery_information }}
                        </div>
                        <div class="form-group">
                            <strong>Estimated Delivery At:</strong>
                            {{ $order->estimated_delivery_at }}
                        </div>
                        <div class="form-group">
                            <strong>Delivered At:</strong>
                            {{ $order->delivered_at }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
