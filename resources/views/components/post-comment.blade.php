@props(['comment'])

    <article class="flex border border-gray-500 p-6 rounded-xl space-x-4
    {{ $comment->author_id==auth()->id() ? 'bg-blue-500 text-gray-100' : 'bg-gray-200 text-black-500' }} "
    >

        <div class="flex-shrink-0">

            <img src="https://i.pravatar.cc/60?u={{$comment->author_id}}" class="rounded-xl" alt="profile pic" width="60" height="60">

        </div>

        <div>

            <header class="mb-4">


                <h3 class="font-bold">{{ $comment->author->name}}</h3>

                <p class="text-xs">

                    Posted on

                    <time> {{ $comment->created_at->format(" g:i a,  j F , Y")}} </time>

                </p>

            </header>

            <p>
                {{ $comment->body}}
            </p>

        </div>


    </article>

