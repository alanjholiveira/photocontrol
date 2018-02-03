<?php

namespace App\Http\Controllers\Client;

use App\Repositories\GalleryRepository;
use App\Repositories\PhotoRepository;
use App\Services\GalleryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

//use Illuminate\Contracts\Filesystem\Factory as Storage;

class GalleryController extends Controller
{
    /**
     * @var GalleryRepository
     */
    private $repository;
    /**
     * @var GalleryService
     */
    private $service;

    /**
     * Create a new controller instance.
     *
     * @param GalleryRepository $repository
     * @param GalleryService $service
     */
    public function __construct(GalleryRepository $repository, GalleryService $service)
    {
        $this->middleware('auth');
        $this->repository = $repository;
        $this->service = $service;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function gallery()
    {
        $client = Auth::User();
//        $galleries = $this->repository->scopeQuery(function($query) use($client){
//            return $query->whereRaw('clientID', $client->id)->whereRaw('status = "published" ');
//        })->all();

        $galleries = $this->repository->findWhere(['clientID' => $client->id, 'status' => 'published'])->all();

        return view('client.gallery', compact('galleries'));
    }

    /**
     * @param $galleryID
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function photos($galleryID)
    {
        $gallery = $this->repository->findWhere(['galleryID' => $galleryID, 'status' => 'published'])->first();

        return view('client.photo', compact('gallery'));
    }

    /**
     * @param $galleryID
     * @param PhotoRepository $photoRepository
     * @return mixed
     */
    public function getPhotos($galleryID, PhotoRepository $photoRepository)
    {
        return $photoRepository->findWhere(['galleryID' => $galleryID], ['photoID', 'galleryID', 'filename', 'extension', 'confirmation']);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function savePhotos(Request $request)
    {
        return $this->service->savePhoto( $request->all() );
    }



}
