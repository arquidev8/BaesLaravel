<script src="https://cdn.tailwindcss.com"></script>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="p-6 text-gray-900 dark:text-gray-900 space-y-4">
    <div class="md:px-12 sm:px-0">
        {{ __("You're logged in!") }}

        <h1>Total de propiedades: {{ $properties->total() }}</h1>

    </div>
        <form method="GET" action="{{ route('dashboard') }}">
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-3 gap-4 md:p-12 sm:0">
                <div>
                    <label for="Price" class="block text-sm font-medium text-gray-700">Precio:</label>
                    <select name="Price" id="price" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="">Todos</option>
                        <option value="50000"{{ request('Price') == '50000' ? ' selected' : '' }}>50.000</option>
                        <option value="100000"{{ request('Price') == '100000' ? ' selected' : '' }}>100.000</option>
                        <!-- Aquí puedes agregar las opciones de precio -->
                    </select>
                </div>
                <div>
                    <label for="Provincia" class="block text-sm font-medium text-gray-700">Provincia:</label>
                    <select name="Provincia" id="provincia" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="">Todos</option>
                        <option value="Murcia"{{ request('Provincia') == 'Murcia' ? ' selected' : '' }}>Murcia</option>
                        <option value="Alicante"{{ request('Provincia') == 'Alicante' ? ' selected' : '' }}>Alicante</option>
                        <option value="Madrid"{{ request('Provincia') == 'Madrid' ? ' selected' : '' }}>Madrid</option>
                        <option value="Barcelona"{{ request('Provincia') == 'Barcelona' ? ' selected' : '' }}>Barcelona</option>
                        <!-- Agrega las opciones de provincia en mayúscula -->
                    </select>
                </div>
                <div>
                    <label for="Ciudad" class="block text-sm font-medium text-gray-700">Ciudad:</label>
                    <select name="Ciudad" id="ciudad" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="Murcia"{{ request('Ciudad') == 'Murcia' ? ' selected' : '' }}>Murcia</option>
                        <option value="Alicante"{{ request('Ciudad') == 'Alicante' ? ' selected' : '' }}>Alicante</option>
                        <option value="Madrid"{{ request('Ciudad') == 'Madrid' ? ' selected' : '' }}>Madrid</option>
                        <option value="Barcelona"{{ request('Ciudad') == 'Barcelona' ? ' selected' : '' }}>Barcelona</option>
                        <option value="Valencia"{{ request('Ciudad') == 'Valencia' ? ' selected' : '' }}>Valencia</option>
                        <option value="Sevilla"{{ request('Ciudad') == 'Sevilla' ? ' selected' : '' }}>Sevilla</option>
                        <option value="Zaragoza"{{ request('Ciudad') == 'Zaragoza' ? ' selected' : '' }}>Zaragoza</option>
                        <option value="Bilbao"{{ request('Ciudad') == 'Bilbao' ? ' selected' : '' }}>Bilbao</option>
                        <option value="Málaga"{{ request('Ciudad') == 'Málaga' ? ' selected' : '' }}>Málaga</option>
                        <option value="Granada"{{ request('Ciudad') == 'Granada' ? ' selected' : '' }}>Granada</option>
                        <option value="Toledo"{{ request('Ciudad') == 'Toledo' ? ' selected' : '' }}>Toledo</option>
                        <option value="Valencia"{{ request('Ciudad') == 'Valencia' ? ' selected' : '' }}>Valencia</option>
                        <option value="Palma de Mallorca"{{ request('Ciudad') == 'Palma de Mallorca' ? ' selected' : '' }}>Palma de Mallorca</option>
                            
                        <!-- Agrega las opciones de ciudad en mayúscula -->
                    </select>
                </div>
                <div class="col-span-2">
                    <label for="Search" class="block text-sm font-medium text-gray-700">Buscar:</label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <input type="text" name="Search" id="search" value="{{ request('Search') }}" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="Buscar...">
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                            <!-- Heroicon name: solid/search -->
                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M13.828 11.172a7.5 7.5 0 111.414-1.414l3.34 3.342a1 1 0 01-1.414 1.414l-3.34-3.342zm-5.656-2.828a5 5 0 110 7.072 5 5 0 010-7.072z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="col-span-3 flex items-center justify-between">
                    <button type="submit" class="inline-block w-full sm:w-auto px-6 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Filtrar
                    </button>
                    <a href="{{ route('dashboard') }}" class="text-sm text-indigo-600 hover:text-indigo-900">Restablecer</a>
                </div>
            </div>
        </form>

        {{-- <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
            @foreach ($properties as $property)
                @include('components.card', ['property' => $property])
            @endforeach
        </div> --}}

        <div  class="grid grid-cols-1 sm:grid-cols-4 md:grid-cols-4 gap-4 md:p-6 sm:p-0">
            @foreach ($properties as $property)
                @include('components.card', ['property' => $property])
            @endforeach
        </div>

        {{ $properties->links() }}
    </div>
</x-app-layout>