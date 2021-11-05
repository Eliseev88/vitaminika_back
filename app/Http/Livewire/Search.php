<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Order;
use Livewire\WithPagination;

class Search extends Component
{
    use WithPagination;

    public $term;
    public $direction = 'desc';
    public $sortBy = 'updated_at';

    public function doSort($field)
    {
        $this->sortBy = $field;
        if ($this->direction == 'desc') $this->direction = 'asc';
        else $this->direction = 'desc';
    }

    public function render()
    {
        return view('livewire.search_order', [
            'orders' => Order::when($this->term, function ($query, $term){
                return $query->where('id', 'LIKE', "%$term%");
            })->orderBy($this->sortBy, $this->direction)->paginate(10)
        ]);
    }
}
