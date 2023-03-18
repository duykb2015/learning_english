<?php

/**
 * An improve funtion of var_dump that dumps information about a variable
 * 
 * @param mixed $value The variable you want to export
 * @param bool $exit Exit the script after dumping?
 * @return void
 */

function pre($value, bool $exit = true)
{
    echo '<pre>';
    print_r($value);
    echo '</pre>';
    if ($exit) {
        die;
    }
}

/**
 * Encrypt email to protect it from hackers
 * 
 * @param string $email Email to encrypt
 * @return string Encrypted email
 */
function encrypt_email($email)
{
    for ($i = 4; $i < strlen($email); $i++) {
        $email[$i] = '*';
    }
    return $email;
}

/**
 * Get time ago in a human readable format
 * 
 * @param int $time Time in seconds
 * @return string Time ago
 */
function get_time_ago($time)
{
    $time_difference = time() - $time;
    if ($time_difference < 1) {
        return 'Ít hơn 1 giây trước';
    }
    $condition = array(
        12 * 30 * 24 * 60 * 60 =>  'năm',
        30 * 24 * 60 * 60       =>  'tháng',
        24 * 60 * 60            =>  'ngày',
        60 * 60                 =>  'giờ',
        60                      =>  'phút',
        1                       =>  'giây'
    );

    foreach ($condition as $secs => $str) {
        $d = $time_difference / $secs;

        if ($d >= 1) {
            $t = round($d);
            return $t . ' ' . $str . ' trước';
        }
    }
}
/**
 * Provide response message for failed request
 * 
 * @param string $error Error message to show
 * @return array an array of data for failed response
 */
function responseFailed($error = null)
{
    return [
        'success' => false,
        'message' => 'Có lỗi xảy ra',
        'result' =>  [
            'error' => ($error != null) ? $error : 'Có lỗi xảy ra, thử lại sau'
        ]
    ];
}

/**
 * Provide response message for successful request
 * 
 * @return array an array of data for successed response
 */
function responseSuccessed($msg = null)
{
    return [
        'success' => true,
        'message' => $msg ?? 'Thành công'
    ];
}


/**
 * Provide a set of error messages in Vietnamese language.
 * 
 * @return array an array of error messages 
 */
function customValidationErrorMessage()
{
    return [
        'username' => [
            'required' => 'Tài khoản không được để trống!',
        ],
        'email' => [
            'required' => 'Email không được để trống!',
            'valid_email' => 'Email không hợp lệ!',
        ],
        'password' => [
            'required' => 'Mật khẩu không được để trống!',
            'min_length' => 'Mật khẩu có ít nhất 3 kí tự!',
        ],
        'firstname' => [
            'required' => 'Họ không được để trống!',
        ],
        'lastname' => [
            'required' => 'Họ không được để trống!',
        ],
        'telephone' => [
            'required' => 'Số điện thoại không được để trống!',
            'min_length' => 'Số điện thoại phải có ít nhất 9 kí tự!',
            'max_length' => 'Vui lòng nhập đúng số điện thoại!',
        ]
    ];
}


/**
 * Convinience redirect with flash message
 * 
 * @param string $url URL to redirect
 * @param mixed $message Message to store in flash session
 * @param string $type Type of message
 * @return \CodeIgniter\HTTP\RedirectResponse destination URL
 */
function redirectWithMessage(string $url, $message, string $type = 'error_msg')
{
    session()->setFlashdata($type, $message);
    return redirect()->to($url);
}

/**
 * Used to create slug from string
 * 
 * @param string $str String to convert to slug
 * @return string Slug
 */
function create_slug($string)
{
    $search = array(
        '#(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)#',
        '#(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)#',
        '#(ì|í|ị|ỉ|ĩ)#',
        '#(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)#',
        '#(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)#',
        '#(ỳ|ý|ỵ|ỷ|ỹ)#',
        '#(đ)#',
        '#(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)#',
        '#(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)#',
        '#(Ì|Í|Ị|Ỉ|Ĩ)#',
        '#(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)#',
        '#(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)#',
        '#(Ỳ|Ý|Ỵ|Ỷ|Ỹ)#',
        '#(Đ)#',
        "/[^a-zA-Z0-9\-\_]/",
    );
    $replace = array(
        'a',
        'e',
        'i',
        'o',
        'u',
        'y',
        'd',
        'A',
        'E',
        'I',
        'O',
        'U',
        'Y',
        'D',
        '-',
    );
    $string = preg_replace($search, $replace, $string);
    $string = preg_replace('/(-)+/', '-', $string);
    $string = strtolower($string);
    return $string;
}

function public_url($url = null)
{
    return base_url() . '/public/' . $url;
}

/**
 * Used to remove file from server, if exists
 *
 * @param string $images json encode string of images name
 * @return bool TRUE on success or FALSE on failure
 */
function remove($fileName, $path = null)
{
    return $fileName;
    $file = $path . is_array($fileName) ? $fileName['image'] : $fileName;
    if (!file_exists($file)) {
        return false;
    }
    return unlink($file);;
}


/**
 * Return local filesize
 * 
 * @param string $file_name Path to file
 * @param int $index the size of file will return in
 * 
 * 0 - bytes (B)
 * 
 * 1 - kilobytes (KB)
 * 
 * 2 - megabytes (MB)
 * 
 * 3 - gigabytes (GB)
 * 
 * @return int|bool size of file, FALSE on failure

 */
function get_file_size(string $filename, int $index = 0)
{
    if (!file_exists($filename)) {
        return false;
    }
    $size = filesize($filename);
    if (!$size) {
        return false;
    }
    switch ($index) {
        case 1:
            return round($size / 1024, 2);
        case 2:
            return round($size / pow(1024, 2), 2);
        case 3:
            return round($size / pow(1024, 3), 2);
        default:
            return $size;
    }
}
