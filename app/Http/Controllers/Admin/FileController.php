<?php

namespace App\Http\Controllers\Admin;

use App\Services\FileService;
use App\Repositories\FileRepository;
use App\Http\Controllers\Controller;

use Illuminate\View\View;
use Illuminate\Http\JsonResponse;

class FileController extends Controller
{

    protected $service;
    protected $repo;

    public function __construct(FileService $service, FileRepository $repo)
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
