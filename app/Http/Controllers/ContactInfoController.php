<?php

namespace App\Http\Controllers;

use App\Service\ContactInfoServices;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class ContactInfoController extends BaseController
{
    /**
     * @OA\Get(
     * path="/api/getAllContactInfo",
     * summary="getAllContactInfo",
     * description="get all contact information",
     * operationId="getAllContactInfo",
     * tags={"Contact Infomation"},
     * @OA\RequestBody(
     *
     * ),
     * @OA\Response(
     *    response=200,
     *    description="response",
     *    @OA\JsonContent(
     *       @OA\Property(property="message", type="string", example="array")
     *        )
     *     )
     * )
     */

    public function getAllContactInfo()
    {
        $data = [];
        $cs = new ContactInfoServices;
        $data['contactInfos'] = $cs->getContactInfo();

        echo json_encode($data, JSON_PRETTY_PRINT);
    }

    /**
     * @OA\Post(
     * path="/api/createContactInfo",
     * summary="Create Contact Info",
     * description="Create Contact Info",
     * operationId="createContactInfo",
     * tags={"Contact Infomation"},
     * @OA\RequestBody(
     *    required=true,
     *    description="create information",
     *    @OA\JsonContent(
     *       required={"name", "gender", "email", "phone_number"},
     *       @OA\Property(property="name", type="string", format="text", example="wan ahamd"),
     *       @OA\Property(property="gender", type="string", format="text", example="Lelaki / Perempuan"),
     *       @OA\Property(property="email", type="string", format="email", example="user1@mail.com"),
     *       @OA\Property(property="phone_number", type="string", format="email", example="+601928884992")
     *    ),
     * ),
     * @OA\Response(
     *    response=200,
     *    description="Wrong credentials response",
     *    @OA\JsonContent(
     *       @OA\Property(property="message", type="string", example="Sorry, wrong email address Please try again")
     *        )
     *     )
     * )
     */

    public function createContactInfo(Request $r)
    {
        $result = [];
        $cs = new ContactInfoServices;
        $result = $cs->createContactInfo($r);

        return response()->json($result);
    }

    /**
     * @OA\Put(
     * path="/api/updateContactInfo",
     * summary="Update Contact Info",
     * description="Update Contact Info. You can get id contact info by using GET method on first function above",
     * operationId="updateContactInfo",
     * tags={"Contact Infomation"},
     * @OA\RequestBody(
     *    required=true,
     *    description="update information",
     *    @OA\JsonContent(
     *       required={"name", "gender", "email", "phone_number"},
     *       @OA\Property(property="id", type="string", format="text", example="1"),
     *       @OA\Property(property="name", type="string", format="text", example="wan ahamd"),
     *       @OA\Property(property="gender", type="string", format="text", example="Lelaki / Perempuan"),
     *       @OA\Property(property="email", type="string", format="email", example="user1@mail.com"),
     *       @OA\Property(property="phone_number", type="string", format="email", example="+601928884992")
     *    ),
     * ),
     * @OA\Response(
     *    response=200,
     *    description="Wrong credentials response",
     *    @OA\JsonContent(
     *       @OA\Property(property="message", type="string", example="Sorry, wrong email address Please try again")
     *        )
     *     )
     * )
     */

    public function updateContactInfo(Request $r)
    {
        $result = [];
        $cs = new ContactInfoServices;
        $result = $cs->updateContactInfo($r);

        return response()->json($result);
    }

    /**
     * @OA\Delete(
     * path="/api/deleteContactInfo",
     * summary="Delete Contact Info",
     * description="Delete Contact Info. You can get id contact info by using GET method on first function above",
     * operationId="deleteContactInfo",
     * tags={"Contact Infomation"},
     * @OA\RequestBody(
     *    required=true,
     *    description="Delete information",
     *    @OA\JsonContent(
     *       required={"name", "gender", "email", "phone_number"},
     *       @OA\Property(property="id", type="string", format="text", example="1"),
     *    ),
     * ),
     * @OA\Response(
     *    response=200,
     *    description="Wrong credentials response",
     *    @OA\JsonContent(
     *       @OA\Property(property="message", type="string", example="Sorry, wrong email address Please try again")
     *        )
     *     )
     * )
     */

    public function deleteContactInfo(Request $r)
    {
        $result = [];
        $cs = new ContactInfoServices;
        $result = $cs->deleteContactInfo($r);

        return response()->json($result);
    }

    /**
     * @OA\Get(
     * path="/api/getAllContactInfoSortAlpha",
     * summary="getAllContactInfoSortAlpha",
     * description="get all contact information sorting by alpha",
     * operationId="getAllContactInfoSortAlpha",
     * tags={"Contact Infomation"},
     * @OA\RequestBody(
     *
     * ),
     * @OA\Response(
     *    response=200,
     *    description="response",
     *    @OA\JsonContent(
     *       @OA\Property(property="message", type="string", example="array")
     *        )
     *     )
     * )
     */

    public function getAllContactInfoSortAlpha()
    {
        $data = [];
        $cs = new ContactInfoServices;
        $data['contactInfos'] = $cs->getAllContactInfoSortAlpha();

        return response()->json($data);
    }

    public function home()
    {
        $data = [];
        $cs = new ContactInfoServices;
        $data['employees'] = $cs->getEmployee();

        return view('welcome', $data);
    }
}
