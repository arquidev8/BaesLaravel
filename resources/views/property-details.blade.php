<script src="https://cdn.tailwindcss.com"></script>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ $property->Title }}
        </h2>
    </x-slot>
<body>   
<div class="md:flex md:flex-row md:space-x-1 md:pb-8">
{{-- 
@php
  $imagesArray = json_decode($property->ImageSources, true);
@endphp

<div class="flex flex-col md:flex-row md:space-x-4 md:pb-8">
  <div class="md:w-3/5 mb-8">
    <div class="flex flex-row overflow-auto scrollbar-hide">
      @foreach($imagesArray["image_sources"] as $image)
        <div class="px-1">
          <img src="{{ $image }}" class="h-32 w-32 md:h-64 md:w-64 object-cover rounded-lg cursor-pointer hover:opacity-50" onclick="showImage('{{ $image }}', '{{ $property->Title }}')" alt="{{ $property->Title }}">
        </div>
      @endforeach
    </div>
  </div> --}}

  @php
  $imagesArray = json_decode($property->ImageSources, true);
@endphp

<div class="flex flex-col md:flex-row md:space-x-4 md:pb-8">
  <div class="md:w-3/1 mb-8">
    <div class="flex flex-row overflow-auto scrollbar-hide">
      @if (count($imagesArray['image_sources']) == 0)
        <div class="px-1">
          <img src="https://i.postimg.cc/qMmJYQdz/imagedefault.png" class="h-32 w-32 md:h-64 md:w-64 object-cover rounded-lg" alt="Imagen no disponible">
        </div>
      @else
        @foreach($imagesArray["image_sources"] as $image)
          <div class="px-1">
            <img src="{{ $image }}" class="h-32 w-32 md:h-64 md:w-64 object-cover rounded-lg cursor-pointer hover:opacity-50" onclick="showImage('{{ $image }}', '{{ $property->Title }}')" alt="{{ $property->Title }}">
          </div>
        @endforeach
      @endif
    </div>
  </div>
</div>

  <div class="md:w-2/5 bg-white shadow-md rounded-lg p-4">
    <h1 class=" text-gray-500 text-2xl font-semibold capitalize">{{ $property->Title }}</h1>
    <p class="text-gray-500 mb-4">{{ $property->Descripcion }}</p>
    <ul class="my-4">
      <li class="text-gray-500"><span class="text-gray-500 font-semibold leading-relaxed">Provincia:</span> {{ $property->Provincia }}</li>
      <li class="text-gray-500"><span class="text-gray-500 font-semibold leading-relaxed">Dirección:</span> {{ $property->Direccion }}</li>
      <li class="text-gray-500"><span class="text-gray-500 font-semibold leading-relaxed">Dimensiones:</span> {{ $property->MetrosCuadrados }} m<sup>2</sup></li>
      <li class="text-gray-500"><span class="text-gray-500 font-semibold leading-relaxed">Habitaciones:</span> {{ $property->Habitaciones }}</li>
      <li class="text-gray-500"><span class="text-gray-500 font-semibold leading-relaxed">Baños:</span> {{ $property->Banos }}</li>
      <li class="text-gray-500"><span class="text-gray-500 font-semibold leading-relaxed">Precio:</span> {{ $property->Price }} &euro;</li>
    </ul>
  </div>
{{-- 
  <div class="md:hidden">
    <div class="flex flex-col md:flex-row md:space-x-4 md:pb-8">
      @foreach($imagesArray["image_sources"] as $image)
        <div class="px-1 md:px-0">
          <img src="{{ $image }}" class="h-32 w-32 object-cover rounded-lg cursor-pointer hover:opacity-50" onclick="showImage('{{ $image }}', '{{ $property->Title }}')" alt="{{ $property->Title }}">
        </div>
      @endforeach
    </div>
  </div>
</div> --}}

<!-- modal para mostrar las imagenes en pantalla completa -->
<div class="fixed z-50 inset-0 overflow-y-auto hidden" id="modal" onclick="closeImage()">
  <div class="flex items-center justify-center min-h-screen">
    <div class="bg-white shadow-lg modal-container rounded-lg" onclick="event.stopPropagation();">
      <div class="bg-gray-50 p-4 rounded-t-lg">
        <h2 id="modal-title" class="text-xl font-semibold"></h2>
      </div>
      <div class="p-4">
        <img src="" class="w-full h-auto rounded-lg" id="modal-image" alt="">
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  function showImage(src, title) {
    document.getElementById('modal-image').src = src;
    document.getElementById('modal-title').innerHTML = title;
    document.getElementById('modal').classList.remove('hidden');
    document.getElementById('modal').classList.add('flex');
  }

  function closeImage() {
    document.getElementById('modal').classList.remove('flex');
    document.getElementById('modal').classList.add('hidden');
  }

   if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
        // Agrega las clases correspondientes en modo oscuro
        document.body.classList.add('dark')
        } else {
        // Agrega las clases correspondientes en modo claro
        document.body.classList.remove('dark')
        }
</script>

    <style>
        .bg-gray-100 {
            background-color: #f7fafc;
            }

            .text-gray-900 {
            color: #1a202c;
            }

            /* Clases para modo oscuro */
            .dark .bg-gray-100 {
            background-color: #1a202c;
            }

            .dark .text-gray-900 {
            color: #f7fafc;
            }
    
    </style>


</body>
</x-app-layout>