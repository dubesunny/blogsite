<?php

namespace App\View\Components\admin\dashboard;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Card extends Component
{
    /**
     * Create a new component instance.
     */
    public $color;
    public $name;
    public $records;
    public $icon;
    public function __construct($color,$name,$records,$icon)
    {
        $this->color = $color;
        $this->name = $name;
        $this->records = $records;
        $this->icon = $icon;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.dashboard.card');
    }
}
