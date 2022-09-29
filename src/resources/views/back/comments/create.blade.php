<?php
$title = 'コメント作成';
?>
@extends('back.layouts.base')

@section('content')
<div class="card-header">{{ $title }}</div>
<div class="card-body">
    {{ Form::open(['route' => ['back.comments.store', $post->id]]) }}
    @include('back.comments._form')
    {{ Form::close() }}
</div>
@endsection