<x-app-layout>
    <x-slot name="header">
       COMPETITIONs PORTAL
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

      @if (session('status'))
      <div class="animate__animated animate__backInUp py-3 px-5 mb-4 bg-green-100 text-green-900 text-sm rounded-md border border-green-200 flex items-center justify-between" role="alert">
          {{ session('status') }}
          <button class="w-4" type="button" data-dismiss="alert" aria-label="Close" onclick="this.parentElement.remove();">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M6 18L18 6M6 6l12 12" />
              </svg>
          </button>
      </div>
                @endif
      
      <div class="bg-white rounded-lg shadow-lg py-6">
        <div class="block overflow-x-auto mx-6">
            <table class="w-full text-left rounded-lg">
                <thead>
                    <tr class="text-gray-800 border border-b-0">
                        <th class="px-4 py-3">#</th>
                        <th class="px-4 py-3">TITLE</th>
                        <th class="px-4 py-3">OWNERID</th>
                        <th class="px-4 py-3">DESCRIPTION</th>
                        <th class="px-4 py-3">LOCATION</th>
                        <th class="px-4 py-3">JOIN</th>
                    </tr>
                </thead>
                <tbody>

                  @foreach ($competitions as $competition)
                      <tr class="w-full font-light text-gray-700 bg-gray-100 whitespace-no-wrap border border-b-0">
                        <td class="px-4 py-4">{{$competition->id}}</td>
                        <td class="px-4 py-4">{{$competition->name}}</td>
                        <td class="px-4 py-4">
                          <span class="text-sm bg-green-500 text-white rounded-full px-2 py-1"> {{$competition->ownerId}}
                          </td></span>
                        <td class="px-4 py-4">{{App\Models\Competition::find($competition->id)->description}}</td>
                        <td class="px-4 py-4">
                            <span class="text-sm bg-green-500 text-white rounded-full px-2 py-1">{{$competition->location}}</span>
                        </td>
                        <td class="text-center py-4">
                          
                            
                            
            {{-- <a href="/user/{{Auth::id()}}/join/{{$competition->id}}"><span class="fill-current text-red-500 material-icons">JOIN</span></a> --}}
                            
                            <form action="/user/join" method="POST">
                                @csrf
                                <input type="hidden" name="user"value="{{Auth::id()}}">
                                <input type="hidden" name="competition"value="{{$competition->id}}">
                                <button type="submit"><span class="text-sm bg-green-500 text-white rounded-full px-2 py-1">JOIN</span></button>
                            </form>
                            </td>
                    </tr>
                
                  @endforeach
               
                 
                </tbody>
            </table>
        </div>

       
    </div>
    <a href="/view/competitions/{{Auth::id()}}"><span class="m-5 text-sm bg-green-500 text-white rounded-full px-2 py-1">check my active competitions</span></a>
    </div>
  
  
    </div>

</x-app-layout>
