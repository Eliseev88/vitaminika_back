<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Breadcrumps extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $brand;
    public $product;

    public function __construct($brand, $product = null)
    {
        $this->brand = str_replace("&#039;", "'", $brand);
        $this->product = str_replace('&amp;', '&', $product);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.breadcrumps');
    }
}
