<?php

namespace App\Interfaces;

interface IBaseRepository
{
    public function Get();
    public function Find($id);
    public function Delete($id);
}