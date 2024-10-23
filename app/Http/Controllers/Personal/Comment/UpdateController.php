<?php

namespace App\Http\Controllers\Personal\Comment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Personal\Comment\UpdateRequest;
use App\Models\PostUserComment;

class UpdateController extends Controller
{

    public function update(PostUserComment $comment,UpdateRequest $request)
    {

        $data = $request->validated();

        $comment->update($data);

        return redirect()->route('personal.comment.index');
    }
}
