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
                'message' => 'Contract <b>' .$course->code .'</b> Update Success'
            ],200);


        } catch(ValidatorException $e) {
            return response()->json($e->getMessageBag(), 422);
        }
    }

    public function destroy($id)
    {
        if( !empty($id) ) {
            $del = $this->repository->find($id);

            $del->delete();

            return response()->json([
                'msgstatus' => 'success',
                'message' => 'Successfully deleted record.'
            ], 200);

        } else {
            return response()->json([
                'msg' => 'No records deleted.'
            ], 422);
        }

    }

    /**
     * Create PDF
     * @param $data
     * @return mixed
     */
    public function generatePdf($data)
    {
        $contract =  $this->repository->findWhere([ 'code' => $data ])->first();
        $pdf = \PDF::loadHTML($contract->contract)->setPaper('a4', 'portrait');
        return $pdf->stream();
    }




}