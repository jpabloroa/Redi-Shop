@extends('layouts.app')

@section('template_title')
    Order
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Order') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('pedidos.create') }}" class="btn btn-primary btn-sm float-right"
                                   data-placement="left">
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

                                    <th>Order Id</th>
                                    <th>Article Id</th>
                                    <th>Creator Id</th>
                                    <th>Value Added Taxes</th>
                                    <th>Partner Id</th>
                                    <th>Delivery Address</th>
                                    <th>Delivery Information</th>
                                    <th>Estimated Delivery At</th>
                                    <th>Delivered At</th>

                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ ++$i }}</td>

                                        <td>{{ $order->order_id }}</td>
                                        <td>{{ $order->article_id }}</td>
                                        <td>{{ $order->creator_id }}</td>
                                        <td>{{ $order->value_added_taxes }}</td>
                                        <td>{{ $order->partner_id }}</td>
                                        <td>{{ $order->delivery_address }}</td>
                                        <td>{{ $order->delivery_information }}</td>
                                        <td>{{ $order->estimated_delivery_at }}</td>
                                        <td>{{ $order->delivered_at }}</td>

                                        <td>
                                            <form action="{{ route('pedidos.destroy',$order->order_id) }}"
                                                  method="POST">
                                                <a class="btn btn-sm btn-primary "
                                                   href="{{ route('pedidos.show',$order->order_id) }}"><i
                                                        class="fa fa-fw fa-eye"></i> Show</a>
                                                <a class="btn btn-sm btn-success"
                                                   href="{{ route('pedidos.edit',$order->order_id) }}"><i
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
                {!! $orders->links() !!}
            </div>
        </div>
    </div>
@endsection
