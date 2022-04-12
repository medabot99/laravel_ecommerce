<?php

namespace App\View\Components\Forms\Select;

use Illuminate\View\Component;

class Quick extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $id;
    public $placeholder;

    public function __construct($id = null, $placeholder = null)
    {
        $this->id = $id;
        $this->placeholder = $placeholder;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.forms.select.quick');
    }
}
