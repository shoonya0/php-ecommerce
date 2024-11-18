<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductTable extends Component
{
    use WithPagination;

    public $perPage = 5;

    public $search = '';

    public $sortByColumn = 'created_at';

    public $sortDirection = 'ASC';

    public function setSortFunctionality($columnName)
    {
        if ($this->sortByColumn === $columnName) {
            $this->sortDirection = $this->sortDirection === 'ASC' ? 'DESC' : 'ASC';
            return;
        }

        $this->sortByColumn = $columnName;
        $this->sortDirection = 'ASC';
    }

    public function render()
    {
        // return view('livewire.product-table');

        // return list of products
        return view('livewire.product-table', [
            'products' => Product::search($this->search)
                ->orderBy($this->sortByColumn, $this->sortDirection)
                ->paginate($this->perPage)
        ]);
    }
}
