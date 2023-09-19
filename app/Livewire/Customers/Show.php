<?php

namespace App\Livewire\Customers;

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

    public function archive()
    {
        $this->customer->delete();

        session()->flash('message', 'The customer has been archived with success.');
        session()->flash('title', 'Customer archived');
        session()->flash('status', 'success');
        return $this->redirect(
            "/customers",
            navigate: true
        );
    }

    public function render()
    {
        return view('livewire.customers.show');
    }
}
