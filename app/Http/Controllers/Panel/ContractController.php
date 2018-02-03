<?php

namespace App\Http\Controllers\Panel;

use App\Repositories\ClientRepository;
use App\Repositories\ContractRepository;
use App\Services\ContractService;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    /**
     * @var ContractRepository
     */
    private $repository;
    /**
     * @var ClientRepository
     */
    private $clientRepository;
    /**
     * @var ContractService
     */
    private $service;

    /**
     * ContractController constructor.
     * @param ContractRepository $repository
     * @param ClientRepository $clientRepository
     * @param ContractService $service
     */
    public function __construct(ContractRepository $repository, ClientRepository $clientRepository, ContractService $service)
    {
        $this->middleware('auth.panel');
        $this->repository = $repository;
        $this->clientRepository = $clientRepository;
        $this->service = $service;
    }

    /**
     * Show the application.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contracts = $this->repository->all();

        return view('panel.contracts.index', compact('contracts'));

    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $clients = $this->clientRepository->all()->pluck(  'full_name', 'clientID')->prepend('## Select Client ##');

        return view('panel.contracts.create', compact('clients'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        return $this->service->create($request->all());
    }

    public function edit($contractID)
    {
        $clients = $this->clientRepository->all()->pluck(  'full_name', 'clientID')->prepend('## Select Client ##');
        $contract = $this->repository->find($contractID);

        return view('panel.contracts.edit', compact('clients', 'contract'));
    }

    /**
     * @param Request $request
     * @param $contractID
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $contractID)
    {
        return $this->service->update($request->all(), $contractID);
    }

    /**
     * @param $code
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($code)
    {
        return $this->service->destroy($code);
    }


    /**
     * @param $code
     */
    public function generatePdf($code)
    {
        return $this->service->generatePdf($code);
    }

}
