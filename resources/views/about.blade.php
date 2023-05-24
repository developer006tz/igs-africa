<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'IGS') }}</title>
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
      <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">IgsCords</span>
  </a>
  <div class="flex md:order-2">
 @auth
          <a href="{{route('dashboard')}}" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center mr-3 md:mr-0 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Dashboard</a>
@else
      <a href="{{route('login')}}" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center mr-3 md:mr-0 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">login</a>
@endauth      <button data-collapse-toggle="navbar-sticky" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-sticky" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
      </button>
  </div>
  <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
    <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
      <li>
        <a href="{{url('/')}}" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700" >Home</a>
      </li>
      <li>
        <a href="{{url('about')}}" class="block py-2 pl-3 pr-4 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500" aria-current="page">About</a>
      </li>
      <li>
        <a href="#" data-modal-target="defaultModal" data-modal-toggle="defaultModal" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Contacts</a>
      </li>
    </ul>
  </div>
  </div>
</nav>

{{-- content  --}}
<div class="p-4  sm:mx-auto">
    <div class="p-4 ">
      <div class="flex items-center justify-center h-12 mb-4 rounded">
         <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>
      </div>
      <div class="flex items-center justify-center  mb-4 rounded  dark:bg-gray-800">
         <div class="text-center p-6">
  <h1 class="text-4xl font-bold mb-4">{{__('Welcome to IGS-CORS Africa')}} </h1>
  <h2 class="text-lg mb-4">{{__('A website that showcases the IGS and CORS stations located in the African continent. This website was developed by PETRO AUGUSTINO KIRIA undergraduate student at Ardhi university, Tanzania under the supervision of Dr. ELIFURAHA SARIA in 2023')}}.</h2>
  <div class="bg-gray-100 p-4 rounded-md shadow-md">
    <h2 class="text-2xl font-semibold mb-2">{{__('What are IGS and CORS stations?')}} </h2>
    <p class="mb-2">{{__('IGS and CORS stations are GNSS stations that provide high-quality data and products for various scientific and practical applications. GNSS stands for Global Navigation Satellite System, which is a network of satellites that transmit signals to receivers on the ground')}}.</p>
    <p> {{__('These signals can be used to determine the position, velocity, and time of the receivers, as well as other parameters related to the Earth and its environment. Some of the applications of GNSS data include surveying, mapping, navigation, agriculture, disaster management, weather forecasting, climate monitoring, space exploration, and geophysical research.')}} </p>
  </div>
  <div class="mt-4 bg-gray-100 p-4 rounded-md shadow-md">
    <h2 class="text-2xl font-semibold mb-2">{{__('What can you find on this website?')}} </h2>
    <p class="mb-2"> {{__('On this website, you can find information on the IGS and CORS stations in Africa, such as their locations, coordinates, equipment, data availability, and contact details. You can also access their data and products through links to their respective websites or FTP servers.')}} </p>
    <p>{{__('Moreover, you can view the stations on a map and filter them by country, network, or type. For example, you can select only the stations that belong to the IGS network or only stations that provide data in real-time.')}} </p>
  </div>
  <div class="mt-4 bg-gray-100 p-4 rounded-md shadow-md">
    <h2 class="text-2xl font-semibold mb-2">{{__('Our mission')}} </h2>
    <p>{{__('This website aims to provide unified African Geodetic Reference Frame CORS-IGS information\'s which will help to promote international collaboration and the exchange of information between geodetic organizations and experts, to support the sustainable development of geodetic infrastructure and geospatial technology in the region, and to support other geospatial applications, such as satellite navigation, remote sensing, and geo-hazard monitoring.')}} </p>
  </div>
  <div class="mt-4">
    <p>{{__('Feel free to explore and contact us if you have any questions or feedback.')}} </p>
  </div>
</div>

      </div>
</div>
</div>

@include('modals')
@stack('modal')

{{-- include fwowbite js  --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>

</body>

</html>