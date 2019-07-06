<?php

/**
 * WEB ROUTES
 *
 */

Route::get('/', 'ProfileController@index');

Route::get('albums', 'AlbumsController@index');
Route::get('albums/{id}', 'AlbumsController@show');

Route::get('photos/{id}', 'PhotosController@show');

Route::get('music_videos', 'VideosController@index');
Route::get('music_videos/{id}', 'VideosController@show');

Route::get('blogs', 'BlogsController@index');
Route::get('blogs/{id}', 'BlogsController@show');

Route::post('newsletter_signup', 'NewsletterSignupsController@store');

Route::post('cast_vote', 'AlbumSingleVotesController@cast_vote');

Route::get('profile/edit/content', 'CustomThemesController@profile_content');
Route::get('profile/edit/styles', 'CustomThemesController@profile_styles');
Route::get('profile/edit/toptwelve', 'CustomThemesController@profile_toptwelve');
Route::get('profile/edit/spotify_playlist', 'CustomThemesController@spotify_playlist');
Route::get('profile/edit/custom_url', 'CustomThemesController@custom_url');
Route::put('profile/update_custom_url/{id}', 'CustomThemesController@update_custom_url');
Route::put('profile/update_content/{id}', 'CustomThemesController@update_content');
Route::put('profile/update_spotify_playlist/{id}', 'CustomThemesController@update_spotify_playlist');

/**
 * ADMIN ROUTES
 *
 */
Auth::routes();
Route::get('dashboard', 'DashboardController@index');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('admin/profile/edit', 'ProfileController@edit');
Route::put('admin/profile/update/{id}', 'ProfileController@update');

Route::get('admin/blogs', 'BlogsController@cms_index');
Route::get('admin/blogs/create', 'BlogsController@create');
Route::post('admin/blogs/store', 'BlogsController@store');
Route::get('admin/blogs/edit/{id}', 'BlogsController@edit');
Route::put('admin/blogs/update/{id}', 'BlogsController@update');
Route::delete('admin/blogs/delete/{id}', 'BlogsController@destroy');

Route::get('admin/albums', 'AlbumsController@cms_index');
Route::get('admin/albums/create', 'AlbumsController@create');
Route::post('admin/albums/store', 'AlbumsController@store');
Route::get('admin/albums/{id}', 'AlbumsController@cms_show');
Route::get('admin/albums/edit/{id}', 'AlbumsController@edit');
Route::put('admin/albums/update/{id}', 'AlbumsController@update');
Route::delete('admin/albums/delete/{id}', 'AlbumsController@destroy');

Route::post('admin/photos/store', 'PhotosController@store');
Route::delete('admin/photos/delete/{id}', 'PhotosController@destroy');
Route::delete('admin/photos/instagram_photo_hide/{id}', 'PhotosController@instagram_photo_hide');
Route::get('admin/photos/edit/{id}', 'PhotosController@edit');
Route::put('admin/photos/update/{id}', 'PhotosController@update');
Route::post('admin/photos/sort', 'PhotosController@sort');

Route::get('admin/music_videos', 'VideosController@cms_index');
Route::post('admin/music_videos/store', 'VideosController@store');
Route::delete('admin/music_videos/delete/{id}', 'VideosController@destroy');
Route::post('admin/music_videos/sort', 'VideosController@sort');

Route::get('admin/toptwelve', 'TopTwelveController@index');
Route::get('admin/toptwelve/show', 'TopTwelveController@show');
Route::post('admin/toptwelve/store', 'TopTwelveController@store');
Route::get('admin/toptwelve/edit/{id}', 'TopTwelveController@edit');
Route::put('admin/toptwelve/update/{id}', 'TopTwelveController@update');
Route::delete('admin/toptwelve/delete/{id}', 'TopTwelveController@destroy');

Route::get('admin/spotifyplaylist', 'SpotifyPlaylistsController@index');
Route::put('admin/spotifyplaylist/{id}', 'SpotifyPlaylistsController@update');

Route::get('admin/newslettersignups', 'NewsletterSignupsController@show');

Route::get('admin/bannerads', 'BannerAdsController@index');
Route::get('admin/bannerads/create', 'BannerAdsController@create');
Route::post('admin/bannerads/store', 'BannerAdsController@store');
Route::post('admin/bannerads/activate', 'BannerAdsController@activate');
Route::get('admin/bannerads/edit/{id}', 'BannerAdsController@edit');
Route::put('admin/bannerads/update/{id}', 'BannerAdsController@update');
Route::delete('admin/bannerads/delete/{id}', 'BannerAdsController@destroy');

Route::get('admin/votingresults', 'AlbumSingleVotesController@index');