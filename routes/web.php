<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


/**
 * Ajax
 */
Route::get('/form', function() {
   return view('form');
})->name('form');

Route::post('/form/upload', function(\Illuminate\Http\Request $request) {
    dd($request->all());
    if($request->has('emails_file')) {
        $uploadedFile = $request->file('emails_file');
        $filename = time().$uploadedFile->getClientOriginalName();

        \Illuminate\Support\Facades\Storage::disk('local')->putFileAs(
           'files/'.$filename,
           $uploadedFile,
           $filename
        );
        return redirect()->route('form');
    }
    dd('error');
})->name('upload');


/**
 * Plupload
 */
Route::get('/plupload/form', function() {
    return view('form_plupload');
})->name('plupload.form');

Route::post('/plupload/upload', function(\Illuminate\Http\Request $request) {
    dd("Plupload", $request->all());
    $file = $request->file('file');
    $file->move(storage_path() . '/test/', $file->getClientOriginalName());
    return 'ready';
//    return Plupload::receive('file', function ($file)
//    {
//        $file->move(storage_path() . '/test/', $file->getClientOriginalName());
//
//        return 'ready';
//    });
})->name('plupload.upload');
