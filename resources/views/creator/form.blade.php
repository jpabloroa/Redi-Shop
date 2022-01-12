<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            <input type="file" class="mt-3 form-control" placeholder="{{__('Ícono')}}" name="icon"
                   id="icon">
            {!!(!is_null($creator->icon))? '<input type="hidden" name="existing_icon" value="'.$creator->icon.'">':'';!!}
            {!! $errors->first('icon', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            <label class="mt-3">{{__('Usuario')}}</label>
            {{ Form::text('username', $creator->username, ['class' => 'form-control' . ($errors->has('username') ? ' is-invalid' : ''), 'placeholder' => 'Username']) }}
            {!! $errors->first('username', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            <label class="mt-3">{{__('Teléfono')}}</label>
            {{ Form::text('phone', $creator->phone, ['class' => 'form-control' . ($errors->has('phone') ? ' is-invalid' : ''), 'placeholder' => 'Teléfono']) }}
            {!! $errors->first('phone', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            <label class="mt-3">{{__('Nombre de marca')}}</label>
            {{ Form::text('brand_name', $creator->brand_name, ['class' => 'form-control' . ($errors->has('brand_name') ? ' is-invalid' : ''), 'placeholder' => 'ej. Mi Marca']) }}
            {!! $errors->first('brand_name', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            <label class="mt-3">{{__('Configuración Landing Page')}}</label>
            {{ Form::text('landing_conf_json', $creator->landing_conf_json, ['class' => 'form-control' . ($errors->has('landing_conf_json') ? ' is-invalid' : ''), 'placeholder' => 'Formato: JSON']) }}
            {!! $errors->first('landing_conf_json', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            <label class="mt-3">{{__('Dirección de correspondencia')}}</label>
            {{ Form::text('address', $creator->address, ['class' => 'form-control' . ($errors->has('address') ? ' is-invalid' : ''), 'placeholder' => 'Escribe o activa la ubicación']) }}
            {!! $errors->first('address', '<div class="invalid-feedback">:message</p>') !!}
        </div>

        <input type="hidden" id="input-latitude" name="latitude">
        <input type="hidden" id="input-longitude" name="longitude">

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="w-full btn mt-3 btn-primary">{{__('Enviar')}}</button>
    </div>
</div>
