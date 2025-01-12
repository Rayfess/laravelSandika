{{-- php artisan make:component Header --view 
(Tidak dibuatkan CLASS karena simpel) 
--}}
<header class="bg-white shadow">
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      <h1 class="text-3xl font-bold tracking-tight text-gray-900">
        {{-- variabel yang akan dipanggil ketika x-var diisi --}}
        {{ $slot }}
      </h1>
    </div>
</header>