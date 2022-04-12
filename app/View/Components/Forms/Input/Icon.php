<?php

namespace App\View\Components\Forms\Input;

use Illuminate\View\Component;

class Icon extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $id;
    public $placeholder;
    public $value;
    public $type;
    public $icon;
    public $position;

    public function __construct($id = null, $placeholder = null, $type = null, $value = null, $icon = null, $position = null)
    {
        $this->id = $id;
        $this->placeholder = $placeholder;
        $this->value = $value;
        $this->type = $type;
        $this->icon = $icon;
        $this->position = $position;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.forms.input.icon');
    }
}
