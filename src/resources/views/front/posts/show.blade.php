<?php
/**
 * @var \App\Models\Post $post
 */
$title = '投稿詳細';
?>
@extends('front.layouts.base')
 
@section('content')
<div class="card-header">{{ $title }}</div>
<div class="card-body">
    <h2>{{ $post->title }}</h2>
    <time>{{ $post->published_format  }}</time>
    <div>{!! nl2br(e($post->body)) !!}</div>
    {!! link_to_route(
        'front.home', '一覧へ戻る', null,
        ['class' => 'btn btn-secondary'])
    !!}
</div>
@endsection

<?php
/**
 * @var Illuminate\Pagination\LengthAwarePaginator|\App\Models\Post[] $posts
 */
$title = 'コメント一覧';
?>
@section('comment')
<div class="card-header">{{ $title }}</div>
<div class="card-body">
    @if($comments->count() <= 0)
        <p>表示するコメントはありません。</p>
    @else
        <table class="table">
            @foreach($comments as $comment)
                <tr>
                    <td>{{ $comment->published_at->format('Y年m月d日') }}</td>
                    <td>{{ $comment->comment}}</td>
                </tr>
            @endforeach
        </table>
        <div class="d-flex justify-content-center">
            {{ $comments->links() }}
        </div>
    @endif
</div>
@endsection