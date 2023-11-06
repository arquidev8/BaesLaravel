
<script src="https://cdn.tailwindcss.com"></script>

<div class="card">
  
  <img
    alt=""
    src="https://i.postimg.cc/xC4LBQDH/imagedefault.png"
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
      <div>
          <dt class="sr-only">Province</dt>
          <dd class="font-medium text-xs"><strong>Perimetro:  </strong>   {{ $property->Perimetro }}</dd>
      </div>
    </dl>

    
   
  </div>

 
</div>