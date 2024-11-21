<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\Activity;
use Carbon\Carbon;
use Livewire\Component;


class AdminDashboard extends Component
{
    public $currentUrl;
    public $totalUsers;
    public $newUsersToday;
    public $activeUsers;
    public $recentActivities;

    public function mount()
    {
        $this->loadStats();
        $this->loadRecentActivities();
    }

    public function loadStats()
    {
        $this->totalUsers = User::count();
        $this->newUsersToday = User::whereDate('created_at', Carbon::today())->count();
        // $this->activeUsers = User::where('last_active_at', '>=', Carbon::now()->subMinutes(15))->count();
    }

    public function loadRecentActivities()
    {
        $this->recentActivities = Activity::latest()
            ->take(5)
            ->get();
    }

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
