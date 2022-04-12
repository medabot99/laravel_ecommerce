<?php

namespace App\View\Components\Templates;

use Illuminate\View\Component;

class Datatable extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $id;
    public $title;
    public $theaders;
    public $hover;

    public function __construct($id = null, $title = null, $theaders = null, $hover = false)
    {
        $this->id = $id;
        $this->title = $title;
        $this->theaders = $theaders;
        $this->hover = $hover;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.templates.datatable');
    }
}
