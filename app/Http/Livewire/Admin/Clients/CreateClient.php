<?php

namespace App\Http\Livewire\Admin\Clients;

use Livewire\Component;
use App\Models\Client;

class CreateClient extends Component
{
    public Client $client;

    public function mount(): void
    {
        $this->client = Client::make();
    }

    public function rules(): array
    {
        return [
            'client.name' => 'required|string|max:255',
            'client.phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'client.email' => 'required|email|not_in:clients.email',
        ];
    }

    public function messages()
    {
        return [
            'client.name.required' => 'A Name is required.',
            'client.name.string' => 'Valid name is required.',
            'client.name.max' => 'Name is too long.',
            'client.phone.required' => 'A phone number is required.',
            'client.phone.regex' => 'A valid phone number is required.',
            'client.phone.min' => 'Minimum of 10 characters needed',
            'client.email.required' => 'Email is required.',
            'client.email.email' => 'Email is not valid.',
            'client.email.not_in' => 'Email exists.',
        ];
    }

    public function save(): void
    {
        $this->validate();
        $this->client->save();

        redirect()->route('admin.clients');
    }

    public function render()
    {
        return view('livewire.admin.clients.create')
            ->layout('components.layouts.auth', [
                'title' => trans('New Client')
            ]);
    }
}
