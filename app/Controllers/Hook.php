<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;

class Hook extends BaseController
{
    use ResponseTrait;
    public function index()
    {
        $header = $this->request->header('X-Hook-Secret');

        if ( $header )
        {
            $this->response->setHeader('X-Hook-Secret', $header->getValue());
            $this->response->setStatusCode(201);
            $this->respond([]);
        }

        $body = $this->request->getBody();
        log_message('debug', $body);
    }
}
