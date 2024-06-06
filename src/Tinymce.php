<?php

namespace Jacobfitzp\NovaTinymce;

use Laravel\Nova\Fields\Field;

class Tinymce extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'nova-tinymce';

    public function __construct($name, $attribute = null, callable $resolveCallback = null)
    {
        parent::__construct($name, $attribute, $resolveCallback);

        $this->withMeta([
            'api_key' => config('nova-tinymce.api_key'),
            'plugins' => config('nova-tinymce.plugins'),
            'init' => config('nova-tinymce.init'),
        ]);
    }

    public function apiKey(string $key): self
    {
        return $this->withMeta(['api_key' => $key]);
    }

    public function plugins(array $plugins): self
    {
        return $this->withMeta(['plugins' => $plugins]);
    }

    public function init(array $params): self
    {
        return $this->withMeta(['init' => $params]);
    }
}
