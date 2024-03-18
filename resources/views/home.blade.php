<x-iLayout  >

    <header class="max-w-xl mx-auto mt-20 text-center">
        <h1 class="text-4xl">




            Latest <span class="text-blue-500">Laravel From Scratch</span> News
        </h1>

        <h2 class="inline-flex mt-2">By Lary Laracore <img src="/img/lary-head.svg"
                                                           alt="Head of Lary the mascot"></h2>

        <p class="text-sm mt-14">
            Another year. Another update. We're refreshing the popular Laravel series with new content.
            I'm going to keep you guys up to speed with what's going on!
        </p>

        <script>

            function getCat()
            {

                var dropdown = document.getElementById('cats').value;

                // alert(dropdown);

                if(dropdown=="home")
                {
                    window.location.href= "/home";
                }
                else
                {

                    window.location.href= "/home/"+dropdown;

                }


            }

        </script>


        <div class="space-y-2 lg:space-y-0 lg:space-x-4 mt-8">
            <!--  Category -->

            <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl">
                <select onchange="getCat()" id="cats" class="flex-1 appearance-none bg-transparent py-2 pl-3 pr-9 text-sm font-semibold">

                    <option value="home"

                            style="{{$curCategory==0 || request()->routeIs('home') ? 'background-color: rgba(59,130,246);color:white;'  : ''}}"
                        {{ $curCategory==0 ? 'selected' : '' }}>

                        All Category

                    </option>

                    @isset($allCategories)

                    @foreach ($allCategories as $aCategory)

                        <option

                            style="{{$curCategory==$aCategory->id ? 'background-color: rgba(59,130,246);color:white;'  : ''}}"

                            value="{{$aCategory->id}}"
                            {{$curCategory==$aCategory->id ? ' selected ' : '' }}
                        >

                            {{ucwords( $aCategory->category )  }}



                        </option>

                    @endforeach

                    @endisset

                    {{-- <option value="business">Business</option> --}}

                </select>

                <x-arrow_down class=" pointer-events-none" />

                {{--
                    <svg class="transform -rotate-90 absolute pointer-events-none" style="right: 12px;" width="22"
                    height="22" viewBox="0 0 22 22">
                    <g fill="none" fill-rule="evenodd">
                    <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                    </path>
                    <path fill="#222"
                          d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z"></path>
                </g>
            </svg> --}}

            </div>


            <!-- Other Filters -->


            @if(count( $posts ) >= 0)

            <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl">
                <select class="flex-1 appearance-none bg-transparent py-2 pl-3 pr-9 text-sm font-semibold">
                    <option value="category" disabled selected>Other Filters
                    </option>


                    @isset($posts)

                    @php

                        $colsInCat = array_keys($posts[0]->toArray() );


                    @endphp


                    @foreach ($colsInCat as $col)

                        <option value="foo">
                            {{ ucwords( $col ) }}
                        </option>



                    @endforeach

                    @endisset


                    {{-- <option value="bar">Bar
                    </option> --}}


                </select>

                <svg class="transform -rotate-90 absolute pointer-events-none" style="right: 12px;" width="22"
                     height="22" viewBox="0 0 22 22">
                    <g fill="none" fill-rule="evenodd">
                        <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                        </path>
                        <path fill="#222"
                              d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z"></path>
                    </g>
                </svg>
            </div>

            <!-- Search -->
            <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl px-3 py-2">
                <form method="GET" action="#">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Find something"
                           class="bg-transparent placeholder-black font-semibold text-sm">
                </form>
            </div>
        </div>
    </header>


     {{ $posts->links()}}

        <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">



            @if ($posts->count() >0 || isset($posts))



                <x-lgPost :post="$posts[0]"/>



                @if ($posts->count() > 1)


                @php
                $i = 0;
            @endphp


                <div class="lg:grid lg:grid-cols-2">


                    @foreach ($posts->skip(1) as $post)

                    @if ($loop->iteration < 3 )



                    <x-mdPost :post="$post" />
@php
                        $i = $loop->iteration;
                    @endphp

                    @endif

                    @endforeach


                </div>

                @if ($i>1)


                <div class="lg:grid lg:grid-cols-3">

                    @foreach ($posts->skip(3) as $post)

                    <x-smPost :post="$post"/>

                    @endforeach

                </div>

                @endif

                @endif



                @else

                <h1 class="text-center">No Post Created Yet. </h1>



                @endif


        </main>

         {{ $posts->links()}}

    @else
        <h1 class="text-center">No Post Created Yet. </h1>

    @endif

</x-iLayout>
