<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\UserService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function show(string $id): View|Factory
    {
        return $this->userService->show($id);
    }

    public function update(string $id): RedirectResponse
    {
        return $this->userService->update($id);
    }

    public function changePassword(string $id)
    {
        return $this->userService->changePassword($id);
    }
}
