<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Category;

class PostHeader extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $mainCategory;

    public function __construct($mainCategory)
    {
        $this->mainCategory = $mainCategory;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.post-header',[
            'categories' => Category::all(),
            'mainCategory' => $this->mainCategory,
        ]);
    }
}
