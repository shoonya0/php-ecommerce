<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class ManageCategories extends Component
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
        return view('livewire.manage-categories', [
            'categories' => Category::search($this->search)
                ->orderBy($this->sortByColumn, $this->sortDirection)
                ->paginate($this->perPage)
        ])->layout('admin-layout');
    }
}
