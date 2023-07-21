<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SideBarDorpDownItem extends Component
{
    public $name,$class,$link;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name="SideBarDropDownItem",$class="fas fa-link",$link=null)
    {
        $this->name = $name;
        $this->class = $class;
        $this->link = $link;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.side-bar-drop-down-item');
    }
}
