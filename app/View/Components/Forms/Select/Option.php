<?php

namespace App\View\Components\Forms\Select;

use Illuminate\View\Component;

class Option extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $placeholder;
    public $value;
    public $selected;

    public function __construct($value = null, $placeholder = null, $selected = null)
    {
        $this->value = $value;
        $this->placeholder = $placeholder;
        $this->selected = $selected;
    }

    public function isSelected($option)
    {
        return $option === $this->selected;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.forms.select.option');
    }
}
