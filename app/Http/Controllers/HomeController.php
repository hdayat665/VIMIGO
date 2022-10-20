<?php

namespace App\Http\Controllers;

use App\Service\HomeServices;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class HomeController extends BaseController
{
    /**
     * @OA\Get(
     * path="/api/getEmployee",
     * summary="getEmployee",
     * description="get all Employee",
     * operationId="getEmployee",
     * tags={"Home"},
     * @OA\RequestBody(
     *
     * ),
     * @OA\Response(
     *    response=200,
     *    description="Wrong credentials response",
     *    @OA\JsonContent(
     *       @OA\Property(property="message", type="string", example="Sorry, wrong email address or password. Please try again")
     *        )
     *     )
     * )
     */


    public function getTest()
    {
        $data = [];
        $hs = new HomeServices;
        $data['employees'] = $hs->getEmployee();

        echo json_encode($data, JSON_PRETTY_PRINT);
    }

     /**
     * @OA\Get(
     * path="/api/getTest",
     * summary="getTest",
     * description="get all Employee",
     * operationId="getTest",
     * tags={"Home"},
     * @OA\RequestBody(
     *
     * ),
     * @OA\Response(
     *    response=200,
     *    description="Wrong credentials response",
     *    @OA\JsonContent(
     *       @OA\Property(property="message", type="string", example="Sorry, wrong email address or password. Please try again")
     *        )
     *     )
     * )
     */


    public function getEmployee()
    {
        $data = [];
        $hs = new HomeServices;
        $data['employees'] = $hs->getEmployee();

        echo json_encode($data, JSON_PRETTY_PRINT);
    }

    public function home()
    {
        $data = [];
        $hs = new HomeServices;
        $data['employees'] = $hs->getEmployee();

        return view('welcome', $data);
    }
}
