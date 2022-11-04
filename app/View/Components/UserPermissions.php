<?php

namespace App\View\Components;

use App\Cities;
use Illuminate\View\Component;

class UserPermissions extends Component
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
        $data = [
            // Fake implementation, but could be a real one
            'permissions' => ['edit_photos', 'delete_photos'],
            'cities' => Cities::get(),
        ];

        return view('components.user-permissions', $data);
    }
}
