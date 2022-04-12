<?php

namespace App\View\Components\Forms\CheckboxRadio;

use Illuminate\View\Component;

class Label extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $label;

    public function __construct($label = null)
    {
        $this->label = $label;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.forms.checkbox-radio.label');
    }
}
