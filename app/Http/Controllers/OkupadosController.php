<?php

namespace App\Http\Controllers;

use App\Models\OkupadosProperty;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;
use PHPExcel_IOFactory;
use Illuminate\Support\Str;

class OkupadosController extends Controller
{
    public function showOkupados(Request $request)
    {
        $provincia = $request->has('Provincia') && $request->Provincia != '' ? Str::lower($request->Provincia) : null;

        $price = $request->has('Price') && $request->Price != '' ? intval($request->Price) : null;

        $ciudad = $request->has('Ciudad') && $request->Ciudad != '' ? Str::lower($request->Ciudad) : null;

        $search = $request->has('Search') && $request->Search != '' ? Str::lower($request->Search) : null;

        if ($price === 0) {
            // Si el precio no puede ser convertido a un entero, redirige al usuario a la misma página con un mensaje de error
            return redirect()->back()->withErrors('Precio inválido');
        }

        $propertiesQuery = OkupadosProperty::query();

        $propertiesQuery->where('Provincia', '!=','N/A')
        ->where('Ciudad', '!=', 'N/A')
        ->where('Direccion', '!=', 'N/A')
        ->where('Referencia', '!=', 'N/A');

    if ($price) {
        $propertiesQuery->where('Price', '!=', ['A', 'N/A']);
        if ($provincia) {
            $propertiesQuery->whereRaw('LOWER(Provincia) = ?', $provincia);
        }

        if ($ciudad) {
            $propertiesQuery->whereRaw('LOWER(Ciudad) = ?', $ciudad);
        }

        if ($search) {
            $propertiesQuery->where(function($query) use ($search) {
                $query->whereRaw('LOWER(Provincia) LIKE ?', '%' . $search . '%')
                    ->orWhereRaw('LOWER(Ciudad) LIKE ?', '%' . $search . '%')
                    ->orWhereRaw('LOWER(Direccion) LIKE ?', '%' . $search . '%')
                    ->orWhereRaw('LOWER(Referencia) LIKE ?', '%' . $search . '%');
            });
        }
        $filteredTotal = $propertiesQuery->where('Price', '<=', $price)->orWhereNull('Price')->count(); // Calcular filteredTotal
        $properties = $propertiesQuery->where('Price', '<=', $price)->orWhereNull('Price')->paginate(30); // Aplicar el filtro de precio
    } else {
        if ($provincia) {
            $propertiesQuery->whereRaw('LOWER(Provincia) = ?', $provincia);
        }

        if ($ciudad) {
            $propertiesQuery->whereRaw('LOWER(Ciudad) = ?', $ciudad);
        }

        if ($search) {
            $propertiesQuery->where(function($query) use ($search) {
                $query->whereRaw('LOWER(Provincia) LIKE ?', '%' . $search . '%')
                    ->orWhereRaw('LOWER(Ciudad) LIKE ?', '%' . $search . '%')
                    ->orWhereRaw('LOWER(Direccion) LIKE ?', '%' . $search . '%')
                    ->orWhereRaw('LOWER(Referencia) LIKE ?', '%' . $search . '%');
            });
        }
        $filteredTotal = $propertiesQuery->count(); // Calcular filteredTotal
        $properties = $propertiesQuery->paginate(30); // Sin aplicar filtro de precio
    }

    return view('okupados', compact('properties', 'filteredTotal', 'price'));
    }

}