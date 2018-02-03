<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\GalleryCreateRequest;
use App\Http\Requests\GalleryUpdateRequest;
use App\Repositories\GalleryRepository;
use App\Validators\GalleryValidator;


class GalleriesController extends Controller
{

    /**
     * @var GalleryRepository
     */
    protected $repository;

    /**
     * @var GalleryValidator
     */
    protected $validator;

    public function __construct(GalleryRepository $repository, GalleryValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $galleries = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $galleries,
            ]);
        }

        return view('galleries.index', compact('galleries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  GalleryCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(GalleryCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $gallery = $this->repository->create($request->all());

            $response = [
                'message' => 'Gallery created.',
                'data'    => $gallery->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $gallery = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $gallery,
            ]);
        }

        return view('galleries.show', compact('gallery'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $gallery = $this->repository->find($id);

        return view('galleries.edit', compact('gallery'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  GalleryUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(GalleryUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $gallery = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Gallery updated.',
                'data'    => $gallery->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Gallery deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Gallery deleted.');
    }
}
