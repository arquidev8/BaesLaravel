<script src="https://cdn.tailwindcss.com"></script>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

   <div class="p-6 text-gray-900 dark:text-gray-900">
    {{ __("You're logged in!") }}

    <p>Total de propiedades: {{ $properties->count() }}</p>

    
    <form method="GET" action="{{ route('dashboard') }}" class="space-y-4">
    <label for="Price" class="block text-sm font-medium text-gray-700">Precio:</label>
    <select name="Price" id="price" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        <option value="">Todos</option>
        <option value="50000"{{ request('Price') == '50000' ? ' selected' : '' }}>50.000</option>
        <option value="100000"{{ request('Price') == '100000' ? ' selected' : '' }}>100.000</option>
        <!-- Aquí puedes agregar las opciones de precio -->
    </select>

    <label for="Provincia" class="block text-sm font-medium text-gray-700">Provincia:</label>
    <select name="Provincia" id="provincia" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        <option value="Murcia"{{ request('Provincia') == 'Murcia' ? ' selected' : '' }}>Murcia</option>
        <option value="Alicante"{{ request('Provincia') == 'Alicante' ? ' selected' : '' }}>Alicante</option>
        <option value="Madrid"{{ request('Provincia') == 'Madrid' ? ' selected' : '' }}>Madrid</option>
        <option value="Barcelona"{{ request('Provincia') == 'Barcelona' ? ' selected' : '' }}>Barcelona</option>
        <!-- Agrega las opciones de provincia en mayúscula -->
    </select>

    <div class="flex items-center justify-between">
        <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Filtrar
        </button>
        <a href="{{ route('dashboard') }}" class="text-sm text-indigo-600 hover:text-indigo-900">Restablecer</a>
    </div>
</form>


    <div class="grid grid-cols-3 gap-4 text-gray-900 dark:text-gray-100">
        @foreach ($properties as $property)
            @include('components.card', ['property' => $property])
        @endforeach
    </div>
</div>
                  
                
</x-app-layout>
