
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
        <dd class="text-sm text-gray-500">${{ $property->Price }}</dd>
      </div>
      <div>
        <dt class="sr-only">Address</dt>
        <dd class="font-medium">{{ $property->Direccion }}</dd>
         <dd class="font-medium">{{ $property->Provincia }}</dd>
      </div>
    </dl>

    <div class="mt-6 flex items-center gap-8 text-xs">
      <div class="sm:inline-flex sm:shrink-0 sm:items-center sm:gap-2">
        <svg
          class="h-4 w-4 text-indigo-700"
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
          <p class="text-gray-500">Bathroom</p>

          <p class="font-medium">{{ $property->Habitaciones }}</p>
        </div>
      </div>

      <div class="sm:inline-flex sm:shrink-0 sm:items-center sm:gap-2">
        <svg
          class="h-4 w-4 text-indigo-700"
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
          <p class="text-gray-500">Bedroom</p>

          <p class="font-medium">{{ $property->Banos }}</p>
        </div>
      </div>
    </div>
  </div>
</a>
 
</div>