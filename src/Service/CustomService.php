<?php


namespace App\Service;


use Artgris\Bundle\FileManagerBundle\Service\CustomConfServiceInterface;

class CustomService implements CustomConfServiceInterface
{
    public function getConf($extra = [])
    {
        return [
            'dir' => '../public/uploads/'
        ];

    }
}