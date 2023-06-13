<div class=" col-span-1 h-12 rounded bg-white sm:mb-16 dark:bg-gray-800">             
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                   <h2 class="text-2xl text-gray-900 dark:text-white">SUMMARY OF  @yield('heading') IN AFRICA</h2>
                </th>
                <th scope="col" class="px-6 py-3">
                    
                </th>
            </tr>
        </thead>
        <tbody>
            @if (request()->routeIs('igs.index'))
            @php
            $stations_points = $igsstations;
            @endphp
            @elseif(request()->routeIs('cors.index'))
            @php
            $stations_points = $corsstations;
            //on-operation cords stations
            $dormant = \App\Models\CorsStation::where('status', '<>', 'ok')->count();
            @endphp
            @else
            @php
            $stations_points = $igsstations;
            @endphp
            @endif
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Total number of stations
                </th>
                <td class="px-6 py-4">
                    {{count($stations_points)}}
                </td>
            </tr>
             <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Active stations
                </th>
                <td class="px-6 py-4">
                    {{count($stations_points)}}
                </td>
            </tr>
            @if (request()->routeIs('cors.index'))
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Dormant stations
                </th>
                <td class="px-6 py-4">
                    {{$dormant}}
                </td>
            </tr>
            @endif
           
        </tbody>
    </table>
</div>
</div>