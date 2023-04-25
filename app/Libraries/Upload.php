<?php

namespace App\Libraries;

use CodeIgniter\Config\Services;

/**
 * Upload file class
 */
class Upload
{

    /**
     * Validate file upload
     * 
     * @param string $name_from_input name of input file
     * @return bool true if valid, false if not
     */
    public function validation_image(string $name_from_input)
    {
        $validationRule = [
            $name_from_input => [
                'label' => 'Image File',
                'rules' => 'uploaded[' . $name_from_input . ']'
                    . '|is_image[' . $name_from_input . ']'
                    . '|mime_in[' . $name_from_input . ', image/jpg, image/jpeg, image/gif, image/png, image/webp]'
                    . '|max_size[' . $name_from_input . ',5120]' // 5MB
                //. '|max_dims['.$name_from_input.',1024,768]',
            ],
        ];
        $validate = Services::validation();
        if (!$validate->setRules($validationRule)) {
            return false;
        }
        return true;
    }

    /**
     * Used to upload multiple images to server
     *
     * @param mixed $images Images to upload
     * @param string $name_from_input Name of input field
     * @return array|bool a string name of uploaded images or FALSE on failure
     */
    function multiple_images($images, $name_from_input = 'images')
    {
        foreach ($images[$name_from_input] as $img) {
            if (!$img->isValid() || $img->hasMoved()) {
                return false;
            }
            $newName = $img->getRandomName();
            $file_name[] = $newName;
            $img->move(IMAGE_PATH, $newName);
        }
        return $file_name;
    }

    function singleImages($img)
    {
        if (!$img->isValid() || $img->hasMoved()) {
            return false;
        }
        $newName = $img->getRandomName();
        $fileName[] = $newName;
        $img->move(IMAGE_PATH, $newName);
        return $fileName;
    }

    /**
     * Used to upload multiple images to server
     *
     * @param mixed $images Images to upload
     * @param string $name_from_input Name of input field
     * @return array|bool a string name of uploaded images or FALSE on failure
     */
    function audio($file)
    {
        if (!$file->isValid() || $file->hasMoved()) {
            return false;
        }
        $newName = $file->getRandomName();
        $file_name[] = $newName;
        $file->move(AUDIO_PATH, $newName);
        return $file_name;
    }
}
