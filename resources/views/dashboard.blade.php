


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

        {{-- <h1>Total de propiedades: {{ $properties->total() }}</h1> --}}
        {{-- <h1>Total de propiedades: {{ $properties->total() }} ({{ $filteredTotal }} con precio {{ $price }} o menos)</h1> --}}
        <h1>Total de propiedades: {{ $filteredTotal ?? $properties->total() }}</h1>
            {{-- @if ($price !== null)
                <p>({{ $filteredTotal }})</p>
            @endif --}}
       
    </div>
        <form method="GET" action="{{ route('dashboard') }}">
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-3 gap-4 md:p-12 sm:0">
                <div>
                    <label for="Price" class="block text-sm font-medium ">Precio:</label>
                    <select name="Price" id="price" class="select-input mt-1 block w-full py-2 px-3 border text-black border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="">Todos</option>
                        <option value="50000"{{ request('Price') == '50000' ? ' selected' : '' }}>50.000</option>
                        <option value="100000"{{ request('Price') == '100000' ? ' selected' : '' }}>100.000</option>
                        <option value="150000"{{ request('Price') == '150000' ? ' selected' : '' }}>150.000</option>
                        <option value="200000"{{ request('Price') == '200000' ? ' selected' : '' }}>200.000</option>
                        <option value="250000"{{ request('Price') == '250000' ? ' selected' : '' }}>250.000</option>
                        <option value="300000"{{ request('Price') == '300000' ? ' selected' : '' }}>300.000</option>
                        <option value="350000"{{ request('Price') == '350000' ? ' selected' : '' }}>350.000</option>
                        <option value="400000"{{ request('Price') == '400000' ? ' selected' : '' }}>400.000</option>
                        <option value="450000"{{ request('Price') == '450000' ? ' selected' : '' }}>450.000</option>
                        <option value="500000"{{ request('Price') == '500000' ? ' selected' : '' }}>500.000</option>
                        <option value="550000"{{ request('Price') == '550000' ? ' selected' : '' }}>550.000</option>
                        <option value="600000"{{ request('Price') == '600000' ? ' selected' : '' }}>600.000</option>
                        <option value="650000"{{ request('Price') == '650000' ? ' selected' : '' }}>650.000</option>
                        <option value="700000"{{ request('Price') == '700000' ? ' selected' : '' }}>700.000</option>
                        <option value="750000"{{ request('Price') == '750000' ? ' selected' : '' }}>750.000</option>
                        <option value="800000"{{ request('Price') == '800000' ? ' selected' : '' }}>800.000</option>
                        <option value="850000"{{ request('Price') == '850000' ? ' selected' : '' }}>850.000</option>
                        <option value="900000"{{ request('Price') == '900000' ? ' selected' : '' }}>900.000</option>
                        <option value="950000"{{ request('Price') == '950000' ? ' selected' : '' }}>950.000</option>
                        <option value="1000000"{{ request('Price') == '1000000' ? ' selected' : '' }}>1.000.000</option>
                        <option value="1050000"{{ request('Price') == '1050000' ? ' selected' : '' }}>1.050.000</option>
                        <option value="1100000"{{ request('Price') == '1100000' ? ' selected' : '' }}>1.100.000</option>
                        <option value="1150000"{{ request('Price') == '1150000' ? ' selected' : '' }}>1.150.000</option>
                        <option value="1200000"{{ request('Price') == '1200000' ? ' selected' : '' }}>1.200.000</option>
                        <option value="1250000"{{ request('Price') == '1250000' ? ' selected' : '' }}>1.250.000</option>
                        <option value="1300000"{{ request('Price') == '1300000' ? ' selected' : '' }}>1.300.000</option>
                        <option value="1350000"{{ request('Price') == '1350000' ? ' selected' : '' }}>1.350.000</option>
                        <option value="1400000"{{ request('Price') == '1400000' ? ' selected' : '' }}>1.400.000</option>
                        <option value="1450000"{{ request('Price') == '1450000' ? ' selected' : '' }}>1.450.000</option>
                        <option value="1500000"{{ request('Price') == '1500000' ? ' selected' : '' }}>1.500.000</option>
                        <option value="1550000"{{ request('Price') == '1550000' ? ' selected' : '' }}>1.550.000</option>
                        <option value="1600000"{{ request('Price') == '1600000' ? ' selected' : '' }}>1.600.000</option>
                        <option value="1650000"{{ request('Price') == '1650000' ? ' selected' : '' }}>1.650.000</option>
                        <option value="1700000"{{ request('Price') == '1700000' ? ' selected' : '' }}>1.700.000</option>
                        <option value="1750000"{{ request('Price') == '1750000' ? ' selected' : '' }}>1.750.000</option>
                        <option value="1800000"{{ request('Price') == '1800000' ? ' selected' : '' }}>1.800.000</option>
                        <option value="1850000"{{ request('Price') == '1850000' ? ' selected' : '' }}>1.850.000</option>
                        <option value="1900000"{{ request('Price') == '1900000' ? ' selected' : '' }}>1.900.000</option>
                        <option value="1950000"{{ request('Price') == '1950000' ? ' selected' : '' }}>1.950.000</option>
                        <option value="2000000"{{ request('Price') == '2000000' ? ' selected' : '' }}>2.000.000</option>
                        <option value="2500000"{{ request('Price') == '2500000' ? ' selected' : '' }}>2.500.000</option>
                        <option value="3000000"{{ request('Price') == '3000000' ? ' selected' : '' }}>3.000.000</option>
                        <!-- Aquí puedes agregar las opciones de precio -->
                    </select>
                </div>
                <div>
                    <label for="Provincia" class="block text-sm font-medium ">Provincia:</label>
                    <select name="Provincia" id="provincia" class="select-input text-black mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="">Todos</option>
                       <option value="Álava"{{ request('Provincia') == 'Álava' ? ' selected' : '' }}>Álava</option>
                        <option value="Albacete"{{ request('Provincia') == 'Albacete' ? ' selected' : '' }}>Albacete</option>
                        <option value="Alicante"{{ request('Provincia') == 'Alicante' ? ' selected' : '' }}>Alicante</option>
                        <option value="Almería"{{ request('Provincia') == 'Almería' ? ' selected' : '' }}>Almería</option>
                        <option value="Ávila"{{ request('Provincia') == 'Ávila' ? ' selected' : '' }}>Ávila</option>
                        <option value="Badajoz"{{ request('Provincia') == 'Badajoz' ? ' selected' : '' }}>Badajoz</option>
                        <option value="Barcelona"{{ request('Provincia') == 'Barcelona' ? ' selected' : '' }}>Barcelona</option>
                        <option value="Burgos"{{ request('Provincia') == 'Burgos' ? ' selected' : '' }}>Burgos</option>
                        <option value="Cáceres"{{ request('Provincia') == 'Cáceres' ? ' selected' : '' }}>Cáceres</option>
                        <option value="Cádiz"{{ request('Provincia') == 'Cádiz' ? ' selected' : '' }}>Cádiz</option>
                        <option value="Cantabria"{{ request('Provincia') == 'Cantabria' ? ' selected' : '' }}>Cantabria</option>
                        <option value="Castellón"{{ request('Provincia') == 'Castellón' ? ' selected' : '' }}>Castellón</option>
                        <option value="Ciudad Real"{{ request('Provincia') == 'Ciudad Real' ? ' selected' : '' }}>Ciudad Real</option>
                        <option value="Córdoba"{{ request('Provincia') == 'Córdoba' ? ' selected' : '' }}>Córdoba</option>
                        <option value="Cuenca"{{ request('Provincia') == 'Cuenca' ? ' selected' : '' }}>Cuenca</option>
                        <option value="Gerona"{{ request('Provincia') == 'Gerona' ? ' selected' : '' }}>Gerona</option>
                        <option value="Granada"{{ request('Provincia') == 'Granada' ? ' selected' : '' }}>Granada</option>
                        <option value="Guadalajara"{{ request('Provincia') == 'Guadalajara' ? ' selected' : '' }}>Guadalajara</option>
                        <option value="Guipúzcoa"{{ request('Provincia') == 'Guipúzcoa' ? ' selected' : '' }}>Guipúzcoa</option>
                        <option value="Huelva"{{ request('Provincia') == 'Huelva' ? ' selected' : '' }}>Huelva</option>
                        <option value="Huesca"{{ request('Provincia') == 'Huesca' ? ' selected' : '' }}>Huesca</option>
                        <option value="Jaén"{{ request('Provincia') == 'Jaén' ? ' selected' : '' }}>Jaén</option>
                        <option value="La Coruña"{{ request('Provincia') == 'La Coruña' ? ' selected' : '' }}>La Coruña</option>
                        <option value="La Rioja"{{ request('Provincia') == 'La Rioja' ? ' selected' : '' }}>La Rioja</option>
                        <option value="Las Palmas"{{ request('Provincia') == 'Las Palmas' ? ' selected' : '' }}>Las Palmas</option>
                        <option value="León"{{ request('Provincia') == 'León' ? ' selected' : '' }}>León</option>
                        <option value="Lérida"{{ request('Provincia') == 'Lérida' ? ' selected' : '' }}>Lérida</option>
                        <option value="Lugo"{{ request('Provincia') == 'Lugo' ? ' selected' : '' }}>Lugo</option>
                        <option value="Madrid"{{ request('Provincia') == 'Madrid' ? ' selected' : '' }}>Madrid</option>
                        <option value="Málaga"{{ request('Provincia') == 'Málaga' ? ' selected' : '' }}>Málaga</option>
                        <option value="Murcia"{{ request('Provincia') == 'Murcia' ? ' selected' : '' }}>Murcia</option>
                        <!-- Agrega las opciones de provincia en mayúscula -->
                    </select>
                </div>
                <div>
                    <label for="Ciudad" class="block text-sm font-medium ">Ciudad:</label>
                    
                    <select name="Ciudad" id="ciudad" class="select-input text-black mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                         <option value="">Todos</option>
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
                        <option value="Palma de Mallorca"{{ request('Ciudad') == 'Palma de Mallorca' ? ' selected' : '' }}>Palma de Mallorca</option>
                        <option value="A Coruña"{{ request('Ciudad') == 'A Coruña' ? ' selected' : '' }}>A Coruña</option>
                        <option value="Albacete"{{ request('Ciudad') == 'Albacete' ? ' selected' : '' }}>Albacete</option>
                        <option value="Almería"{{ request('Ciudad') == 'Almería' ? ' selected' : '' }}>Almería</option>
                        <option value="Ávila"{{ request('Ciudad') == 'Ávila' ? ' selected' : '' }}>Ávila</option>
                        <option value="Badajoz"{{ request('Ciudad') == 'Badajoz' ? ' selected' : '' }}>Badajoz</option>
                        <option value="Burgos"{{ request('Ciudad') == 'Burgos' ? ' selected' : '' }}>Burgos</option>
                        <option value="Cáceres"{{ request('Ciudad') == 'Cáceres' ? ' selected' : '' }}>Cáceres</option>
                        <option value="Cádiz"{{ request('Ciudad') == 'Cádiz' ? ' selected' : '' }}>Cádiz</option>
                        <option value="Vigo"{{ request('Ciudad') == 'Vigo' ? ' selected' : '' }}>Vigo</option>
                        <option value="Gijón"{{ request('Ciudad') == 'Gijón' ? ' selected' : '' }}>Gijón</option>
                        <option value="Vitoria"{{ request('Ciudad') == 'Vitoria' ? ' selected' : '' }}>Vitoria</option>
                         <option value="Huelva"{{ request('Ciudad') == 'Huelva' ? ' selected' : '' }}>Huelva</option>
                        <option value="Jaén"{{ request('Ciudad') == 'Jaén' ? ' selected' : '' }}>Jaén</option>
                        <option value="León"{{ request('Ciudad') == 'León' ? ' selected' : '' }}>León</option>
                        <option value="Lleida"{{ request('Ciudad') == 'Lleida' ? ' selected' : '' }}>Lleida</option>
                        <option value="Logroño"{{ request('Ciudad') == 'Logroño' ? ' selected' : '' }}>Logroño</option>
                        <option value="Lugo"{{ request('Ciudad') == 'Lugo' ? ' selected' : '' }}>Lugo</option>
                        <option value="Ourense"{{ request('Ciudad') == 'Ourense' ? ' selected' : '' }}>Ourense</option>
                        <option value="Oviedo"{{ request('Ciudad') == 'Oviedo' ? ' selected' : '' }}>Oviedo</option>
                        <option value="Pamplona"{{ request('Ciudad') == 'Pamplona' ? ' selected' : '' }}>Pamplona</option>
                        <option value="Pontevedra"{{ request('Ciudad') == 'Pontevedra' ? ' selected' : '' }}>Pontevedra</option>
                        <option value="Salamanca"{{ request('Ciudad') == 'Salamanca' ? ' selected' : '' }}>Salamanca</option>
                        <option value="Santa Cruz de Tenerife"{{ request('Ciudad') == 'Santa Cruz de Tenerife' ? ' selected' : '' }}>Santa Cruz de Tenerife</option>
                        <option value="Santander"{{ request('Ciudad') == 'Santander' ? ' selected' : '' }}>Santander</option>
                        <option value="Segovia"{{ request('Ciudad') == 'Segovia' ? ' selected' : '' }}>Segovia</option>
                        <option value="Soria"{{ request('Ciudad') == 'Soria' ? ' selected' : '' }}>Soria</option>
                        <option value="Tarragona"{{ request('Ciudad') == 'Tarragona' ? ' selected' : '' }}>Tarragona</option>
                        <option value="Teruel"{{ request('Ciudad') == 'Teruel' ? ' selected' : '' }}>Teruel</option>
                        <option value="Valladolid"{{ request('Ciudad') == 'Valladolid' ? ' selected' : '' }}>Valladolid</option>
                        <option value="Zamora"{{ request('Ciudad') == 'Zamora' ? ' selected' : '' }}>Zamora</option>
                        <option value="Albacete"{{ request('Ciudad') == 'Albacete' ? ' selected' : '' }}>Albacete</option>
                        <option value="Alcalá de Henares"{{ request('Ciudad') == 'Alcalá de Henares' ? ' selected' : '' }}>Alcalá de Henares</option>
                        <option value="Alcobendas"{{ request('Ciudad') == 'Alcobendas' ? ' selected' : '' }}>Alcobendas</option>
                        <option value="Alcorcón"{{ request('Ciudad') == 'Alcorcón' ? ' selected' : '' }}>Alcorcón</option>
                        <option value="Algeciras"{{ request('Ciudad') == 'Algeciras' ? ' selected' : '' }}>Algeciras</option>
                        <option value="Alicante"{{ request('Ciudad') == 'Alicante' ? ' selected' : '' }}>Alicante</option>
                        <option value="Almería"{{ request('Ciudad') == 'Almería' ? ' selected' : '' }}>Almería</option>
                        <option value="Badajoz"{{ request('Ciudad') == 'Badajoz' ? ' selected' : '' }}>Badajoz</option>
                        <option value="Badalona"{{ request('Ciudad') == 'Badalona' ? ' selected' : '' }}>Badalona</option>
                        <option value="Barakaldo"{{ request('Ciudad') == 'Barakaldo' ? ' selected' : '' }}>Barakaldo</option>
                        <option value="Benidorm"{{ request('Ciudad') == 'Benidorm' ? ' selected' : '' }}>Benidorm</option>   
                        <!-- Agrega las opciones de ciudad en mayúscula -->
                    </select>
                </div>
                <div class="col-span-2">
                    <label for="Search" class="block text-sm font-medium ">Buscar:</label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <input type="text" name="Search" id="search" value="{{ request('Search') }}" class="text-black focus:ring-indigo-500 focus:border-indigo-500 block w-full pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="Buscar...">
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
                    <a href="{{ route('dashboard') }}" class="text-sm text-red-700 hover:text-red-900">Restablecer</a>
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