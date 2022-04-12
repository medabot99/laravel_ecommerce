<?php

namespace App\View\Components\Gallery;

use Illuminate\View\Component;

class Image extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

     /*

     *Example

     <div class="filtr-item col-sm-2" data-category="2, 4" data-sort="black sample">
            <a href="https://via.placeholder.com/1200/000000.png?text=2" data-toggle="lightbox" data-title="sample 2 - black">
              <img src="https://via.placeholder.com/300/000000?text=2" class="img-fluid mb-2" alt="black sample"/>
            </a>
          </div>

    */
    public $category;
    public $sortCategory;
    public $title;
    public $type;
    public $url;
    public $thumbnail;

    public function __construct($category = null, $sortCategory = null, $title = null, $type = null, $url = null, $thumbnail = null)
    {
        $this->category = $category;
        $this->sortCategory = $sortCategory;
        $this->title = $title;
        $this->type = $type;
        $this->url = $url;
        $this->thumbnail = $thumbnail;
    }

    public function getUrl(){

      if ($this->type == 'image'){
        return asset("/storage/{$this->url}");
      }

      return $this->url;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.gallery.image');
    }
}
