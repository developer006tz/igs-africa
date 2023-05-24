<div class="p-4 sm ">
   <div class="p-4  rounded-lg dark:border-gray-700">
      <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3  gap-4 mb-4">
         <div class="flex col-span-3 items-center justify-center h-12 rounded">
            <p class="text-2xl text-gray-400 dark:text-gray-500">LIST OF IGS AFRICA STATIONS</p>
         </div>
      </div>
      <div class="flex items-center justify-center mb-4 rounded">
         
<div class="relative overflow-x-auto shadow-md sm:rounded-lg pb-4">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400" id="myTable">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th>S/N</th>
                    <th scope="col" class="px-6 py-3" >Name</th>
                    <th scope="col" class="px-6 py-3" >X Axis</th>
                    <th scope="col" class="px-6 py-3" >Y Axis</th>
                    <th scope="col" class="px-6 py-3" >Z Axis</th>
                    <th scope="col" class="px-6 py-3" >Latitude</th>
                    <th scope="col" class="px-6 py-3" >Height</th>
                    <th scope="col" class="px-6 py-3" >Receiver Name</th>
                    <th scope="col" class="px-6 py-3" >Receiver Satellite System</th>
                    <th scope="col" class="px-6 py-3" >Receiver Serial Number</th>
                    <th scope="col" class="px-6 py-3" >Receiver Firmware Version</th>
                    <th scope="col" class="px-6 py-3" >Receiver Date Installed</th>
                    <th scope="col" class="px-6 py-3" >Antenna Name</th>
                    <th scope="col" class="px-6 py-3" >Antenna Radome</th>
                    <th scope="col" class="px-6 py-3" >Antenna Serial Number</th>
                    <th scope="col" class="px-6 py-3" >Antenna ARP</th>
                    <th scope="col" class="px-6 py-3" >Antenna Marker North</th>
                    <th scope="col" class="px-6 py-3" >Antenna Marker East</th>
                    <th scope="col" class="px-6 py-3" >Antenna Date Installed</th>
                    <th scope="col" class="px-6 py-3" >Clock Type</th>
                    <th scope="col" class="px-6 py-3" >Clock Input Frequency</th>
                    <th scope="col" class="px-6 py-3" >Longitude</th>
                    <th scope="col" class="px-6 py-3" >Receiver Elevation Cutoff</th>
                    <th scope="col" class="px-6 py-3" >Antenna Marker Up</th>
                    <th scope="col" class="px-6 py-3" >Clock Effective Dates</th>
            </tr>
        </thead>
        <tbody>
             @php
                    $i = 1;
                @endphp
                @forelse ($stations as $station)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td >{{ $i++ }}</td>
                    <td class="px-6 py-4">{{ $station->name }}</td>
                    <td class="px-6 py-4">{{ $station->x_axis }}</td>
                    <td class="px-6 py-4">{{ $station->y_axis }}</td>
                    <td class="px-6 py-4">{{ $station->z_axis }}</td>
                    <td class="px-6 py-4">{{ $station->latitude }}</td>
                    <td class="px-6 py-4">{{ $station->height }}</td>
                    <td class="px-6 py-4">{{ $station->receiver_name }}</td>
                    <td class="px-6 py-4">{{ $station->receiver_satellite_system }}</td>
                    <td class="px-6 py-4">{{ $station->receiver_serial_number }}</td>
                    <td class="px-6 py-4">{{ $station->receiver_firmware_version }}</td>
                    <td class="px-6 py-4">{{ $station->receiver_date_installed }}</td>
                    <td class="px-6 py-4">{{ $station->antenna_name }}</td>
                    <td class="px-6 py-4">{{ $station->antenna_radome }}</td>
                    <td class="px-6 py-4">{{ $station->antenna_serial_number }}</td>
                    <td class="px-6 py-4">{{ $station->antenna_arp }}</td>
                    <td class="px-6 py-4">{{ $station->antenna_marker_north }}</td>
                    <td class="px-6 py-4">{{ $station->antenna_marker_east }}</td>
                    <td class="px-6 py-4">{{ $station->antenna_date_installed }}</td>
                    <td class="px-6 py-4">{{ $station->clock_type }}</td>
                    <td class="px-6 py-4">{{ $station->clock_input_frequency }}</td>
                    <td class="px-6 py-4">{{ $station->longitude }}</td>
                    <td class="px-6 py-4">{{ $station->receiver_elevation_cutoff }}</td>
                    <td class="px-6 py-4">{{ $station->antenna_marker_up }}</td>
                    <td class="px-6 py-4">{{ $station->clock_effective_dates }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="25" class="text-center">No Data</td>
            </tr>
            @endforelse
            
        </tbody>
    </table>
</div>

      </div>
      
   </div>
</div>