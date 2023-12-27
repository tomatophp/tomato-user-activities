<?php

namespace TomatoPHP\TomatoUserActivities\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use TomatoPHP\TomatoAdmin\Facade\Tomato;
use TomatoPHP\TomatoUserActivities\Models\Activity;

class ActivityController extends Controller
{
    /**
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View|JsonResponse
    {
        return Tomato::index(
            request: $request,
            model: Activity::class,
            view: 'tomato-user-activities::activities.index',
            table: \TomatoPHP\TomatoUserActivities\Tables\ActivityTable::class,
        );
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function api(Request $request): JsonResponse
    {
        return Tomato::json(
            request: $request,
            model: \TomatoPHP\TomatoUserActivities\Models\Activity::class,
        );
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return Tomato::create(
            view: 'tomato-user-activities::activities.create',
        );
    }

    /**
     * @param \TomatoPHP\TomatoUserActivities\Http\Requests\Activity\ActivityStoreRequest $request
     * @return RedirectResponse
     */
    public function store(\TomatoPHP\TomatoUserActivities\Http\Requests\Activity\ActivityStoreRequest $request): RedirectResponse|JsonResponse
    {
        $response = Tomato::store(
            request: $request,
            model: \TomatoPHP\TomatoUserActivities\Models\Activity::class,
            message: __('Activity created successfully'),
            redirect: 'admin.activities.index',
        );

        return $response['redirect'];
    }

    /**
     * @param \TomatoPHP\TomatoUserActivities\Models\Activity $model
     * @return View
     */
    public function show(\TomatoPHP\TomatoUserActivities\Models\Activity $model): View|JsonResponse
    {
        return Tomato::get(
            model: $model,
            view: 'tomato-user-activities::activities.show',
        );
    }

    /**
     * @param \TomatoPHP\TomatoUserActivities\Models\Activity $model
     * @return View
     */
    public function edit(\TomatoPHP\TomatoUserActivities\Models\Activity $model): View
    {
        return Tomato::get(
            model: $model,
            view: 'tomato-user-activities::activities.edit',
        );
    }

    /**
     * @param \TomatoPHP\TomatoUserActivities\Http\Requests\Activity\ActivityUpdateRequest $request
     * @param \TomatoPHP\TomatoUserActivities\Models\Activity $user
     * @return RedirectResponse
     */
    public function update(\TomatoPHP\TomatoUserActivities\Http\Requests\Activity\ActivityUpdateRequest $request, \TomatoPHP\TomatoUserActivities\Models\Activity $model): RedirectResponse|JsonResponse
    {
        $response = Tomato::update(
            request: $request,
            model: $model,
            message: __('Activity updated successfully'),
            redirect: 'admin.activities.index',
        );

        return $response['redirect'];
    }

    /**
     * @param \TomatoPHP\TomatoUserActivities\Models\Activity $model
     * @return RedirectResponse
     */
    public function destroy(\TomatoPHP\TomatoUserActivities\Models\Activity $model): RedirectResponse|JsonResponse
    {
        $response = Tomato::destroy(
            model: $model,
            message: __('Activity deleted successfully'),
            redirect: 'admin.activities.index',
        );

        return $response->redirect;
    }
}
