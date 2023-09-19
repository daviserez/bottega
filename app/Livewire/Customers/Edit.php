<?php

namespace App\Livewire\Customers;

use Livewire\Component;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Rule;
use App\Models\Customer;

class Edit extends Component
{
    #[Locked]
    #[Rule('required')]
    public $id;

    #[Rule('required|min:3')]
    public $name;

    public $firstname;

    public $phone;

    public $street;

    public $postcode;

    public $city;

    public $country;

    // TODO validation email
    public $email;

    public function update() {
        $this->validate();

        // TODO city automatically filled by postcode
        $customer = Customer::find($this->id);
        $customer->update([
            'name' => $this->name,
            'firstname' => $this->firstname,
            'phone' => $this->phone,
            'street' => $this->street,
            'postcode' => $this->postcode,
            'city' => $this->city,
            'country' => $this->country,
            'email' => $this->email,
        ]);

        session()->flash('message', 'The customer has been updated with success.');
        session()->flash('title', 'Customer updated');
        session()->flash('status', 'success');
        return $this->redirect("/customers/{$this->id}", navigate: true);
    }

    public function render()
    {
        return view('livewire.customers.edit');
    }
}
