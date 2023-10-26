<?php

namespace App\Http\Controllers;

use App\Models\AlisedaProperty;
use App\Models\DigloProperty;
use App\Models\SolviaProperty;

class PropertyController extends Controller
{
    public function show($referencia)
    {
        $property = null;

        $models = [AlisedaProperty::class, DigloProperty::class, SolviaProperty::class];

        foreach ($models as $model) {
            $property = $model::where('Referencia', $referencia)->first();

            if (!is_null($property)) {
                break;
            }
        }

        if (is_null($property)) {
            abort(404);
        }

        return view('property', compact('property'));
    }
}