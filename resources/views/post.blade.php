{{-- View berdasarkan Singular --}}
<x-layout>
  <x-slot:title> {{ $title }} </x-slot:title>

  <!--
Install the "flowbite-typography" NPM package to apply styles and format the article content:

URL: https://flowbite.com/docs/components/typography/
-->

  <main class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white dark:bg-gray-900 antialiased">
    <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
      <article
        class="mx-auto w-full max-w-2xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
        <header class="mb-4 lg:mb-6 not-format">
          <a href="/posts" class="text-blue-500 text-sm  font-medium hover:underline no-underline">&laquo; Back to All Posts</a>
          <address class="flex items-center mb-6 mt-4 not-italic">
            <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
              <img class="mr-4 w-16 h-16 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-2.jpg"
                alt="Jese Leos">
              <div>
                <a href="/posts?author={{ $post->author->username }}" rel="author"
                  class="text-xl font-bold text-gray-900 dark:text-white">{{ $post->author->name }}</a>
                <span class="text-base text-gray-500 dark:text-gray-400">|</span>
                <a href="/posts?kategori={{ $post->kategori->slug }}">
                  <span
                    class="bg-{{ $post->kategori->color }}-100 text-primary-800  text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-slate-100 dark:text-primary-800 hover:bg-slate-50">
                    {{ $post->kategori->name }}
                  </span>
                </a>
                <p class="text-base text-gray-500 dark:text-gray-400">
                  {{ $post->created_at->format('j F Y') }}
                </p>
              </div>
            </div>
          </address>
          <h1 class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">
            {{ $post['title'] }}
          </h1>
        </header>
        <p>
          {{ $post['text'] }}
        </p>
      </article>
    </div>
  </main>


</x-layout>
{{-- <article class="py-8 max-w-screen-md">
    <h2 class="tracking-tighter text-3xl font-bold text-black"> {{ $post['title'] }} </h2>
    <div class="text-base">
      By
      <a href="/authors/{{ $post->author->username }}" class="hover:underline text-slate-500"> {{ $post->author->name }} </a>
      In
      <a href="/kategoris/{{$post->kategori->slug}}" class="hover:underline text-base text-slate-500">
        {{$post->kategori->name}}
      </a>
      | {{ $post->created_at->format('j F Y') }} 
    </div>
    <p class="text-justify my-4 font-light"> {{ $post['text'] }}</p>
    <a href="/posts" class="text-blue-500 font-medium hover:underline">&laquo; Back to Posts</a>
  </article> --}}
