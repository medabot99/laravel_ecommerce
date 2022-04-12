<?php

namespace App\View\Components\Forms\Input;

use Illuminate\View\Component;

class Flat extends Component
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

    public function __construct($id = null, $placeholder = null, $type = null, $value = null)
    {
        $this->id = $id;
        $this->placeholder = $placeholder;
        $this->value = $value;
        $this->type = $type;
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.forms.input.flat');
    }
}
