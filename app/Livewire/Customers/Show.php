<?php

namespace App\Livewire\Customers;

use App\Models\Customer;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Show extends Component
{
    public $customer;

    public function mount()
    {
        // $this->customer = Customer::find(id);
    }

    public function edit()
    {
        return $this->redirect(
            "/customers/{$this->customer->id}/edit",
            navigate: true
        );
    }

    public function render()
    {
        return view('livewire.customers.show');
    }
}
