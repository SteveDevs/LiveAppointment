<?php

namespace App\Http\Livewire\Admin\Settings;

use Livewire\Component;
use App\Models\Setting;

class EditSettings extends Component
{
    public Setting $setting;
    public String $currency;
    public $currencies;

    public function __construct(){
    }

    public function mount() : void
    {
        $this->setting = Setting::find(1);
        $this->currency = $this->setting->currency;

        $this->currencies = json_decode(file_get_contents(app_path('Data/currencies.json')), true);
    }

    public function rules(): array
    {
        return [
            'currency' => 'required',
            'setting.company_name' => 'required|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'currency.required' => 'The currency is required.',
            'settings.company_name.required' => 'A name is required.',
            'settings.company_name.string' => 'Company Name invalid.',
            'settings.company_name.max' => 'The Company Name is too long.',
        ];
    }

    public function save(): void
    {
        $this->validate();
        $this->setting->currency = $this->currency;
        $this->setting->save();

        $this->dispatchBrowserEvent('notify', trans('Settings saved successfully!'));
    }

    public function render()
    {
        return view('livewire.admin.settings.edit')
            ->layout('components.layouts.auth', [
                'title' => trans('Edit Settings')
            ]);
    }
}
