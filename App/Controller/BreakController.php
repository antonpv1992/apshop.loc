<?php

namespace App\Controller;

class BreakController
{

    public function notFound($message)
    {
        http_response_code(404);
        echo "<span class='mistake'>$message<span>";
    }

}