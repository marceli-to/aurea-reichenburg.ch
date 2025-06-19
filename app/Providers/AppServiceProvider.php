<?php
namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
      Blade::directive('seo_title', function () {
        return "<?php echo trim(View::getSection('seo_title')) ? View::getSection('seo_title') . ' – ' . config('seo.title') : config('seo.title'); ?>";
      });

      Blade::directive('seo_description', function () {
        return "<?php echo View::hasSection('seo_description') ? trim(View::getSection('seo_description')) : config('seo.description'); ?>";
      });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
