<?php
namespace App\Services;

use App\Repositories\GalleryRepository;
use App\Repositories\PhotoRepository;

class GalleryService
{

    /**
     * @var GalleryRepository
     */
    private $galleryRepository;
    /**
     * @var PhotoRepository
     */
    private $photoRepository;

    /**
     * GalleryService constructor.
     * @param GalleryRepository $galleryRepository
     * @param PhotoRepository $photoRepository
     */
    public function __construct(GalleryRepository $galleryRepository, PhotoRepository $photoRepository)
    {
        $this->galleryRepository = $galleryRepository;
        $this->photoRepository = $photoRepository;
    }

    /**
     * Save Photos Client
     *
     * @param array $data
     * @return \Illuminate\Http\JsonResponse
     */
    public function savePhoto(array $data)
    {

        try {
            foreach ($data as $ids => $value) {
                $photo = $this->photoRepository->find($ids);
                $photo->update([
                    'confirmation' => $value
                ]);

            }

            return response()->json([
                'type' => 'success',
                'message' => 'Photos Saved with Success!'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error saving Photos, please check with Support!'
            ], 422);
        }

    }

}