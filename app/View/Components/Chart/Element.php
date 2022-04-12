<?php

namespace App\View\Components\Chart;

use Illuminate\View\Component;

class Element extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $title;
    public $id;
    public $style;

    public function __construct($title = null, $id = null, $style = null)
    {
        $this->title = $title;
        $this->id = $id;
        $this->style = $style;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.chart.element');
    }
}
