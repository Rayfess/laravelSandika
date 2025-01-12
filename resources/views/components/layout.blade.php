{{-- Gunakan Layout untuk menampung file view --}}
<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Belajar Laravel</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
  {{-- Menggunakan Vite untuk menampilkan tailwind, alpinejs --}}
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="h-full">
  <div class="min-h-full">
    {{-- Component yang dipanggil --}}
    <x-navbar></x-navbar>
    <x-header> 
      {{-- Dapat dari home --}}
      {{ $title }}
    </x-header>
    <main>
      <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        {{-- Your content, apapun yang anda isikan di var <x-layout> --}}
        {{ $slot }}
      </div>
    </main>
  </div>
</body>

</html>
