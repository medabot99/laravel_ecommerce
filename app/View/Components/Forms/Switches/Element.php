<?php

namespace App\View\Components\Forms\Switches;

use Illuminate\View\Component;

class Element extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $id;
    public $placeholder;
    public $value;
    public $checked;
    public $color;

    public function __construct($id = null, $placeholder = null, $value = null, $checked = null, $color = null)
    {
        $this->id = $id;
        $this->placeholder = $placeholder;
        $this->value = $value;
        $this->checked = $checked;
        $this->color = $color;
    }

    public function isChecked($option)
    {
        return $option === $this->checked;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.forms.switches.element');
    }
}
