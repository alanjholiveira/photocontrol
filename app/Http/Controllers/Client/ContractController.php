<?php

namespace App\Http\Controllers\Client;

use App\Repositories\ContractRepository;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    /**
     * @var ContractRepository
     */
    private $repository;

    /**
     * Create a new controller instance.
     *
     * @param ContractRepository $repository
     */
    public function __construct(ContractRepository $repository)
    {
        $this->middleware('auth');
        $this->repository = $repository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = \Auth::User();
        $contracts = $this->repository->findWhere(['clientID' => $client->id]);

        return view('client.contract', compact('contracts'));
    }


    public function download($code)
    {
        return $code;
    }
}
