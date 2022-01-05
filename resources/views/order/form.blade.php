<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('order_id') }}
            {{ Form::text('order_id', $order->order_id, ['class' => 'form-control' . ($errors->has('order_id') ? ' is-invalid' : ''), 'placeholder' => 'Order Id']) }}
            {!! $errors->first('order_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('article_id') }}
            {{ Form::text('article_id', $order->article_id, ['class' => 'form-control' . ($errors->has('article_id') ? ' is-invalid' : ''), 'placeholder' => 'Article Id']) }}
            {!! $errors->first('article_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('creator_id') }}
            {{ Form::text('creator_id', $order->creator_id, ['class' => 'form-control' . ($errors->has('creator_id') ? ' is-invalid' : ''), 'placeholder' => 'Creator Id']) }}
            {!! $errors->first('creator_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('value_added_taxes') }}
            {{ Form::text('value_added_taxes', $order->value_added_taxes, ['class' => 'form-control' . ($errors->has('value_added_taxes') ? ' is-invalid' : ''), 'placeholder' => 'Value Added Taxes']) }}
            {!! $errors->first('value_added_taxes', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('partner_id') }}
            {{ Form::text('partner_id', $order->partner_id, ['class' => 'form-control' . ($errors->has('partner_id') ? ' is-invalid' : ''), 'placeholder' => 'Partner Id']) }}
            {!! $errors->first('partner_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('delivery_address') }}
            {{ Form::text('delivery_address', $order->delivery_address, ['class' => 'form-control' . ($errors->has('delivery_address') ? ' is-invalid' : ''), 'placeholder' => 'Delivery Address']) }}
            {!! $errors->first('delivery_address', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('delivery_information') }}
            {{ Form::text('delivery_information', $order->delivery_information, ['class' => 'form-control' . ($errors->has('delivery_information') ? ' is-invalid' : ''), 'placeholder' => 'Delivery Information']) }}
            {!! $errors->first('delivery_information', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('estimated_delivery_at') }}
            {{ Form::text('estimated_delivery_at', $order->estimated_delivery_at, ['class' => 'form-control' . ($errors->has('estimated_delivery_at') ? ' is-invalid' : ''), 'placeholder' => 'Estimated Delivery At']) }}
            {!! $errors->first('estimated_delivery_at', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('delivered_at') }}
            {{ Form::text('delivered_at', $order->delivered_at, ['class' => 'form-control' . ($errors->has('delivered_at') ? ' is-invalid' : ''), 'placeholder' => 'Delivered At']) }}
            {!! $errors->first('delivered_at', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>