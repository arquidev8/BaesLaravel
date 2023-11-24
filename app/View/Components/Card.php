<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Card extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    // public function render(): View|Closure|string
    // {
    //     return view('components.card');
    // }

    public function render(): View|Closure|string
    {
        return view('components.card')
            ->with('isValidImageUrl', function($url) {
                $curl = curl_init($url);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
                curl_exec($curl);
                $statusCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
                curl_close($curl);
                return $statusCode === 200;
            });
    }
}
