<?php

namespace App\Livewire;

use Livewire\Component;


class AdminDashboard extends Component
{
    // here we are passing the url to the breadcrumb component
    public $currentUrl;
    public function render()
    {
        // get current url
        // dd(url()->current());

        // breaking the url into array
        $current_url = url()->current();
        $explode_url = explode('/', $current_url);

        // dd($explode_url);

        $this->currentUrl = $explode_url[3] . ' ' . $explode_url[4];

        return view('livewire.admin-dashboard')
            ->layout('admin-layout');
    }
}
