 @push('scripts')
 <script>
            var map = L.map('map').setView([0, 0], 2);

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

// var CartoDB_DarkMatter = L.tileLayer('https://{s}.basemaps.cartocdn.com/dark_all/{z}/{x}/{y}{r}.png', {
// 		attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors &copy; <a href="https://carto.com/attributions">CARTO</a>',
// 		subdomains: 'abcd',
// 		maxZoom: 19
// 	});
// 	CartoDB_DarkMatter.addTo(map);

	// Google Map Layer

	googleStreets = L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
		maxZoom: 20,
		subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
	});
	googleStreets.addTo(map);

    // // Satelite Layer
	// googleSat = L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}', {
	// 	maxZoom: 20,
	// 	subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
	// });
	// googleSat.addTo(map);

    @if(Route::currentRouteName() == 'igs.index')
            var iconimage = 'https://img.icons8.com/fluency/48/null/approval.png';
            @php 
            $stations = $igsstations; 
            @endphp
            @elseif(Route::currentRouteName() == 'cors.index')
            var iconimage = 'https://img.icons8.com/fluency/48/null/approval.png';
            @php
            $stations = $corsstations;
            @endphp
            @elseif(Route::currentRouteName() == 'website.index')
            var iconimage = 'https://img.icons8.com/fluency/48/null/approval.png';
            @php
            $stations = $igsstations;
            @endphp
    @endif

       

        var satelliteIcon = L.icon({
                iconUrl: iconimage,
                shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
                iconSize: [13, 15],
                iconAnchor: [12, 41],
                popupAnchor: [1, -34],
                shadowSize: [10, 10]
            });

            //check route if it is igs or cors
            //if igs then show igs stations
            //if cors then show cors stations
            //if both then show both stations
            //if none then show none

            
            @foreach($stations as $station)
            var marker = L.marker([{{ $station->latitude }}, {{ $station->longitude }}],{icon: satelliteIcon}).addTo(map);
            @if(request()->routeIs('igs.index'))
            marker.bindPopup(`
                <div class="bg-green-500 text-white font-bold p-3 text-center rounded">
                    {{ $station->name }}
                </div>
                <div class="text-green-900 mt-2">
                    Location:-  {{ $station->country ?? '-' }}
                </div>
                <div class="text-green-900">
                    MC:-  {{ $station->receiver_satellite_system ?? '-' }}
                </div>
                <div class="text-green-900">
                    Data link:
                    <a class="text-green-900 hover:text-green-700" href="{{ $station->data_download_link ?? route('igs.index') }}" target="_blank">
                        {{ $station->data_download_link ?? '-' }}
                    </a>
                </div>
            `);
            @endif
            @if(request()->routeIs('cors.index'))
            marker.bindPopup("<div class='bg-green-500 text-white font-bold p-3 text-center rounded'>{{ $station->pnum ?? '-' }}</div><div class='text-green-900 mt-2'>Location:-  {{ $station->sitestate ?? '-' }}</div><div class='text-green-900 mt-1'>MC:-  {{ $station->multi_types ?? '-' }}</div><div class='text-green-900 mt-1'>Data link:<a  class='text-green-900 hover:text-green-700' href='{{ $station->data_download_link ?? route('cors.index') }}' target='_blank' >{{ $station->data_download_link ?? '-' }}</a> </div>");
            @endif

            @endforeach

       
        </script>

@endpush