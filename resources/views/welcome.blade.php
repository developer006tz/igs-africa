<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ __('Welcome to IGS-CORS Africa') }}</title>
    <meta name="description" content="IGS-CORS Africa showcases the IGS and CORS stations located in the African continent. Developed by PETROAUGUSTINO KIRIA at Ardhi university, Tanzania under the supervision of Dr. ELIFURAHA SARIA in 2023.">
    <meta name="keywords" content="IGS, CORS, Africa, GNSS, geodetic reference frame">
    <meta name="robots" content="index,follow">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('favicon.ico')}}">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />
    <!-- FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap"
        rel="stylesheet">
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
    

     <!-- Scripts -->
   
         <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
@include('datatable')
@stack('unyama')
@stack('print-button-styles')
</head>

<body class="font-[Poppins] bg-gradient-to-t from-[#fbc2eb] to-[#a6c1ee] h-screen">
    @php
   $stations = App\Models\Igsstation::all();
   $cord = App\Models\Corsstation::all();
   @endphp
<nav class="bg-white dark:bg-gray-900 fixed w-full z-20 top-0 left-0 border-b border-gray-200 dark:border-gray-600">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
  <a href="https://flowbite.com/" class="flex items-center">
      <h1><span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white"><b class="text-blue-900">IGS</b><b class="text-green-900">CORS</b></span></h1>
  </a>
  <div class="flex md:order-2">
    {{-- check if the user is loged in to show dashboard button else login button --}}
    @auth
          <a href="{{route('dashboard')}}" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center mr-3 md:mr-0 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Dashboard</a>
@else
      <a href="{{route('login')}}" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center mr-3 md:mr-0 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">login</a>
@endauth

      <button data-collapse-toggle="navbar-sticky" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-sticky" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
      </button>
  </div>
  <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
    <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
      <li>
        <a href="#" class="block py-2 pl-3 pr-4 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500" aria-current="page">Home</a>
      </li>
      <li>
        <a href="{{url('about')}}"  class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">About</a>
      </li>
      <li>
        <a href="#" data-modal-target="defaultModal" data-modal-toggle="defaultModal" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Contacts</a>
      </li>
    </ul>
  </div>
  </div>
</nav>

{{-- content  --}}
<div class="p-4 sm:mx-auto">
   <div class="p-4 rounded-lg dark:border-gray-700 mt-14">
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-4">
         <div class="flex items-center justify-center h-12 rounded bg-white dark:bg-gray-800">
         </div>
         <div class="flex items-center justify-center h-12 rounded bg-transparent dark:bg-gray-800">
            {{-- create two buttons one cord one igs  --}}
            <button class="relative w-full  inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-cyan-500 to-blue-500 group-hover:from-cyan-500 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-cyan-200 dark:focus:ring-cyan-800">
  <span class="relative px-5 w-full  py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
      IGS
  </span>
</button>
<button class="relative w-full  inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-green-400 to-blue-600 group-hover:from-green-400 group-hover:to-blue-600 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800">
  <span class="relative px-5 w-full  py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
      CORS
  </span>
</button>
         </div>

      </div>
      <div class="grid  grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-4">
            
         <div id="map" class=" col-span-2 h-80 mb-4 rounded bg-gray-50 dark:bg-gray-800" style="height:30rem">
       
      </div>
      <div class=" col-span-1 h-12 rounded bg-white sm:mb-16 dark:bg-gray-800">
                
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                   <h2 class="text-2xl text-gray-900 dark:text-white">SUMMARY OF  IGS AFRICA STATIONS</h2>
                </th>
                <th scope="col" class="px-6 py-3">
                    
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Total number of stations
                </th>
                <td class="px-6 py-4">
                    {{count($stations)}}
                </td>
            </tr>
             <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Active stations
                </th>
                <td class="px-6 py-4">
                    {{count($stations)}}
                </td>
            </tr>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Dormant stations
                </th>
                <td class="px-6 py-4">
                    {{__('0')}}
                </td>
            </tr>
           
        </tbody>
    </table>
</div>

                </div>
      </div>
     
   </div>
</div>
@include('tables')
@stack('tables')
@include('modals')
@stack('modal')
{{-- include leaflet js  --}}
@include('leaflet-igs-map-configuration')
{{-- include leaflet js  --}}


{{-- include fwowbite js  --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>

        @stack('scripts')
</body>

</html>
