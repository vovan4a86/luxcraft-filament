<?php
namespace App\Traits;

trait HasH1
{
    public function getH1()
    {
        return $this->h1 ?: $this->name;
    }
}
