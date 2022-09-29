<?php
/**
 * @var \App\Models\Post $post
 */
$title = '投稿詳細';
?>
@extends('back.layouts.base')
 
@section('content')
<div class="card-header">{{ $title }}</div>
<div class="card-body">
    <h2>{{ $post->title }}</h2>
    <time>{{ $post->published_format  }}</time>
    <div>{!! nl2br(e($post->body)) !!}</div>
    {!! link_to_route(
        'back.posts.index', '一覧へ戻る', null,
        ['class' => 'btn btn-secondary'])
    !!}
</div>
@endsection
 
@section('comment')
<div class="card-header">コメント一覧</div>
<div class="card-body">
    {{ link_to_route('back.comments.create', 'コメント作成', $post, ['class' => 'btn btn-primary mb-3']) }}
    @if(0 < $comments->count())
        <table class="table table-striped table-bordered table-hover table-sm">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">コメント</th>
                    <th scope="col" style="width: 9em">公開日</th>
                    <th scope="col" style="width: 12em">編集</th>
                </tr>
            </thead>
            <tbody>
            @foreach($comments as $comment)
                <tr>
                    <td>{{ $comment->id }}</td>
                    <td>{{ $comment->comment }}</td>
                    <td>{{ $comment->published_at->format('Y年m月d日') }}</td>
                    <td class="d-flex justify-content-center">
                        {{ link_to_route('back.comments.edit', '編集', ['id' => $post->id, 'comment' => $comment->id], [
                            'class' => 'btn btn-secondary btn-sm m-1'
                        ]) }}
                        {{ Form::model($comment, [
                            'route' => ['back.comments.destroy', ['id' => $post->id, 'comment' => $comment->id]],
                            'method' => 'delete'
                        ]) }}
                            {{ Form::submit('削除', [
                                'onclick' => "return confirm('本当に削除しますか?')",
                                'class' => 'btn btn-danger btn-sm m-1'
                            ]) }}
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{ $comments->links() }}
        </div>
    @endif
</div>
@endsection
