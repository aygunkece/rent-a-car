<?php

namespace App\Traits;

trait SweetAlert
{
    const TYPES = [
        "success",
        "info",
        "error",
        "warning"
    ];

    /**
     * @param string $type
     * @param string $title
     * @param string $message
     * @return void
     */
    function rsAlert(string $type = "info", string $title, string $message): void
    {
        if (!in_array($type, self::TYPES))
        {
            $type = "info";
        }
        alert()->$type($title, $message)
            ->showConfirmButton('Tamam', '#3085d6');
    }
}
