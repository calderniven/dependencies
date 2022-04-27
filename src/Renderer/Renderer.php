<?php

namespace Framework\Renderer;

class Renderer {
    public function __construct(
        public string $view
    ) {}

    public function render(array $slots): string
    {
        $path = view_path($this->view);

        $template = file_get_contents($path);

        $replacement = '';

        if (array_key_exists('body', $slots)) {
            $replacement = $slots['body'];
        }

        return str_replace("@slot('body')", $replacement, $template);
    }
}