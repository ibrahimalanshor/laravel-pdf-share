<?php

namespace App\Http\Controllers\User;

use App\Services\FileService;
use App\Repositories\FileRepository;
use App\Http\Requests\File\CreateFileRequest;
use App\Http\Requests\File\UpdateFileRequest;
use App\Http\Controllers\Controller;

use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class FilesController extends Controller
{

    protected $fileService;
    protected $fileRepo;

    public function __construct(FileService $fileService, FileRepository $fileRepo)
    {
        $this->fileService = $fileService;
        $this->fileRepo = $fileRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        return view('user.files.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        return view('user.files.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateFileRequest $request): RedirectResponse
    {
        $this->fileService->store($request);

        return redirect('user/files')->with('success', 'Success Upload PDF');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(string $slug): View
    {
        $file = $this->fileRepo->getBySlug($slug);

        return view('user.files.show', compact('file'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(string $slug): View
    {
        $file = $this->fileRepo->getBySlug($slug);
        $categories = $file->categories->pluck('name');
        
        $this->authorize('view', $file);

        return view('user.files.edit', compact('file', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFileRequest $request, string $slug)
    {
        $this->fileService->update($request, $request->id);

        return redirect('user/files')->with('success', 'Success Edit PDF');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
