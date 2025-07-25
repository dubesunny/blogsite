<?php

namespace App\View\Components\admin\sidebar;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Item extends Component
{
    /**
     * Create a new component instance.
     */
    public $href;
    public $icon;
    public $name;
    public function __construct($href,$icon,$name)
    {
        $this->href = $href;
        $this->icon = $icon;
        $this->name = $name;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.sidebar.item');
    }
}
