<?php

Route::middleware(['web','auth', 'splade', 'verified'])->name('admin.')->group(function () {
    Route::get('admin/activities', [\TomatoPHP\TomatoCrm\Http\Controllers\ActivityController::class, 'index'])->name('activities.index');
    Route::get('admin/activities/api', [\TomatoPHP\TomatoCrm\Http\Controllers\ActivityController::class, 'api'])->name('activities.api');
    Route::get('admin/activities/create', [\TomatoPHP\TomatoCrm\Http\Controllers\ActivityController::class, 'create'])->name('activities.create');
    Route::post('admin/activities', [\TomatoPHP\TomatoCrm\Http\Controllers\ActivityController::class, 'store'])->name('activities.store');
    Route::get('admin/activities/{model}', [\TomatoPHP\TomatoCrm\Http\Controllers\ActivityController::class, 'show'])->name('activities.show');
    Route::get('admin/activities/{model}/edit', [\TomatoPHP\TomatoCrm\Http\Controllers\ActivityController::class, 'edit'])->name('activities.edit');
    Route::post('admin/activities/{model}', [\TomatoPHP\TomatoCrm\Http\Controllers\ActivityController::class, 'update'])->name('activities.update');
    Route::delete('admin/activities/{model}', [\TomatoPHP\TomatoCrm\Http\Controllers\ActivityController::class, 'destroy'])->name('activities.destroy');
});
