<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class UploadController extends BaseController
{
    
    public function upload_excel()
    {
        return view('Admin/Question/Upload/upload_excel');
    }
}
