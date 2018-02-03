<?php

namespace App\Http\Controllers\Panel;

use App\Repositories\ClientRepository;
use App\Services\ClientService;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * @var ClientRepository
     */
    private $repository;
    /**
     * @var ClientService
     */
    private $service;

    /**
     * Create a new controller instance.
     *
     * @param ClientRepository $repository
     * @param ClientService $service
     */
    public function __construct(ClientRepository $repository, ClientService $service)
    {
        $this->middleware('auth.panel');
        $this->repository = $repository;
        $this->service = $service;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = $this->repository->all();

        return view('panel.clients.list', compact('clients'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('panel.clients.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        return $this->service->create($request->all());
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $client = $this->repository->find($id);

        return view('panel.clients.view', compact('client') );
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $client = $this->repository->skipPresenter()->find($id);

        return view('panel.clients.edit', compact('client'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        return $this->service->update($request->all(), $id);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function destroy(Request $request)
    {
        return $this->service->destroy($request->get('ids'));
    }

    /**
     * @param $clientID
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function contractIndex($clientID)
    {
        $client = $this->repository->find($clientID);

        return view('panel.clients.contract', compact('client'));

    }


}
