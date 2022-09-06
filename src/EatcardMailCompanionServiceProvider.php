<?php

namespace Weboccult\EatcardMailCompanion;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;

class EatcardMailCompanionServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */

	    if ($this->app->runningInConsole()) {

		    $this->publishes([
			    __DIR__.'/../config/eatcardMailCompanion.php' => config_path('eatcardMailCompanion.php'),
		    ], 'eatcardMailCompanion-config');

		    // Publishing the views.
		    $this->publishes([
			    __DIR__.'/../resources/views' => resource_path('views/vendor/eatcard-mail-companion'),
		    ], 'eatcardmail-companion-views');
        }

	    $this->loadViewsFrom(__DIR__.'/../resources/views', 'eatcard-mail-companion');

	    Blade::directive('mailCompanionGeneralHelper', function ($arguments) {
		    list($function, $value) = explode(',', $arguments);
		    $function = str_replace("'", '', $function);
		    $value = eval('return '.$value.';');
		    return "<?php echo Weboccult\EatcardMailCompanion\Helpers\\$function('$value'); ?>";
	    });
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__ . '/../config/eatcardMailCompanion.php', 'eatcard-mail-companion');

        // Register the main class to use with the facade
        $this->app->singleton('eatcard-mail-companion', function () {
            return new EatcardMailCompanion;
        });
    }
}
