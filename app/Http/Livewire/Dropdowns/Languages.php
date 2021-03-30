<?php

namespace App\Http\Livewire\Dropdowns;

use Livewire\Component;

class Languages extends Component
{
    public $country;
    public $languages = [];
    public $options = [];
    public $preChosenIndex;

    protected $listeners = [
        "goToLangUrl" => "goToLangUrl"
    ];

    public function mount(){
        /*
             x-data="select({ data: { au: 'Australia', be: 'Belgium', cn: 'China', fr: 'France', de: 'Germany', it: 'Italy', mx: 'Mexico', es: 'Spain', tr: 'Turkey', gb: 'United Kingdom', 'us': 'United States' }, emptyOptionsMessage: 'No countries match your search.', name: 'country', placeholder: 'Select a country' })
        */

        $index = 0;
        foreach (\LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
            $this->languages[$localeCode] = $properties['native'];
            if($localeCode == \App::currentLocale()){
                $this->preChosenIndex = $index;
            }
            ++$index;
        }
       
        $this->languages = json_encode($this->languages);

        $this->options = [
            'emptyOptionsMessage' => 'No countries match your search.',
            'name' => 'language',
            'placeholder' => 'Select a country'
        ];
        $this->options = json_encode($this->options);

    }

    public function render()
    {
        return view('livewire.dropdowns.languages');
    }

    public function goToLangUrl($lang){
       return redirect($lang . "/dashboard");
    }
}
