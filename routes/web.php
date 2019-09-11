<?php
Route::get('/','PublicController@index');
Route::get('/cek', function () {
    return view('home.pages.template');
});
//
Auth::routes();
//
Route::get('/index', 'HomeController@index');
Route::get('/index/slideshow', 'HomeController@slideshow');
Route::post('/index/slideshow', 'HomeController@svslideshow');
Route::get('/index/{id}/slideshow/edit', 'HomeController@edslideshow');
Route::put('/index/{id}/slideshow/edit', 'HomeController@upslideshow');
Route::delete('/index/{id}/slideshow/delete', 'HomeController@delslideshow');
//
Route::get('/index/typerumah', 'HomeController@typerumah');
Route::post('/index/typerumah', 'HomeController@svtyperumah');
Route::get('/index/{id}/typerumah/edit', 'HomeController@edtyperumah');
Route::put('/index/{id}/typerumah/edit', 'HomeController@uptyperumah');
Route::delete('/index/{id}/typerumah/delete', 'HomeController@deltyperumah');
//
Route::get('/index/harga', 'HomeController@harga');
Route::post('/index/harga', 'HomeController@svharga');
Route::get('/index/{id}/harga/edit', 'HomeController@edharga');
Route::put('/index/{id}/harga/edit', 'HomeController@upharga');
Route::delete('/index/{id}/harga/delete', 'HomeController@delharga');\
//
Route::get('/index/ulasan', 'HomeController@ulasan');
Route::post('/index/ulasan', 'HomeController@svulasan');
Route::get('/index/{id}/ulasan/edit', 'HomeController@edulasan');
Route::put('/index/{id}/ulasan/edit', 'HomeController@upulasan');
Route::delete('/index/{id}/ulasan/delete', 'HomeController@delulasan');
//
Route::get('/index/setting', 'HomeController@setting');
Route::put('/index/setting', 'HomeController@upsetting');
//
Route::get('/detail/type/{slug}', 'PublicController@detailtype');
Route::get('/harga', 'PublicController@harga');
Route::get('/lokasi', 'PublicController@lokasi');
Route::get('/kontak', 'PublicController@kontak');
Route::get('/galery/detail/{slug}', 'PublicController@dgalery');
//
Route::get('/index/galery', 'HomeController@galery');
Route::post('/index/galery', 'HomeController@svgalery');
Route::get('/index/{id}/galery/edit', 'HomeController@edgalery');
Route::put('/index/{id}/galery/edit', 'HomeController@upgalery');
Route::delete('/index/{id}/galery/delete', 'HomeController@delgalery');
//
Route::get('/order/{slug}', 'PublicController@order');
Route::get('/index/statistik/{slug}', 'HomeController@statistik');