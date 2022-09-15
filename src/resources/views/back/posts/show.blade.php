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
