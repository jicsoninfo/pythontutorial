<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Models\Backend\Category;
use App\Models\Backend\FotterSection;

//use Illuminate\Support\Facades\App;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->composer(['frontend.include.header', 'frontend.include.footer'], function ($view){
            $locale = session('locale');
           
            if($locale == 'en'){
                $navbar_cat = Category::whereNull('parent_category_id')
                                        ->whereNull('parent_lan_id')
                                        ->where('cat_status', '=', "1")
                                        ->where('lan_id', '1')
                                        ->select('id','cat_name', 'cat_slug', 'parent_category_id', 'meta_title', 'meta_keywords', 'meta_description', 'cat_image', 'parent_lan_id', 'lan_id', 'template_id')
                                        ->get();
            }else{
                $navbar_cat = Category::whereNull('parent_category_id')
                                        //->whereNull('parent_lan_id')
                                        ->where('cat_status', '=', "1")
                                        ->where('lan_id', '2')
                                        ->select('id','cat_name', 'cat_slug', 'parent_category_id', 'meta_title', 'meta_keywords', 'meta_description', 'cat_image', 'parent_lan_id', 'lan_id', 'template_id')
                                        ->get();
            }
            // Debugging
            // \Log::info('Navbar categories:', $navbar_cat->toArray());
            // return $view->with('navbar_cat', $navbar_cat);
            return $view->with(['navbar_cat' => $navbar_cat ]);
            //return $view->with(['navbar_cat' => $navbar_cat,  'other_data' => $other_data, 'more_data' => $more_data, ]);
        });

        view()->composer('frontend.include.footer', function ($view){
            $locale = session('locale');
            if($locale == 'en'){
                $foot_sec = FotterSection::where('id', '1')->first();
            }else{
                $foot_sec = FotterSection::where('id', '2')->first();
            }
            return $view->with(['foot_sec' => $foot_sec ]);
            
        });

        //  if (App::environment('production')) {
        //     \URL::forceScheme('https');
        // }


    }

   



    
}


Route::get('/clear-cache', function() {
    Artisan::call('optimize:clear');
    dd("clear");
});
Route::get('/storage-lick', function() {
    Artisan::call('storage:link');
    dd("clear");
});