<?php

namespace App\Http\Livewire\Admin\Services;

use Livewire\Component;
use App\Models\Service;


class EditService extends Component
{
    public Service $service;

    public function __construct(){
    }

    public function mount($id): void
    {
        $this->service = Service::find($id);
    }

    public function rules(): array
    {
        return [
            'service.name' => 'required|string|max:255',
            'service.price' => ['required', "regex:/^\\d+(\\.\\d{1,2})?$/D"]
        ];
    }

    public function messages()
    {
        return [
            'service.name.required' => 'A Name is required.',
            'service.name.string' => 'Valid Name is required.',
            'service.name.max' => 'Name is too long.',
            'service.price.required' => 'A Price is required.',
            'service.price.regex' => 'Valid Price is required.',
        ];
    }


    public function save(): void
    {

        $this->service->save();

        redirect()->route('admin.services');
    }

    public function render()
    {
        return view('livewire.admin.services.edit')
            ->layout('components.layouts.auth', [
                'title' => trans('Edit Service')
            ]);
    }
}
