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
    public $brandId;

    public function __construct($brand, $brandId = null, $product = null)
    {
        $this->brand = str_replace(["&#039;", '&amp;', '&quot;',], ["'", '&', '"',], $brand);
        $this->brandId = $brandId;
        $this->product = str_replace(["&#039;", '&amp;', '&quot;',], ["'", '&', '"',], $product);
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
