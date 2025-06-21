<?php

namespace App\View\Components\admin\sidebar;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Links extends Component
{
    /**
     * Create a new component instance.
     */
    public $href;
    public $name;
    public function __construct($href,$name)
    {
        $this->href = $href;
        $this->name = $name;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.sidebar.links');
    }
}
