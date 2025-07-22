<?php

namespace App\View\Components\Frontend\Posts;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Card extends Component
{
    /**
     * Create a new component instance.
     */
    public $title;
    public $excerpt;
    public $image;
    public $author;
    public $timestamp;
    public $href;
    public $categories;
    public function __construct($title,$excerpt,$image,$author,$timestamp,$href,$categories)
    {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->image = $image;
        $this->author = $author;
        $this->timestamp = $timestamp;
        $this->href = $href;
        $this->categories = $categories;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.frontend.posts.card');
    }
}
