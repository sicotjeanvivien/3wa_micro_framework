<?php

abstract class Controller
{

    /**
     * @var string $path
     */
    private string $path;

    public function __construct(string $path) {
        $this->path = $path;
    }

    public function renderView()
    {
        require $this->path;
    }

}
