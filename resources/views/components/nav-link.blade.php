{{-- properti komponen yang berisi array assosiativ
membuat atr href dan active menghilang jika di inspect dari dev tools dan membuat boolean active 
 --}}
@props(['active' => false])

<a {{ $attributes }}
class="{{ $active ? 'bg-gray-900 text-white' : 'hover:bg-gray-700 hover:text-white text-gray-300' }} rounded-md px-3 py-2 text-sm font-medium "
aria-current="{{ $active ? 'page' : false }}">{{ $slot }}</a>

{{-- 
mengambil dan menggabungkan atribut yang ada di komponen {{ $attribute }}
menggunakan ternatory oppertaor untuk menentukan current warna
aria-current aksebilitas yang lebih baik untuk screen reader
--}}
