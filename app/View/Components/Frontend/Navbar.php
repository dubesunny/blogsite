<?php

namespace App\View\Components\Frontend;

use App\Models\Category;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Navbar extends Component
{
    /**
     * Create a new component instance.
     */
    public $id;
    public $height;
    public function __construct($id='',$height)
    {
        $this->id = $id;
        $this->height = $height;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $categories = Category::whereStatus('active')->get();
        return view('components.frontend.navbar',compact('categories'));
    }
}
