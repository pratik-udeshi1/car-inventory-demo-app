<?php

namespace app\helper;

class Helper
{
    // Checking for empty variables
    public static function isEmpty($var)
    {
        if (is_array($var)) {

            foreach ($var as $key => $input) {
                Self::isEmpty($input);
            }

        } else {
            if (isset($var) && !empty($var) && trim($var)) {
                return $var;
            } else {
                echo json_encode("Input field cannot be blank!");
                die;
            }
        }
    }

    // Validating image format / size
    public static function validateImage($image_arr)
    {
        foreach ($image_arr as $key => $img_arr) {

            if (isset($img_arr)) {

                $errors  = [];
                $maxsize = 2097152; // allowing only 2 MB upload

                $acceptable = ['image/jpeg', 'image/jpg', 'image/png'];

                if (($img_arr['size'] >= $maxsize) || ($img_arr["size"] == 0)) {
                    $errors[] = 'File too large. File must be less than 2 megabytes.';
                }

                // Only accepting images upload.
                if ((!in_array($img_arr['type'], $acceptable)) && (!empty($img_arr["type"]))) {

                    $errors[] = 'Invalid file type. Only PDF, JPG, GIF and PNG types are accepted.';
                }

                // Returning back with errors.
                if (count($errors) > 0) {

                    foreach ($errors as $error) {
                        echo $error;
                    }

                    die;
                }
            } else {
                echo "Images are required";
                die;
            }
        }
    }
}
