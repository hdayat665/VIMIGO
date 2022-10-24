<?php
namespace App\Service;

use App\Models\ContactInfo;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ContactInfoServices
{
    public function getContactInfo()
    {
        $data = ContactInfo::all();

        if (!$data) {
            throw new Exception("Error Processing Request", 1);

        }

        return $data;
    }

    public function createContactInfo($r)
    {
        $input= $r->input();
        $input['status'] = 'active';

        // change array to string
        $input['details'] = \implode(',', $input['details']);

        // checking duplication
        $contactInfo = ContactInfo::where('name', $input['name'])->first();
        if ($contactInfo) {
            return abort(409, 'Error, name already exist');
        }

        try {
            ContactInfo::create($input);

            $data['status'] = true;
            $data['title'] = 'Success';
            $data['type'] = 'success';
            $data['msg'] = 'Success create contact info';
            $data['data'] = ContactInfo::where('name', $input['name'])->first();
            return $data;
        } catch (\Throwable $th) {
            return abort(500, 'Erorr could not create contact info, '.$th->getMessage());
        }

    }

    public function updateContactInfo($r)
    {
        $input= $r->input();

        ContactInfo::where('id', $input['id'])->update($input);

        $data['status'] = true;
        $data['title'] = 'Success';
        $data['type'] = 'success';
        $data['msg'] = 'Success Update contact info';
        $data['data'] = ContactInfo::where('id', $input['id'])->first();

        return $data;
    }

    public function deleteContactInfo($r)
    {
        $input= $r->input();

        $contact = ContactInfo::find($input['id']);

        if (!$contact) {
            $data['status'] = false;
            $data['title'] = 'Error';
            $data['type'] = 'error';
            $data['msg'] = 'contact info not found';
        } else {
            $contact->delete();

            $data['status'] = true;
            $data['title'] = 'Success';
            $data['type'] = 'success';
            $data['msg'] = 'Success Delete contact info';
        }

        return $data;
    }

    public function getAllContactInfoSortAlpha()
    {
        $data = ContactInfo::orderBy('name', 'ASC')->get();

        if (!$data) {
            $data = [];
        }

        return $data;
    }

    public function getAllContactInfoLimit5Latest()
    {
        $data = ContactInfo::orderBy('created_at', 'DESC')->limit(5)->get();

        if (!$data) {
            $data = [];
        }

        return $data;
    }

    public function search($email = '', $gender = '')
    {
        $cond[0] = ['status', 'active'];

        if ($email) {
            $cond[1] = ['email', $email];
        }

        if ($gender) {
            $cond[2] = ['gender', $gender];
        }
        $data = ContactInfo::where($cond)->get();

        if (!$data) {
            $data = [];
        }

        return $data;
    }




}
