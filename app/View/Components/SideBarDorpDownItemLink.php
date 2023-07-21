<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SideBarDorpDownItemLink extends Component
{
    public $link,$name,$class;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($link="#",$name="Side Bar Link",$class="")
    {
        $this->name = $name;
        $this->link = $link;
        $this->class =$class;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.side-bar-drop-down-item-link');
    }
}
