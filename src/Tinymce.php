<?php

namespace Jacobfitzp\NovaTinymce;

use Laravel\Nova\Fields\Field;

/**
 * TinyMCE editor field.
 *
 * @author Jacob Fitzpatrick
 */
class Tinymce extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'nova-tinymce';

    /**
     * Indicates if the element should be shown on the index view.
     *
     * @var bool
     */
    public $showOnIndex = false;

    public function __construct($name, $attribute = null, callable $resolveCallback = null)
    {
        parent::__construct($name, $attribute, $resolveCallback);

        $this->withMeta([
            'options' => config('nova-tinymce'),
            // Need to make the CSRF token available to the component.
            // This will allow us to use CSRF protection for the storage endpoint.
            'token' => csrf_token(),
        ]);
    }

    /**
     * Set API key to use.
     *
     * @param string $key
     * @return self
     */
    public function apiKey(string $key): self
    {
        return $this->withMeta(['api_key' => $key]);
    }

    /**
     * Set plugins to use.
     *
     * @param array<string> $plugins
     * @return self
     */
    public function plugins(array $plugins): self
    {
        return $this->withMeta(['plugins' => $plugins]);
    }

    /**
     * Set toolbar configuration to use.
     *
     * @param string|null $toolbar
     * @return self
     */
    public function toolbar(?string $toolbar): self
    {
        return $this->withMeta(['toolbar' => $toolbar]);
    }

    /**
     * Set editor init options to use.
     *
     * @param array<string, mixed> $params
     * @return self
     */
    public function init(array $params): self
    {
        return $this->withMeta(['init' => $params]);
    }
}
