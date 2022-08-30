<?php

namespace App\Services;

interface Newsletter
{
    public function submit(String $email, String $list = null);
}