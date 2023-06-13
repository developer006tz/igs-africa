<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-4">
         <div class="flex items-center justify-center h-12 rounded bg-white dark:bg-gray-800">
         </div>
         <div class="flex items-center justify-center h-12 rounded bg-transparent dark:bg-gray-800">
            {{-- create two buttons one cord one igs  --}}
            <a href="{{route('igs.index')}}" class="{{ request()->routeIs('igs.index') ? 'text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800' : ' relative w-full  inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-cyan-500 to-blue-500 group-hover:from-cyan-500 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-cyan-200 dark:focus:ring-cyan-800' }}">
  <span class="relative px-5 w-full  py-2.5 transition-all ease-in duration-75 {{ request()->routeIs('igs.index') ? 'bg-blue-700' : 'bg-white' }} dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
      IGS
  </span>
</a>
<a href="{{route('cors.index')}}" class="{{ request()->routeIs('cors.index') ? 'text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800' : 'relative w-full  inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-green-400 to-blue-600 group-hover:from-green-400 group-hover:to-blue-600 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800' }} ">
  <span class="relative px-5 w-full  py-2.5 transition-all ease-in duration-75 {{ request()->routeIs('cors.index') ? 'bg-blue-700' : 'bg-white' }} dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
      CORS
  </span>
</a>
         </div>

      </div>