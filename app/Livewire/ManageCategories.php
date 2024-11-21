<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class ManageCategories extends Component
{
    use WithPagination;

    public $currentUrl;

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
        Category::find($id)->delete();

        return $this->redirect(route('categories'), navigate: true);
    }

    public function render()
    {
        $current_url = url()->current();
        $explode_url = explode('/', $current_url);

        $this->currentUrl = $explode_url[3] . ' ' . $explode_url[4];

        return view('livewire.manage-categories', [
            'categories' => Category::search($this->search)
                ->orderBy($this->sortByColumn, $this->sortDirection)
                ->paginate($this->perPage)
        ])->layout('admin-layout');
    }
}
