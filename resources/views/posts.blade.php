{{-- View berdasarkan Jamak/Plural --}}
<x-layout>
  <x-slot:title> {{ $title }} </x-slot:title>
  <section class="bg-slate-100 dark:bg-gray-900">
    <div class="py-4 px-4 mx-auto max-w-screen-xl lg:px-6">
      <div class="mx-auto max-w-screen-md sm:text-center">
        <form>
          @if (request('kategori'))
            {{--  --}}
            <input type="hidden" name="kategori" value="{{ request('kategori') }}">
          @endif
          @if (request('author'))
            {{--  --}}
            <input type="hidden" name="author" value="{{ request('author') }}">
          @endif
          <div class="items-center mx-auto mb-3 space-y-4 max-w-screen-sm sm:flex sm:space-y-0">
            <div class="relative w-full">
              <label for="search" class="hidden mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Search
                Here</label>
              <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                  width="24" height="24" fill="none" viewBox="0 0 24 24">
                  <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                    d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                </svg>
                {{-- <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path></svg> --}}
              </div>
              <input
                class="block p-3 pl-12 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:rounded-none sm:rounded-l-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                placeholder="Search for article" type="search" id="search" name="search" autocomplete="off">
            </div>
            <div>
              <button type="submit"
                class="py-3 px-5 w-full text-sm font-medium text-center text-white rounded-lg border cursor-pointer bg-primary-700 border-primary-600 sm:rounded-none sm:rounded-r-lg hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Search</button>
            </div>
          </div>
        </form>
      </div>
    </div>

    {{ $posts->links()}}

    <div class="my-4 py-4 px-4 mx-auto max-w-screen-xl lg:py-4 lg:px-0">
      <div class="grid gap-8 lg:grid-cols-3 md:grid-cols-2">
        @forelse ($posts as $post)
          <article
            class="p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
            <div class="flex justify-between items-center mb-5 text-gray-500">
              <a href="/posts?kategori={{ $post->kategori->slug }}"> {{--  --}}
                <span
                  class="bg-{{ $post->kategori->color }}-100 text-primary-800  text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-slate-100 dark:text-primary-800 hover:bg-slate-50">
                  {{ $post->kategori->name }}
                </span>
              </a>
              <span class="text-sm">{{ $post->created_at->diffForHumans() }}</span>
            </div>
            <a href="/posts/{{ $post['slug'] }}">
              <h2 class="mb-2 text-2xl font-bold tracking-tight hover:underline text-gray-900 dark:text-white">
                {{ $post['title'] }}
              </h2>
            </a>
            <p class="mb-5 font-light text-gray-500 dark:text-gray-400">
              {{ Str::limit($post['text'], 200) }}
            </p>
            <div class="flex justify-between items-center">
              <a href="/posts?author={{ $post->author->username }}">
                <div class="flex items-center space-x-4">
                  <img class="w-7 h-7 rounded-full"
                    src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/jese-leos.png"
                    alt="{{ $post->author->name }}" />
                  <span class="font-medium text-sm dark:text-white">
                    {{ $post->author->name }}
                  </span>
                </div>
              </a>
              <a href="/posts/{{ $post['slug'] }}"
                class="inline-flex items-center text-sm font-medium text-primary-600 dark:text-primary-500 hover:underline">
                Read more
                <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd"
                    d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                    clip-rule="evenodd"></path>
                </svg>
              </a>
            </div>
          </article>
          @empty
          <div class="container">
            
              <p class="text-red-500 fw-bold text-xl">Article Tidak Ditemukan</p>
              <a href="/posts">Kembali</a>
            
          </div>
        @endforelse
      </div>
    </div>
  </section>

</x-layout>
{{-- <article class="py-8 max-w-screen-md border-b border-slate-300">
      <a href="/posts/{{ $post['slug'] }}">
        <h2 class="tracking-tighter text-3xl font-bold text-black hover:underline"> {{ $post['title'] }} </h2>
      </a>
      <div class="text-base">
        By
        <a href="/authors/{{ $post->author->username }}" class="hover:underline text-slate-500"> {{ $post->author->name }} </a>
        In
        <a href="/kategoris/{{$post->kategori->slug}}" class="hover:underline text-base text-slate-500">
          {{$post->kategori->name}}
        </a>
        | {{ $post->created_at->diffForHumans() }}
      </div>
      <p class="text-justify my-4 font-light"> {{ Str::limit($post['text'], 400) }}</p>
      <a href="/posts/{{ $post['slug'] }} " class="text-blue-500 font-medium hover:underline">Read More &raquo;</a>
    </article> --}}



{{-- <article class="p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                <div class="flex justify-between items-center mb-5 text-gray-500">
                    <span class="bg-primary-100 text-primary-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
                        <svg class="mr-1 w-3 h-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z" clip-rule="evenodd"></path><path d="M15 7h1a2 2 0 012 2v5.5a1.5 1.5 0 01-3 0V7z"></path></svg>
                        Article
                    </span>
                    <span class="text-sm">14 days ago</span>
                </div>
                <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><a href="#">Our first project with React</a></h2>
                <p class="mb-5 font-light text-gray-500 dark:text-gray-400">Static websites are now used to bootstrap lots of websites and are becoming the basis for a variety of tools that even influence both web designers and developers influence both web designers and developers.</p>
                <div class="flex justify-between items-center">
                    <div class="flex items-center space-x-4">
                        <img class="w-7 h-7 rounded-full" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/bonnie-green.png" alt="Bonnie Green avatar" />
                        <span class="font-medium dark:text-white">
                            Bonnie Green
                        </span>
                    </div>
                    <a href="#" class="inline-flex items-center font-medium text-primary-600 dark:text-primary-500 hover:underline">
                        Read more
                        <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </a>
                </div>
</article> --}}
