<?php

namespace App\Livewire;

use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;

class ManageOrders extends Component
{
    use WithPagination;

    public $currentUrl;
    public $selectedOrder;
    public $statusOptions = ['pending', 'processing', 'completed', 'cancelled'];

    public function mount()
    {
        $current_url = url()->current();
        $explode_url = explode('/', $current_url);
        $this->currentUrl = $explode_url[3];
    }

    public function render()
    {
        return view('livewire.manage-orders', [
            'orders' => Order::latest()->paginate(10)
        ])->layout('admin-layout');
    }

    public function viewOrder($orderId)
    {
        $this->selectedOrder = Order::findOrFail($orderId);
        // You can emit an event here to show a modal with order details
        $this->dispatch('show-order-modal');
    }

    public function updateStatus($orderId)
    {
        $order = Order::findOrFail($orderId);
        // Cycle through status options
        $currentIndex = array_search($order->status, $this->statusOptions);
        $nextIndex = ($currentIndex + 1) % count($this->statusOptions);
        $order->status = $this->statusOptions[$nextIndex];
        $order->save();

        $this->dispatch('order-updated', 'Order status updated successfully');
    }
}
