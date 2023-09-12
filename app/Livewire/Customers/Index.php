<?php

namespace App\Livewire\Customers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    // public $customers;
    public $searchTerms = '';

    public function mount()
    {
        // $this->customers = Customer::paginate(10);
    }

    public function render()
    {
        // $searchTerms = $request->input('search');
        // TODO validate searchtermes?

        if (empty($this->searchTerms)) {
            $customers = Customer::query();
        } else {
            // TODO REVOIR CETTE RECHERCHE DE MERDE
            $phoneNumber = '';
            $nonPhoneNumber = '';

            // Extract digits and spaces for the phone number
            preg_match_all('/[\d\s\/\-\(\)+]+/', $this->searchTerms, $matches);
            if (!empty($matches[0])) {
                $phoneNumber = implode('', $matches[0]);
            }

            // Extract non-digits and non-spaces for the non-phone number part
            $nonPhoneNumber = trim(preg_replace('/[\s+]+/', ' ', $this->searchTerms));

            $customers = Customer::where(function ($query) use ($phoneNumber, $nonPhoneNumber) {
                if (!empty($phoneNumber)) {
                    // Handle phone number separately
                    $query->where('phone', 'like', "%$phoneNumber%");
                }

                // Search other fields for the non-phone-number part
                if (!empty($nonPhoneNumber)) {
                    $nonPhoneNumberTerms = explode(' ', $nonPhoneNumber);
                    foreach ($nonPhoneNumberTerms as $term) {
                        $query->orWhere('name', 'like', "%$term%")
                            ->orWhere('firstname', 'like', "%$term%")
                            ->orWhere('street', 'like', "%$term%")
                            ->orWhere('postcode', 'like', "%$term%")
                            ->orWhere('country', 'like', "%$term%");
                    }
                }
            });
        }

        $customers = $customers
            ->orderBy('firstname')
            ->orderBy('name')
            ->simplePaginate(10);

        return view(
            'livewire.customers.index',
            ['customers' => $customers],
        );
    }

    public function search()
    {
        // Reset pagination.
        $this->resetPage();
    }
}
