<x-app-layout>
    <x-slot name="header">
      ADVANCED COMPETITION CONFIGURATIONS
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

  
    <div class="bg-gray-100">


    <script>
        @import url('https://fonts.googleapis.com/css2?family=Barlow+Semi+Condensed:wght@500;600&display=swap');

        .bg-primary-color-grayish-blue {
            background: hsl(217, 19%, 35%);
        }
        .bg-primary-color-blue {
            background: hsl(217, 90%, 31%);
        }
        .bg-primary-color-white {
            background: hsl(0, 0%, 100%);
        }

        .primary-color-blackish-blue {
            color: rgb(25,33,46);
        }

        .primary-color-blackish-blue-opacity{
            color: rgba(25,33,46,0.5);
        }

        .color-neutral-light-gray{
            color: hsl(0, 0%, 81%);
        }

        .color-neutral-grayish-blue{
            color: hsl(210, 46%, 95%);
        }

        body{
            font-size: 13px;
            font-family: 'Barlow Semi Condensed', sans-serif;
        }

        h1{
      font-weight: 600;
      }

      h2,p{
        font-weight: 500;
      }
    </script>

   
 
    <div class="w-full h-screen">
      <div class="flex flex-col lg:grid lg:gap-4 2xl:gap-6 lg:grid-cols-4 2xl:row-span-2 2xl:pb-8 ml-2 pt-4 px-6">
        <!-- Beginning of the component about Daniel Clifford -->
        <div class="lg:order-1 lg:row-span-1 2xl:row-span-1 lg:col-span-2 rounded-lg shadow-xl mb-5 lg:mb-0">
           <form action="/competitionsave" method="POST">
            @if ($errors->any())
    
        <ul>
            @foreach ($errors->all() as $error)
            <div class="py-3 px-5 mb-4 bg-red-100 text-red-900 text-sm rounded-md border border-red-200" role="alert">
                {{ $error }}
            </div>
            @endforeach
        </ul>
    
    
@endif
            @csrf
            <div class="animate__animated animate__backInDown bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col">
                <div class="mb-4">
                  <label class="block text-grey-darker text-sm font-bold mb-2" for="eventTitle">
                    COMPETITION TITLE
                  </label>
                  <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" name="name" id="eventTitle" type="text" placeholder="competition Title">
                </div>

                <div class="mb-4">
                    <label class="block text-grey-darker text-sm font-bold mb-2" for="eventDescription">
                      COMPETITION DESCRIPTION
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" name="description"id="eventDescription" type="text" placeholder="competition description">
                  </div>

               

                  <div class="mb-4">
                    <label class="block text-grey-darker text-sm font-bold mb-2" for="time">
                      LOCATION
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" name="location"id="time" type="text" placeholder="add a location">
                  </div>

                  <div class="mb-4">
                    <label class="block text-grey-darker text-sm font-bold mb-2" for="location">
                      STATUS
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" name="status" id="status" type="text" placeholder="status">
                  </div>

               
                <div class="flex items-center justify-between">
                  <button class="bg-green  text-dark font-bold py-2 px-4 rounded" type="submit">
                   PUBLISH COMPETITION
                  </button>
                  
                </div>

                
            </div>
            
        </form>
        </div>

        <div class="animate__animated animate__backInLeft bgwhite lg:order-2 lg:row-span-1 2xl:row-span-1 lg:col-span-1 rounded-lg shadow-xl pb-4 mb-5 lg:mb-0">
                    
            
            
            
            
            
            
            @if (session('status'))
            <div class="animate__animated animate__backInLeft py-3 px-5 mb-4 bg-green-100 text-green-900 text-sm rounded-md border border-green-200 flex items-center justify-between" role="alert">
                {{ session('status') }}
                <button class="w-4" type="button" data-dismiss="alert" aria-label="Close" onclick="this.parentElement.remove();">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
                      @endif
                        
                      ALL COMPETITIONS

                      @foreach ($competitions as $competition)
                      

                      
                    <div class="bg-green-lightest my-2 border-l-4 border-green text-green-dark p-4" role="alert">
                        <div class="flex">
                            <p class="font-bold mr-3">{{$competition->name}} </p>
                            posted by  <p class="ml-3">{{\App\Models\User::find($competition->ownerId)->firstname}}</p><p class="ml-3">{{\App\Models\User::find($competition->ownerId)->lastname}}</p>
                        </div>
                        <p>{{$competition->description}}</p>
                        <p class="font-bold">created at {{$competition->created_at}}</p>
                        <p class="font-bold">NO of participants {{$competition->activeParticipants}}</p>
                        
                            <form action="/competition/delete/{{$competition->id}}" method="POST">
                                @csrf
                                @if(Auth::id() === (int)$competition->ownerId)
                                <button type="submit"
                                class="bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded">
                                    delete
                                </button>

                                @endif
                            </form>
                     
                      </div>

                     
                      @endforeach
                
        
          </div>

  

        
        <!-- Ending of the component about Kira Whittle -->
      </div>
    </div>
  
    </div>

</x-app-layout>
