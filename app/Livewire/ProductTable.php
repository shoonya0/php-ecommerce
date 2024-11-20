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

    public function delete($id)
    {

        $product = Product::find($id);

        if ($product->image) {
            $imagePath1 = storage_path('app/private/' . $product->image);
            $imagePath2 = storage_path('app/private/livewire-temp/' . basename($product->image));

            if (file_exists($imagePath1)) {
                unlink($imagePath1);
            }
            if (file_exists($imagePath2)) {
                unlink($imagePath2);
                // dd($imagePath2 . " deleted"); // Debugging line
            }
            // dd($imagePath1 . " not deleted"); // Debugging line
        }

        $product->delete();

        return $this->redirect(route('products'), navigate: true);
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
