<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('article_id') }}
            {{ Form::text('article_id', $article->article_id, ['class' => 'form-control' . ($errors->has('article_id') ? ' is-invalid' : ''), 'placeholder' => 'Article Id']) }}
            {!! $errors->first('article_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('creator_id') }}
            {{ Form::text('creator_id', $article->creator_id, ['class' => 'form-control' . ($errors->has('creator_id') ? ' is-invalid' : ''), 'placeholder' => 'Creator Id']) }}
            {!! $errors->first('creator_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('article_blob') }}
            {{ Form::text('article_blob', $article->article_blob, ['class' => 'form-control' . ($errors->has('article_blob') ? ' is-invalid' : ''), 'placeholder' => 'Article Blob']) }}
            {!! $errors->first('article_blob', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('base_article_id') }}
            {{ Form::text('base_article_id', $article->base_article_id, ['class' => 'form-control' . ($errors->has('base_article_id') ? ' is-invalid' : ''), 'placeholder' => 'Base Article Id']) }}
            {!! $errors->first('base_article_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('price') }}
            {{ Form::text('price', $article->price, ['class' => 'form-control' . ($errors->has('price') ? ' is-invalid' : ''), 'placeholder' => 'Price']) }}
            {!! $errors->first('price', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('stock') }}
            {{ Form::text('stock', $article->stock, ['class' => 'form-control' . ($errors->has('stock') ? ' is-invalid' : ''), 'placeholder' => 'Stock']) }}
            {!! $errors->first('stock', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>