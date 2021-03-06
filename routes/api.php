<?php

use App\Article;
use App\Settings;
use Illuminate\Http\Request;
use Illuminate\Routing\Middleware\ThrottleRequests;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group(['middleware' => 'throttle:600'], function() {

        Route::get('/widget_title', function (Request $request) {
            $widget_title = Settings::where('name', 'widget_title')->first();
            return $widget_title->value;
        });

        Route::get('/widget_count', function (Request $request) {
            $widget_count = Settings::where('name', 'widget_count')->first();
            return $widget_count->value;
        });

        Route::get('/widget_articles', function (Request $request) {
            $widget_count = Settings::where('name', 'widget_count')->first();
            $articles = Article::widget()->active()->orderBy('order', 'asc')->limit($widget_count->value)->get();
            return $articles;
        });
});