<?php
namespace App\Services;

use App\Repositories\ContractRepository;
use App\Validators\ContractValidator;

use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;

class ContractService
{
    /**
     * @var ContractRepository
     */
    private $repository;
    /**
     * @var ContractValidator
     */
    private $validator;

    /**
     * ContractService constructor.
     * @param ContractRepository $repository
     * @param ContractValidator $validator
     */
    public function __construct(ContractRepository $repository, ContractValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }

    /**
     * @param array $data
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(array $data)
    {
        try {
            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);

            $this->repository->create($data);

            return response()->json([
                'type' => 'success',
                'msg' => 'Contract <b>' .$data['code'] .'</b> Generated Successfully'
            ],200);


        } catch(ValidatorException $e) {
            return response()->json($e->getMessageBag(), 422);
        }
    }

    /**
     * @param array $data
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(array $data, $id)
    {
        try {
            $this->validator->with($data)->setId($id)->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $course = $this->repository->skipPresenter()->find($id);

            $course->update($data);

            return response()->json([
                'type' => 'success',
                'message' => 'Client <b>' .$data['firstname'] .'</b> Update Success'
            ],200);


        } catch(ValidatorException $e) {
            return response()->json($e->getMessageBag(), 422);
        }
    }

    public function destroy($id)
    {
        if(count($id) >= 1){
            foreach($id as $ids){
                $del = $this->repository->find($ids);
//                if(!empty($del->profile->imagefile)) {
//                    if (file_exists(public_path() . '/uploads/users/' . $del->profile->imagefile)) {
//                        $this->storage->disk('local_public')->delete('users/' . $del->profile->imagefile);
//                    }
//                }
                //$del->delete();
            }
            return response()->json([
                'msgstatus' => 'success',
                'msg' => 'Successfully deleted record.'
            ], 200);
        } else {
            return response()->json([
                'msg' => 'No records deleted.'
            ], 422);
        }
    }

    public function generatePdf()
    {

    }




}