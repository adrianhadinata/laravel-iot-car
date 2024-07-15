<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Navlink extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public bool $active = false
    ) {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.navigations.navlink');
    }
}
