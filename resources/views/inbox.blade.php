

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           MY INBOX
        </h2>
    </x-slot>
    
    <style>
        :root {
            --main-color: #4a76a8;
        }
    
        .bg-main-color {
            background-color: var(--main-color);
        }
    
        .text-main-color {
            color: var(--main-color);
        }
    
        .border-main-color {
            border-color: var(--main-color);
        }
    </style>
    <link href="https://unpkg.com/tailwindcss@0.3.0/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://unpkg.com/tailwindcss@1.2.0/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <div class="md:flex ml-5 animate__animated animate__backInLeft">
        <form action="searchhandler" method="POST">
            @csrf
            <input required class="rounded-l-lg mt-5 p-4 w-100 border-t mr-0 border-b border-l text-gray-800 border-gray-200 bg-white" name="search" placeholder="friends username or email here"/>
            <button class="px-8 rounded-r-lg bg-gray-400  text-gray-800 font-bold p-4 uppercase border-gray-500 border-t border-b border-r">Search</button>
        </form>
        
        <div class="ml-5 flex">
            @if(Auth::user()->role === 'companyReps')
            <a href="/events">  <div class="mt-5 py-3 px-5 mb-4 bg-green-100 text-green-900 text-sm rounded-md border border-green-200" role="alert">
                CREATE EVENTS
            </div></a>
            @endif
            <a href="/customer">  <div class="mt-5 ml-4 py-3 px-5 mb-4 bg-green-100 text-green-900 text-sm rounded-md border border-green-200" role="alert">
               CONTACT US
            </div></a>

            @if(Auth::user()->role === 'owner')
            <a href="/section/queries">  <div class="mt-5 ml-4 py-3 px-5 mb-4 bg-green-100 text-green-900 text-sm rounded-md border border-green-200" role="alert">
                CUSTOMER SERVICE ADMIN
             </div></a>
             @endif
             
            <a href="/create/posts">  <div class="mt-5 ml-4 py-3 px-5 mb-4 bg-green-100 text-green-900 text-sm rounded-md border border-green-200" role="alert">
                CREATE POST
             </div></a>

             <a href="/group/chatroom">  <div class="mt-5 ml-4 py-3 px-5 mb-4 bg-green-100 text-green-900 text-sm rounded-md border border-green-200" role="alert">
                 GROUP CHATROOM
             </div></a>

            
        </div>

    </div>
  
    <div class="bg-gray-100">

   
        <!-- End of Navbar -->
    
        <div class="container mx-auto my-5 p-5">
            
            
                <div class="w-full md:w-9/12 mx-2 h-64 animate__animated animate__backInRight">
                    @if (session('status'))
                    <div class="animate__animated animate__backInUp py-3 px-5 mb-4 bg-red-100 text-red-900 text-sm rounded-md border border-red-200 flex items-center justify-between" role="alert">
                        {{ session('status') }}
                        <button class="w-4" type="button" data-dismiss="alert" aria-label="Close" onclick="this.parentElement.remove();">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                     @endif

                            
                              
                    @foreach($messages as $message)
                  
                            @if($message->id === null)
                            <p>ss</p>
                            @endif

                    <div class="bg-green-lightest my-2 border-l-4 border-green text-green-dark p-4" role="alert">
                        <div class="flex">
                            sent from<p class="font-bold ml-3">{{$message->replierName}} </p>
                             
                        </div>
                        <p>{{$message->content}}</p>
                        <p class="font-bold mt-2">sent at {{$message->created_at}}</p>
                        
                            <form action="/message/delete/{{$message->id}}" method="POST">
                                @csrf
                             
                                <button type="submit"
                                class="bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded">
                                    delete
                                </button>
                              
                            </form>
                     
                      </div>
                   <hr/>
                    
                     @endforeach
                    
                     <div class="my-4"></div>

                </div>
            
        </div>
    </div>

</x-app-layout>
