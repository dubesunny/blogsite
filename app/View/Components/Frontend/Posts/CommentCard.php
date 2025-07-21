<?php

namespace App\View\Components\Frontend\Posts;

use Carbon\Carbon;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CommentCard extends Component
{
    /**
     * Create a new component instance.
     */
    public $id;
    public $userId;
    public $username;
    public $timestamp;
    public $comment;
    public $postId;
    public $parentId;
    public $repliedTo;
    public $createdAt;
    public function __construct($id,$userId,$username,$timestamp,$comment,$postId,$parentId,$repliedTo = '',$createdAt)
    {
        $this->id = $id;
        $this->userId = $userId;
        $this->username = $username;
        $this->timestamp = $timestamp;
        $this->comment = $comment;
        $this->postId = $postId;
        $this->parentId = $parentId;
        $this->repliedTo = $repliedTo;
        $this->createdAt = $createdAt;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.frontend.posts.comment-card');
    }
}
