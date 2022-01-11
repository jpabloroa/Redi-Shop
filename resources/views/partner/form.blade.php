<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            <label class="mt-3">{{__('Email')}}</label>
            {{ Form::text('username', $partner->username, ['class' => 'form-control' . ($errors->has('username') ? ' is-invalid' : ''), 'placeholder' => __('ej. alguien@ejemplo.com')]) }}
            {!! $errors->first('username', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            <label class="mt-3">{{__('Nombre de marca')}}</label>
            {{ Form::text('brand_name', $partner->brand_name, ['class' => 'form-control' . ($errors->has('brand_name') ? ' is-invalid' : ''), 'placeholder' => __('ej. Mi Marca Inc.')]) }}
            {!! $errors->first('brand_name', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            <label class="mt-3">{{__('Teléfono')}}</label>
            {{ Form::text('phone', $partner->phone, ['class' => 'form-control' . ($errors->has('phone') ? ' is-invalid' : ''), 'placeholder' => __('')]) }}
            {!! $errors->first('phone', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            <label class="mt-3">{{__('Dirección')}}</label>
            {{ Form::text('address', $partner->address, ['class' => 'form-control' . ($errors->has('address') ? ' is-invalid' : ''), 'placeholder' => __('')]) }}
            {!! $errors->first('address', '<div class="invalid-feedback">:message</p>') !!}
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="w-full btn btn-primary">{{__('Enviar')}}</button>
    </div>
</div>
