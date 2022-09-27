<?php

class JsonResponse
{
    public static function Create($success, $data, $props = null)
    {
        if ($success) {
            return json_encode(array_merge(array(
                "result" => "success",
                "data"   => $data,
            ), is_array($props) ? $props : array()));
        } else {
            return json_encode(array(
                "result" => "error",
                "error"  => $data,
            ));
        }
    }

    public static function Success($data, $props = null) {
        return self::Create(true, $data, $props);
    }

    public static function Error($data) {
        return self::Create(false, $data);
    }
}