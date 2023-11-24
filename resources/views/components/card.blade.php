
<script src="https://cdn.tailwindcss.com"></script>


<div class="card">
  
<a href="{{ route('property-details', $property->Referencia) }}"  class="block rounded-lg p-4 shadow-sm shadow-indigo-100">
   <img
    alt="{{ $property->Title }}"
    src="{{ $property->MainPhoto }}"
    class="h-56 w-full rounded-md object-cover"
  />

  <div class="mt-2">
    <dl>
      <div>
        <dt class="sr-only">Price</dt>
        {{-- <dd class="text-sm ">€{{ $property->Price }}</dd> --}}
        {{-- <dd class="text-xs"><strong>Precio:</strong>  €{{ number_format($property->Price, 2, ',', '.') }}</dd> --}}
        <dd class="text-xs"><strong>Precio:</strong>  €{{ number_format(floatval($property->Price), 2, ',', '.') }}</dd>

      </div>
      <div class="mb-2 mt-2">
          <dt class="sr-only text-sm">Address</dt>
          <dd class="font-medium text-xs"><strong>Dirección:  </strong>  {{ $property->Direccion }}</dd>
          
      </div>
      <div>
          <dt class="sr-only">Province</dt>
          <dd class="font-medium text-xs"><strong>Provincia:  </strong>   {{ $property->Provincia }}</dd>
      </div>
    </dl>

    <div class="mt-6 flex items-center gap-8 text-xs">
      {{-- <div class="sm:inline-flex sm:shrink-0 sm:items-center sm:gap-2">
        <svg
          class="h-4 w-4 text-red-700"
          xmlns="http://www.w3.org/2000/svg"
          fill="none"
          viewBox="0 0 24 24"
          stroke="currentColor"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"
          />
        </svg>
      </div>
      <div class="sm:inline-flex sm:shrink-0 sm:items-center sm:gap-2">
        <div class="mt-1.5 sm:mt-0">
          <p class="">Bathroom</p>
          <p class="font-medium">{{ $property->Habitaciones }}</p>
        </div>
      </div> --}}
       <div class="sm:inline-flex sm:shrink-0 sm:items-center sm:gap-2">
       {{-- <svg class="h-4 w-4 text-red-700" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
         //otro icono para la cama
         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h4v5h-4v-5zM17 10h4v5h-4v-5z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 15v2a2 2 0 01-2 2H5a2 2 0 01-2-2v-2"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8H7a2 2 0 00-2 2v4a2 2 0 002 2h10a2 2 0 002-2V10a2 2 0 00-2-2z"/>
          </svg> --}}


        <svg class="h-4 w-4 text-red-700" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 10H2V5C2 3.9 2.9 3 4 3H9V5H4V10zM22 10H20V5C20 3.9 19.1 3 18 3H13V5H18V10zM3 18C3 16.9 3.9 16 5 16H19C20.1 16 21 16.9 21 18V21H3V18zM8 6V8H16V6C16 4.9 15.1 4 14 4H10C8.9 4 8 4.9 8 6z"/>
        </svg>

        <div class="mt-1.5 sm:mt-0">
          <p class="">Bathroom</p>
          <p class="font-medium">{{ $property->Banos }}</p>
        </div>
      </div>



      <div class="sm:inline-flex sm:shrink-0 sm:items-center sm:gap-2">
        <svg
          class="h-4 w-4 text-red-700"
          xmlns="http://www.w3.org/2000/svg"
          fill="none"
          viewBox="0 0 24 24"
          stroke="currentColor"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"
          />
        </svg>

        <div class="mt-1.5 sm:mt-0">
          <p class="">Bedroom</p>
          <p class="font-medium">{{ $property->Habitaciones }}</p>
        </div>
      </div>
    </div>
  </div>
</a>
 
</div>