<?php
namespace App\Service;

use App\Models\Employee;

class HomeServices
{
    public function getEmployee()
    {
        $data = Employee::all();

        if (!$data) {
            $data = [];
        }

        return $data;
    }
}
