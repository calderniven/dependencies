<?php

namespace Framework\Renderer;

class Renderer {
    public function __construct(
        public string $view
    ) {}

    public function render()
    {
        $view = view_path($this->view);

        return file_get_contents($view);
    }
}