<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddProductForm extends Component
{
    use WithFileUploads;

    public $currentUrl;

    public $product_name = '';

    public $photo = '';

    public $product_price = '';

    public $product_description = '';

    public $category_id = '';

    public $all_categories;

    // to get categories
    public function mount()
    {
        $this->all_categories = Category::all();
    }

    public function save()
    {
        $this->validate([
            'product_name' => 'required',
            'photo' => 'required|mimes:jpg,png,jpeg|max:3024',
            'product_price' => 'required|integer',
            'product_description' => 'required',
            'category_id' => 'required',
        ]);

        if (is_string($this->photo)) {
            $this->photo = null; // or handle the error accordingly
        }

        // store the photo in the storage/app/public/photos directory
        $path = $this->photo->store('photos');

        // create an instance of the product model
        $product = new Product();

        $product->name = $this->product_name;
        $product->image = $path;
        $product->price = $this->product_price;
        $product->description = $this->product_description;
        $product->category_id = $this->category_id;

        $product->save();

        return $this->redirect(route('products'), navigate: true);
    }

    public function render()
    {
        $current_url = url()->current();
        $explode_url = explode('/', $current_url);

        $this->currentUrl = $explode_url[3] . ' ' . $explode_url[4];

        return view('livewire.add-product-form')
            ->layout('admin-layout');
    }
}
