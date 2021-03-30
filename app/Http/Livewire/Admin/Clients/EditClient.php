<?php

namespace App\Http\Livewire\Admin\Clients;

use Livewire\Component;
use App\Models\Client;


class EditClient extends Component
{

    public Client $client;

    public function mount($id): void
    {
        $this->client = Client::find($id);
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
            'client.phone.min' => 'Minimum of 10 characters needed.',
            'client.email.required' => 'Email is required.',
            'client.email.email' => 'The Email Address has to be valid.',
            'client.email.not_in' => 'That email exists.',
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
        return view('livewire.admin.clients.edit')
            ->layout('components.layouts.auth', [
                'title' => trans('Edit Client')
            ]);
    }
}
