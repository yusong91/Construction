<?php

namespace Vanguard\Support\Plugins;

use Vanguard\Plugins\Plugin;
use Vanguard\Support\Sidebar\Item;

class CommonCode extends Plugin
{
    public function sidebar()
    {
        return Item::create(__('Common-Code'))
            ->route('common-codes.index')
            ->icon('fas fa-users')
            ->active("common*");
    } 
}
