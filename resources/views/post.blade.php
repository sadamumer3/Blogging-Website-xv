
{{--@dd($post->comments;--}}

<x-iLayout >

<main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
            <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
                <div class="col-span-4 lg:text-center lg:pt-14 mb-10">
                    <img src="/storage/{{$post->thumbnail}}" alt="" class="rounded-xl">

                    <p class="mt-4 block text-gray-400 text-xs">
                        Published <time> {{ $post->created_at->diffForHumans() }} </time>
                    </p>

                    <div class="flex items-center lg:justify-center text-sm mt-4">
                        <img src="https://ui-avatars.com/api/?name={{$post->author->name}}&background=random&color=random&length=2&rounded=true" alt="Lary avatar">
                        {{-- <img src="https://i.pravatar.cc/65" alt="Lary avatar"> --}}

                        <div class="ml-3 text-left">
                            <h5 class="font-bold"> {{ $post->author->name }} </h5>
                            <h6> From {{ $post->author->country }} </h6>
                        </div>
                    </div>
                </div>

                <div class="col-span-8">
                    <div class="hidden lg:flex justify-between mb-6">
                        <a href="/home"
                            class="transition-colors duration-300 relative inline-flex items-center text-lg hover:text-blue-500">
                            <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                                <g fill="none" fill-rule="evenodd">
                                    <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                    </path>
                                    <path class="fill-current"
                                        d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                                    </path>
                                </g>
                            </svg>

                            Back to Posts
                        </a>

                        <div class="space-x-2">
                            <a href="#"
                                class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold"
                                style="font-size: 10px">Techniques</a>

                                <a href="/home/{{$post->category->id}}"
                                    class="px-3 py-1 border border-red-300 rounded-full text-red-300 text-xs uppercase font-semibold"
                                    style="font-size: 10px"> {{ $post->category->category }} </a>
                        </div>
                    </div>

                    <h1 class="font-bold text-3xl lg:text-4xl mb-10">

                        {{ $post->title}}

                    </h1>

                    <div class="space-y-4 lg:text-lg leading-loose">


                        <p>

                            {{ $post->excerpt}}

                        </p>




                        <p>

                            {{ $post->body }}

                        </p>

                    </div>
                </div>



            <section class="col-span-8 col-start-5 mt-10 space-y-6">

                @auth

                <form action="/post/{{$post->id}}/comments" method="post" class="border border-gray-200 p-6 rounded-xl">

                    @csrf

                    <header class="flex items-center">

                        <img src="https://i.pravatar.cc/60?u={{ auth()->id() }}" class="rounded-full" alt="profile pic" width="60" height="60">

                        <h2 class="ml-4">Want to Comment ? </h2>

                    </header>

                        <div class="mt-4 border border-gray-200">

                            <textarea
                            name="body" placeholder="Write Comments Here...."
                             id="" class="w-full text-sm p-3"
                              cols="20" rows="5"
                            required
                            ></textarea>

                            @error('body')

                            <p class="text-red-500 text-xs"> {{ $message }} </p>

                            @enderror

                        </div>

                        <div class="flex justify-end mt-5">

                            <button type="submit" class="bg-blue-500 text-white uppercase text-sm py-2 px-10 rounded-xl hover:bg-blue-600"> Post </button>

                        </div>


                </form>

                @else
                    <h1 class=" bg-blue-100 text-center text-xl">

                        <a href="/register/" >
                           <strong>
                               Register
                           </strong>
                        </a>

                        Or
                    <a href="/login/" >

                        <strong>
                            Login
                        </strong>
                    </a>
                        to Comment

                    </h1>

                @endauth


                @foreach ($post->comments as $comment)

                <x-post-comment :comment="$comment" />

                @endforeach
            </section>


            </article>
        </main>

</x-iLayout>
