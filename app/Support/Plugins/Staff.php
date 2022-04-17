<?php

namespace Vanguard\Support\Plugins;

use Vanguard\Plugins\Plugin;
use Vanguard\Support\Sidebar\Item;

class Staff extends Plugin
{
    public function sidebar()
    {
        return Item::create(__('Staff'))
            ->route('staff.index')
            ->icon('fas fa-users')
            ->active("staff*");
    } 
}
