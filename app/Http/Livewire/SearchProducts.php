<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;

class SearchProducts extends Component
{
    use WithPagination;

    public $term;
    public $direction = 'asc';
    public $sortBy = 'name';

    public function doSort($field)
    {
        $this->sortBy = $field;
        if ($this->direction == 'asc') $this->direction = 'desc';
        else $this->direction = 'asc';
    }

    public function render()
    {
        return view('livewire.search-products', [
            'products' => Product::when($this->term, function ($query, $term){
                return $query->where('name', 'LIKE', "%$term%")
                    ->orWhere('code', 'LIKE', "%$term%");
            })->orderBy($this->sortBy, $this->direction)->paginate(10)
        ]);
    }
}
