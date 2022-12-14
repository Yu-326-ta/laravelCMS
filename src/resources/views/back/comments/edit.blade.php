<?php
$title = 'コメント編集';
?>
@extends('back.layouts.base')
 
@section('content')
<div class="card-header">コメント編集</div>
<div class="card-body">
    {!! Form::model($comment, [
        'route' => ['back.comments.update', ['id' => $id, 'comment' => $commentId]],
        'method' => 'put'
    ]) !!}
    @include('back.comments._form')
    {!! Form::close() !!}
</div>
@endsection