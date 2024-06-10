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
            // Make configuration options available to the component.
            'options' => config('nova-tinymce'),
            // Need to make the CSRF token available to the component.
            // This will allow us to use CSRF protection for the storage endpoint.
            'token' => csrf_token(),
        ]);
    }
}
