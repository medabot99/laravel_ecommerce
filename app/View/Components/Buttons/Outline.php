<?php

namespace App\View\Components\Buttons;

use Illuminate\View\Component;

class Outline extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $id;
    public $placeholder;
    public $color;
    public $type;
    public $link;
    public $size;
    public $flat;
    public $addClass;
    public $icon;

    public function __construct($id = null, $placeholder = null, $type = null, $color = null, 
                                $link = null, $size = null, $flat = false, $addClass = null, $icon = null)
    {
        $this->id = $id;
        $this->placeholder = $placeholder;
        $this->color = $color;
        $this->type = $type;
        $this->link = $link;
        $this->size = $size;
        $this->flat = $flat;
        $this->addClass = $addClass;
        $this->icon = $icon;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.buttons.outline');
    }
}
