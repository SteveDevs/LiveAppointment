<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class LivewireSelectServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'livewire-select');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/livewire/select'),
            ], 'livewire-select-views');
        }

        Blade::directive('livewireSelectScripts', function () {
            return <<<'HTML'
                <script>
                        window.livewire.on('livewire-select-focus-search', (data) => {
                            const el = document.getElementById(`${data.name || 'invalid'}`);

                            if (!el) {
                                return;
                            }

                            el.focus();
                        });

                        window.livewire.on('livewire-select-focus-selected', (data) => {
                            const el = document.getElementById(`${data.name || 'invalid'}-selected`);

                            if (!el) {
                                return;
                            }

                            el.focus();
                        });
                    </script>
HTML;
        });
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->mergeConfigFrom(base_path('config/app.php'), 'livewire-select');
    }
}
