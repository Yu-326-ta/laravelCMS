<?php
/**
 * @var \App\Models\Tag $tag
 */
?>
<div class="form-group row">
    {{ Form::label('comment', 'コメント', ['class' => 'col-sm-2 col-form-label']) }}
    <div class="col-sm-10">
        {{ Form::text('comment', null, [
            'class' => 'form-control' . ($errors->has('comment') ? ' is-invalid' : ''),
            'required'
        ]) }}
        @error('comment')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>

<div class="form-group row">
    {{ Form::label('published_at', '公開日', ['class' => 'col-sm-2 col-form-label']) }}
    <div class="col-sm-10">
        {{ Form::datetime('published_at',
            isset($comment->published_at)
                ? $comment->published_at->format('Y-m-d H:i')
                : now()->format('Y-m-d H:i'),
        [
            'class' => 'form-control' . ($errors->has('published_at') ? ' is-invalid' : '')
        ]) }}
        @error('published_at')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-10">
        <button type="submit" class="btn btn-primary">保存</button>
        {{ link_to_route('back.posts.show', '一覧へ戻る', $post, ['class' => 'btn btn-secondary']) }}
    </div>
</div>