<?php

namespace App\Http\Controllers\Admin;

use App\Services\UserService;
use App\Repositories\UserRepository;
use App\Http\Controllers\Controller;

use Illuminate\View\View;

class UserController extends Controller
{

    protected $service;
    protected $repo;

    public function __construct(UserService $service, UserRepository $repo)
    {
        $this->service = $service;
        $this->repo = $repo;
    }

    public function destroy(int $id): JsonResponse
    {
        $this->repo->delete($id);

        return response()->json('Success Delete Data');
    }

    public function datatables(): Object
    {
        return $this->service->getDatatables();
    }
}
