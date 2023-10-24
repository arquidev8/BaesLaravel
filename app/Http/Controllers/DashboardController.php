<?php

namespace App\Http\Controllers;

use App\Models\AlisedaProperty;
use App\Models\DigloProperty;
use App\Models\SolviaProperty;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $properties = collect();

        $provincia = $request->has('Provincia') && $request->Provincia != '' ? Str::lower($request->Provincia) : null;

        $price = $request->has('Price') && $request->Price != '' ? intval($request->Price) : null;

        $ciudad = $request->has('Ciudad') && $request->Ciudad != '' ? Str::lower($request->Ciudad) : null;

        if ($price === 0) {
            // Si el precio no puede ser convertido a un entero, redirige al usuario a la misma página con un mensaje de error
            return redirect()->back()->withErrors('Precio inválido');
        }

        $models = [AlisedaProperty::class, DigloProperty::class, SolviaProperty::class];

        foreach ($models as $model) {
            $query = $model::query();

            if ($provincia) {
                $query->whereRaw('LOWER(Provincia) = ?', $provincia);
            }

            if ($price) {
                $query->where('Price', '<=', $price);
            }

            if ($ciudad) {
                $query->whereRaw('LOWER(Ciudad) = ?', $ciudad);
            }

            $properties = $properties->concat($query->get());
        }

        return view('dashboard', compact('properties'));
    }
}
