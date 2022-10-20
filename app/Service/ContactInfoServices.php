<?php
namespace App\Service;

use App\Models\ContactInfo;

class ContactInfoServices
{
    public function getContactInfo()
    {
        $data = ContactInfo::all();

        if (!$data) {
            $data = [];
        }

        return $data;
    }

    public function createContactInfo($r)
    {
        $input= $r->input();

        ContactInfo::create($input);

        $data['status'] = true;
        $data['title'] = 'Success';
        $data['type'] = 'success';
        $data['msg'] = 'Success create contact info';
        $data['data'] = ContactInfo::orderBy('created_at', 'DESC')->first();

        return $data;
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


}
