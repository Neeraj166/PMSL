<?php

namespace App\View\Components;

use App\Models\categories;
use Illuminate\View\Component;

class header extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.header',
           ['catego'=>categories::all()->whereNull('category_id')],
           ['subcat'=>categories::all()->whereNOTNULL('category_id')->where('status','1')]
        );
    }
}
