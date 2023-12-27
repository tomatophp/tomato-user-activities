<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['web','auth', 'splade', 'verified'])->name('admin.')->group(function () {
    Route::get('admin/activities', [\TomatoPHP\TomatoUserActivities\Http\Controllers\ActivityController::class, 'index'])->name('activities.index');
    Route::get('admin/activities/clear', [\TomatoPHP\TomatoUserActivities\Http\Controllers\ActivityController::class, 'clear'])->name('activities.clear');
    Route::get('admin/activities/api', [\TomatoPHP\TomatoUserActivities\Http\Controllers\ActivityController::class, 'api'])->name('activities.api');
    Route::get('admin/activities/{model}', [\TomatoPHP\TomatoUserActivities\Http\Controllers\ActivityController::class, 'show'])->name('activities.show');
    Route::post('admin/activities/{model}', [\TomatoPHP\TomatoUserActivities\Http\Controllers\ActivityController::class, 'update'])->name('activities.update');
    Route::delete('admin/activities/{model}', [\TomatoPHP\TomatoUserActivities\Http\Controllers\ActivityController::class, 'destroy'])->name('activities.destroy');
});
