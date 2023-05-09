<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use Config\Cache;

class Hook extends BaseController
{
    use ResponseTrait;
    public function index()
    {
        $x_hook_secret    = $this->request->header('X-Hook-Secret') ? $this->request->header('X-Hook-Secret')->getValue() : null;
        $x_hook_signature = $this->request->header('X-Hook-Signature')? $this->request->header('X-Hook-Signature')->getValue() : null;
        $body             = $this->request->getBody();

        if ( $x_hook_secret )
        {
            log_message('debug', 'Get X Hook Secret: ' . $x_hook_secret, []);
            $this->response->setHeader('X-Hook-Secret', $x_hook_secret);
            $this->response->setStatusCode(201);
            $this->respond([]);
        } 
        // else if ( $x_hook_signature )
        // {
        //     log_message('debug', 'Get X Hook Signature: ' . $x_hook_signature, []);
        //     $computedSignature = hash_hmac('SHA256', (string) $body, '2ca8950d5524b5761eb4aa6bad923605');
        //     log_message('debug', 'Create X Hook Signature: ' . $computedSignature, []);
        //     if ( 0 != strcmp($computedSignature, $x_hook_signature) )
        //     {
        //         log_message('debug', 'X Hook Signature: ' . $x_hook_signature, []);
        //         log_message('debug', 'Computed Signature: ' . $computedSignature, []);
        //         log_message('error', 'They are not equal!', []);
        //         return $this->respond([], 401);
        //     }
        //     log_message('debug', 'Authorized successed!');
        // }
        error_log($body);
        
        log_message('debug', $body);
    }
}
