<x-app-layout>
    <x-slot name="header">
      NEWS PLATFORM
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
           <form action="/eventcreate" method="POST">
            @if ($errors->any())
    
        <ul>
            @foreach ($errors->all() as $error)
            <div class="py-3 px-5 mb-4 bg-green-100 text-green-900 text-sm rounded-md border border-green-200" role="alert">
                {{ $error }}
            </div>
            @endforeach
        </ul>
    



    

    
    
    
@endif
            @csrf
            <div class="animate__animated animate__backInDown bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col">
                <div class="mb-4">
                  <label class="block text-grey-darker text-sm font-bold mb-2" for="eventTitle">
                    news title
                  </label>
                  <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" name="title" id="eventTitle" type="text" placeholder="event Title">
                </div>

                <div class="mb-4">
                    <label class="block text-grey-darker text-sm font-bold mb-2" for="eventDescription">
                      news description
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" name="desc"id="eventDescription" type="text" placeholder="event description">
                  </div>

                  <div class="mb-4">
                    <label class="block text-grey-darker text-sm font-bold mb-2" for="time">
                      time
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" name="time"id="time" type="text" placeholder="time">
                  </div>

                  <div class="mb-4">
                    <label class="block text-grey-darker text-sm font-bold mb-2" for="location">
                      location
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" name="location" id="location" type="text" placeholder="location">
                  </div>

               
                <div class="flex items-center justify-between">
                  <button class="bg-red  text-dark font-bold py-2 px-4 rounded" type="submit">
                   ADD NEWS
                  </button>
                  
                </div>

                
            </div>
            
        </form>
        </div>

        <div class="animate__animated animate__backInLeft bgwhite lg:order-2 lg:row-span-1 2xl:row-span-1 lg:col-span-1 rounded-lg shadow-xl pb-4 mb-5 lg:mb-0">
                    
            
            
            
            
            
            
            @if (session('status'))
            <div class="animate__animated animate__backInLeft py-3 px-5 mb-4 bg-purple-100 text-purple-900 text-sm rounded-md border border-purple-200 flex items-center justify-between" role="alert">
                {{ session('status') }}
                <button class="w-4" type="button" data-dismiss="alert" aria-label="Close" onclick="this.parentElement.remove();">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
                      @endif
                        
                      RECENT NEWS NOTIFICATIONS
                    @foreach($events as $event)
                       

                        <div class=" animate__animated animate__backInLeft py-3 px-5 mb-4 bg-green-100 text-green-900 text-sm rounded-md border border-green-200" role="alert">
                            {{$event->title}} posted by user <strong> {{$event->user_id}}</strong>
                            at {{$event->created_at}} 
                        </div>
                        
                        

                    @endforeach
                    
        
          </div>

  

        
        <!-- Ending of the component about Kira Whittle -->
      </div>
    </div>
  
    </div>

</x-app-layout>
