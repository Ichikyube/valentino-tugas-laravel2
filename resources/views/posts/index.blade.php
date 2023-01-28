<x-app-layout>
<section class="bg-white dark:bg-gray-900">
    <div class="relative h-full max-w-screen-xl px-4 py-8 mx-auto bg-yellow-50 lg:py-16 lg:px-6">
        <div class="max-w-screen-sm mx-auto mb-8 text-center lg:mb-16">
            <h2 class="mb-4 text-3xl font-extrabold tracking-tight text-gray-900 lg:text-4xl dark:text-white">Our Blog</h2>
            <p class="font-light text-gray-500 sm:text-xl dark:text-gray-400">We use an agile approach to test assumptions and connect with the needs of your audience early and often.</p>
        </div>
        <div class="grid gap-8 lg:grid-cols-2">
            @forelse ($posts as $blog_post)
            <article class="p-6 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
                <div class="flex items-center justify-between mb-5 text-gray-500">
                    <span class="bg-primary-100 text-primary-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
                        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z"></path></svg>
                        Tutorial
                    </span>
                    <span class="text-sm">14 days ago</span>
                </div>
                <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><a href="#">{{ $blog_post->title }}</a></h2>
                <p class="mb-5 font-light text-gray-500 dark:text-gray-400">{{ $blog_post->excerpt }}</p>
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-4">
                        <img class="rounded-full w-7 h-7" src="{{ asset('storage/blog_img/'.$profile->avatar) }}" alt="Jese Leos avatar" />
                        <span class="font-medium dark:text-white">
                            Jese Leos
                        </span>
                    </div>
                    <a href="#" class="inline-flex items-center font-medium text-primary-600 dark:text-primary-500 hover:underline">
                        Read more
                        <svg class="w-4 h-4 ml-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </a>
                </div>
            </article>
            @empty
                <div class="alert alert-warning mt-4">No Post yet. Login/Register to create post</div>
            @endforelse
        </div>
    </div>
  </section>
</x-app-layout>





