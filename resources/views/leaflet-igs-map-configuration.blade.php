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

       

        var satelliteIcon = L.icon({
                iconUrl: 'https://img.icons8.com/fluency/48/null/approval.png',
                shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
                iconSize: [13, 15],
                iconAnchor: [12, 41],
                popupAnchor: [1, -34],
                shadowSize: [10, 10]
            });

            @foreach($stations as $station)
            var marker = L.marker([{{ $station->latitude }}, {{ $station->longitude }}],{icon: satelliteIcon}).addTo(map);
            marker.bindPopup("<div style='color: green;padding:3px;' class='bg-green-500 text text-success text-center'>{{ $station->name }}</div><div class='text-success'>Receiver: {{ $station->receiver_name }}</div><div class='text-success'>RSS: {{ $station->receiver_satellite_system }}</div><div class='text-success'>Antena: {{ $station->antenna_name }}</div><div class='text-success'>Clock: {{ $station->clock_type }}</div>");

            @endforeach

       
        </script>

@endpush