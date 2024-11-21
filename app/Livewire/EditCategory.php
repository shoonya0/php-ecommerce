<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;

class EditCategory extends Component
{
    public $currentUrl;

    public $category_details;

    public $category_name;

    public function mount($id)
    {
        $this->category_details = Category::find($id);
        $this->category_name = $this->category_details->name;
    }

    public function update()
    {
        $this->validate([
            'category_name' => 'required',
        ]);

        $this->category_details->update([
            'name' => $this->category_name,
        ]);

        return $this->redirect('/manage/categories', navigate: true);
    }

    public function render()
    {
        $current_url = url()->current();
        // dd($current_url);
        $explode_url = explode('/', $current_url);
        $this->currentUrl = $explode_url[3] . ' ' . $explode_url[4];

        return view('livewire.edit-category')
            ->layout('admin-layout');
    }
}
