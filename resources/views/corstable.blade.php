<div class="p-4 sm ">
   <div class="p-4  rounded-lg dark:border-gray-700">
        <div class="grid grid-cols-3 gap-4 mb-4">
         <div class="flex col-span-3 items-center justify-center h-12 rounded">
            <h2 class="text-2xl text-gray-400 dark:text-gray-500">LIST OF @yield('heading') IN AFRICA</h2>
         </div>
      </div>
      <div class="flex items-center justify-center mb-4 rounded">
         
<div class="relative overflow-x-auto shadow-md sm:rounded-lg pb-4">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400" id="myTable">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th>S/N</th>
                    <th scope="col" class="px-6 py-3" >Name</th>
                    <th scope="col" class="px-6 py-3" >Type</th>
                    <th scope="col" class="px-6 py-3" >Station Status</th>
                    <th scope="col" class="px-6 py-3" >city</th>
                    <th scope="col" class="px-6 py-3" >State</th>
                    <th scope="col" class="px-6 py-3" >Region</th>
                    <th scope="col" class="px-6 py-3" >Latitude</th>
                    <th scope="col" class="px-6 py-3" >Longitude</th>
                    <th scope="col" class="px-6 py-3" >Elevation</th>
                    <th scope="col" class="px-6 py-3" >Project</th>
                    <th scope="col" class="px-6 py-3" >Receiver Date Installed</th>
                    <th scope="col" class="px-6 py-3" >Network</th>
                    <th scope="col" class="px-6 py-3" >Multi types</th>
                    <th scope="col" class="px-6 py-3" >Is real Time</th>
                    <th scope="col" class="px-6 py-3" >Mean Latency Last Hour</th>
                    <th scope="col" class="px-6 py-3" >Mean Latency Last Day</th>
                    <th scope="col" class="px-6 py-3" >Data complete Last Hour</th>
                    <th scope="col" class="px-6 py-3" >Data complete Last Day</th>
                    <th scope="col" class="px-6 py-3" >Status</th>
                    <th scope="col" class="px-6 py-3" >Date installed</th>
                    <th scope="col" class="px-6 py-3" >Last Rinex Data Year</th>
                    <th scope="col" class="px-6 py-3" >Data Download Link</th>
            </tr>
        </thead>
        <tbody>
             @php
                    $i = 1;
                @endphp
                @forelse ($corsstations as $station)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td >{{ $i++ }}</td>
                    <td class="px-6 py-4">{{ $station->pnum ?? '-' }}</td>
                    <td class="px-6 py-4">{{ $station->stntype ?? '-' }}</td>
                    <td class="px-6 py-4">{{ $station->stnstatus ?? '-' }}</td>
                    <td class="px-6 py-4">{{ $station->opstatus ?? '-' }}</td>
                    <td class="px-6 py-4">{{ $station->sitecity ?? '-' }}</td>
                    <td class="px-6 py-4">{{ $station->sitestate ?? '-' }}</td>
                    <td class="px-6 py-4">{{ $station->region ?? '-' }}</td>
                    <td class="px-6 py-4">{{ $station->latitude ?? '-' }}</td>
                    <td class="px-6 py-4">{{ $station->longitude ?? '-' }}</td>
                    <td class="px-6 py-4">{{ $station->elevation ?? '-' }}</td>
                    <td class="px-6 py-4">{{ $station->project ?? '-' }}</td>
                    <td class="px-6 py-4">{{ $station->network ?? '-' }}</td>
                    <td class="px-6 py-4">{{ $station->multi_types ?? '-' }}</td>
                    <td class="px-6 py-4">{{ $station->is_realtime ?? '-' }}</td>
                    <td class="px-6 py-4">{{ $station->mean_latency_last_hour ?? '-' }}</td>
                    <td class="px-6 py-4">{{ $station->mean_latency_last_day ?? '-' }}</td>
                    <td class="px-6 py-4">{{ $station->data_complete_last_hour ?? '-' }}</td>
                    <td class="px-6 py-4">{{ $station->data_complete_last_day ?? '-' }}</td>
                    <td class="px-6 py-4">{{ $station->status ?? '-' }}</td>
                    <td class="px-6 py-4">{{ $station->date_installed ?? '-' }}</td>
                    <td class="px-6 py-4">{{ $station->last_rinex_data_year ?? '-' }}</td>
                    <td class="px-6 py-4 text-blue-600"><a class="text-blue-600" href="{{ $station->data_download_link ?? '-' }}">{{ $station->data_download_link ?? '-' }}</a></td>
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
