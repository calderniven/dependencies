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

        foreach ($slots as $slot => $value) {
            $template = str_replace("@slot('$slot')", $value, $template);
        }

        return $template;
    }
}