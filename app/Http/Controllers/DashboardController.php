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
        $provincia = $request->has('Provincia') && $request->Provincia != '' ? Str::lower($request->Provincia) : null;

        $price = $request->has('Price') && $request->Price != '' ? intval($request->Price) : null;

        $ciudad = $request->has('Ciudad') && $request->Ciudad != '' ? Str::lower($request->Ciudad) : null;

        $search = $request->has('Search') && $request->Search != '' ? Str::lower($request->Search) : null;

        if ($price === 0) {
            // Si el precio no puede ser convertido a un entero, redirige al usuario a la misma página con un mensaje de error
            return redirect()->back()->withErrors('Precio inválido');
        }

        $models = [AlisedaProperty::class, DigloProperty::class, SolviaProperty::class];

        $propertiesQuery = collect();

        foreach ($models as $model) {
            $query = $model::query();

            if ($provincia) {
                $query->whereRaw('LOWER(Provincia) = ?', $provincia);
            }

            if ($ciudad) {
                $query->whereRaw('LOWER(Ciudad) = ?', $ciudad);
            }

            $query->where('Provincia', '!=', 'N/A')
                ->where('Ciudad', '!=', 'N/A')
                ->where('Direccion', '!=', 'N/A')
                ->where('Title', '!=', 'N/A')
                ->where('Referencia', '!=', 'N/A')
                ->where('Price', '!=', ['A', 'N/A']);

            if ($search) {
                $query->where(function($query) use ($search) {
                    $query->whereRaw('LOWER(Provincia) LIKE ?', '%' . $search . '%')
                        ->orWhereRaw('LOWER(Ciudad) LIKE ?', '%' . $search . '%')
                        ->orWhereRaw('LOWER(Direccion) LIKE ?', '%' . $search . '%')
                        ->orWhereRaw('LOWER(Title) LIKE ?', '%' . $search . '%')
                        ->orWhereRaw('LOWER(Referencia) LIKE ?', '%' . $search . '%');
                });
            }

            $propertiesQuery->push($query);
        }

        $sortByPrice = false;

        //...

        if ($price) {
            $propertiesQuery = $propertiesQuery->map(function ($query) use ($price, &$sortByPrice) {  //pasamos $sortByPrice como referencia &
                $sortByPrice = true; //cambiamos la bandera para detectar que se aplicó un orden por precio
                return $query->selectRaw(
                    sprintf(
                        '%s.*, ABS(Price - %d) as PriceDifference',
                        $query->getQuery()->from,
                        $price
                    )
                )->where('Price', '<=', $price)->orderBy('Price', 'DESC');
            });
        }

        $properties = $propertiesQuery->flatMap(function ($query) {
            return $query->get();
        });

        if (!$sortByPrice) { //si la bandera está en false, entonces no se ha hecho una ordenación por precio
            $properties = $properties->sortByDesc('created_at'); //usamos sort para ordenar por fecha de creación de mayor a menor
        }


        $page = $request->query('page', 1);
        $perPage = 30;
        $offset = ($page - 1) * $perPage;

        $properties = new \Illuminate\Pagination\LengthAwarePaginator(
            $properties->slice($offset, $perPage),
            $propertiesQuery->sum(function ($query) {
                return $query->count();
            }),
            $perPage,
            $page,
            ['path' => $request->url(), 'query' => $request->query()]
        );

        return view('dashboard', compact('properties'));
    }

    public function propertyDetails($referencia)
    {
    $property = AlisedaProperty::where('Referencia', $referencia)->firstOrFail();

    return view('property-details', compact('property'));
    }

    
}
