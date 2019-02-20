<?php

if (!function_exists('uploadFile')) {
    /**
     * @param $type
     * @param $field
     * @param $path
     * @return bool|string
     */
    function uploadFile($type, $field, $path)
    {
        $allowType = array(
            'img' => array(
                'image/gif',
                'image/ief',
                'image/jpeg',
                'image/png',
                'image/tiff',
                'image/x-ms-bmp',
            )
        );
        $url = '';
        if (!isset($allowType[$type])) {
            return false;
        }
        $request = app('Request');
        if ($request::hasFile($field)) {
            $pic = $request::file($field);
            if (in_array($pic->getMimeType(), $allowType[$type])) {
                if ($pic->isValid()) {
                    $newName = md5(rand(1, 1000) . $pic->getClientOriginalName()) . "." . $pic->getClientOriginalExtension();
                    $pic->move($path, $newName);
                    $url = $newName;
                }
            }
        }
        return $url;
    }
}
