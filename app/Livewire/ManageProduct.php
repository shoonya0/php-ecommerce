<?php

namespace App\Livewire;

use Livewire\Component;

class ManageProduct extends Component
{
    public $currentUrl;
    public function render()
    {
        // get current url
        $current_url = url()->current();
        $explode_url = explode('/', $current_url);

        $this->currentUrl = $explode_url[3];

        return view('livewire.manage-product')
            ->layout('admin-layout');
    }
}
