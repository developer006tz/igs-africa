@extends('web_layout')
@section('title', 'IGS Stations')
@section('heading', 'IGS STATIONS')
@section('description', 'IGS-CORS Africa showcases the IGS and CORS stations located in the African continent. Developed by PETROAUGUSTINO KIRIA at Ardhi university, Tanzania under the supervision of Dr. ELIFURAHA SARIA in 2023.')
@section('keywords', 'IGS, CORS, Africa, GNSS, geodetic reference frame')
@section('robots', 'index,follow')
@section('favicon', asset('favicon.ico'))
@section('canonical', 'https://igs-cors-africa.netlify.app/igsstations')
@section('content')

<div class="p-4 sm:mx-auto">
   <div class="p-4 rounded-lg dark:border-gray-700 mt-14">
      @include('website.switch')
      <div class="grid  grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-4">
            
         <div id="map" class=" col-span-2 h-80 mb-4 rounded bg-gray-50 dark:bg-gray-800" style="height:30rem"></div>
    
        @include('website.summary')
      </div>
     
   </div>
</div>
 @include('igstable')
@include('leaflet-igs-map-configuration')

@endsection