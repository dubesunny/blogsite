<?php

namespace App\View\Components\admin\blocks;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class style extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.blocks.style');
    }
}
