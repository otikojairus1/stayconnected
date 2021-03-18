<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            These are the results we could get from your keyword...
        </h2>
    </x-slot>
   
    
    <div class="bg-gray-100">
   
        <!-- End of Navbar -->

        
    
        <div class="container mx-auto my-5 p-5">
           
            @forEach($searchResults as $result)
                 <!-- Column -->
        <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3">

            <!-- Article -->
            <article class="overflow-hidden rounded-lg shadow-lg">

                <a href="/profile/{{$result->lastname}}">
                    <img alt="{{$result->lastname}}" class="block h-auto w-full" src="img/profile.png">
                </a>

                <header class="flex items-center justify-between leading-tight p-2 md:p-4">
                    <h1 class="text-lg">
                        <a class="no-underline hover:underline text-black" href="#">
                          {{$result->firstname}} {{$result->lastname}}
                        </a>
                    </h1>
                    <p class="text-grey-darker text-sm">
                       joined on: {{$result->created_at}}
                    </p>
                </header>

                <footer class="flex items-center justify-between leading-none p-2 md:p-4">
                    <a class="flex items-center no-underline hover:underline text-black" href="/profile/{{$result->lastname}}">
                        <img alt="{{$result->lastname}}" class="block rounded-full" src="https://picsum.photos/32/32/?random">
                        <p class="ml-2 text-sm">
                            {{$result->gender}} 
                        </p>
                    </a>
                    <a class="no-underline text-grey-darker hover:text-red-dark" href="#">
                        <span class="hidden">Like</span>
                        <i class="fa fa-heart"></i>
                    </a>
                </footer>

            </article>
            <!-- END Article -->

        </div>
                {{-- {{$result}} --}}
            @endforeach
        </div>
    </div>

</x-app-layout>
