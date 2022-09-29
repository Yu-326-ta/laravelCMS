<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $post = Post::publicFindById($id);
        return view('back.comments.create', compact('id', 'post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, int $id)
    {
        $comment = Comment::create($request->all());

        if ($comment) {
            return redirect()
                ->route('back.comments.edit', $comment)
                ->withSuccess('コメントを作成しました。');
        } else {
            return redirect()
                ->route('back.comments.create')
                ->withError('コメントの作成に失敗しました。');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id, int $commentId)
    {
        $comment = Comment::findOrFail($commentId);
        return view('back.comments.edit', compact('comment', 'id', 'commentId'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id, int $commentId)
    {
        $comment = Comment::findOrFail($commentId);

        if ($comment->update($request->all())) {
            $flash = ['success' => 'コメントを更新しました。'];
        } else {
            $flash = ['error' => 'コメントの更新に失敗しました'];
        }

        return redirect()
        ->route('back.comments.edit', ['id' => $id, 'comment' => $commentId])
        ->with($flash);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id, int $commentId)
    {
        $comment = Comment::findOrFail($commentId);
        if ($comment->delete()) {
            $flash = ['success' => 'コメントを削除しました。'];
        } else {
            $flash = ['error' => 'コメントの削除に失敗しました'];
        }
     
        return redirect()
            ->route('back.posts.show', $id)
            ->with($flash);
    }
}
