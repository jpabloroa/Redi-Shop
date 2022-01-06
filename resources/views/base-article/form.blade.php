<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('article_id') }}
            {{ Form::text('article_id', $baseArticle->article_id, ['class' => 'form-control' . ($errors->has('article_id') ? ' is-invalid' : ''), 'placeholder' => __('Id Artículo')]) }}
            {!! $errors->first('article_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
        {{ Form::label('article_blob') }}
        <!--{{ Form::text('article_blob', $baseArticle->article_blob, ['class' => 'form-control' . ($errors->has('article_blob') ? ' is-invalid' : ''), 'placeholder' => __('Directorio Archivo Blob - hash/sha256')]) }}-->
            <input type="file" class="form-control" placeholder="Article Blob" name="article_blob" id="article_blob">
            {!! $errors->first('article_blob', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('specs_json') }}
            {{ Form::text('specs_json', $baseArticle->specs_json, ['class' => 'form-control' . ($errors->has('specs_json') ? ' is-invalid' : ''), 'placeholder' => __('Especificaciones artículo - Json')]) }}
            {!! $errors->first('specs_json', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('sizes_json') }}
            {{ Form::text('sizes_json', $baseArticle->sizes_json, ['class' => 'form-control' . ($errors->has('sizes_json') ? ' is-invalid' : ''), 'placeholder' => __('Tallas - Json')]) }}
            {!! $errors->first('sizes_json', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('price') }}
            {{ Form::text('price', $baseArticle->price, ['class' => 'form-control' . ($errors->has('price') ? ' is-invalid' : ''), 'placeholder' => __('Precio $COP')]) }}
            {!! $errors->first('price', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
