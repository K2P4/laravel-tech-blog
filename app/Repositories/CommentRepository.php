<?php

namespace App\Repositories;

use App\Models\Comment;
use App\Models\Blog;

class CommentRepository
{
    public function createForBlog(Blog $blog, array $data): Comment
    {
        $data['blog_id'] = $blog->id;
        return Comment::create($data);
    }

    public function delete(Comment $comment): bool
    {
        return $comment->delete();
    }
}
