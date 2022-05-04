<?php

namespace Shopping;

class User
{
    public int $contractLength;

    public function __construct(int $contractLength)
    {
        $this->contractLength = $contractLength;
    }
}