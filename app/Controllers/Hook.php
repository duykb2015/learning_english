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
            cache()->save('X-Hook-Secret', $x_hook_secret, 300);
            $this->response->setHeader('X-Hook-Secret', $x_hook_secret);
            $this->response->setStatusCode(201);
            $this->respond([]);
        } else if ( $x_hook_signature )
        {
            log_message('debug', 'Get X Hook Signature: ' . $x_hook_signature, []);
            $computedSignature = hash_hmac('SHA256', (string) $body, cache()->get('X-Hook-Secret'));
            log_message('debug', 'Create X Hook Signature: ' . $x_hook_secret, []);
        }
        
        log_message('debug', $body);
    }
}
