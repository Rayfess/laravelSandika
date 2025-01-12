{{-- 
$title -> route web.php; hanya bisa dipanggil di semua views, kecuali untuk components

{{ dd($title) }} mirip console.log / untuk tampilkan variabel
--}}

<x-layout>
  {{-- Yang Di Isikan Di var $slot
    x-slot merupakan blade component default,,
    akan dipanggil ke layout -> slot variabel title
  --}}
  <x-slot:title> {{ $title }} </x-slot:title>
  <h3 class="text-xl">Ini Halaman Home </h3>
</x-layout>