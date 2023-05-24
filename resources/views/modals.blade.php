<!-- Main modal -->
@push('modal')
@php
#return user with super admin role (not just auth user)
$user = App\Models\User::whereHas('roles', function ($query) {
    $query->where('name', '=', 'super-admin');
})->first();




    $modal = [
        'id' => 'defaultModal',
        'title' => 'Terms of Service',
        'profile' => $user->profile_photo_url,
        'name' => $user->name,
        'body' => 'With less than a month to go before the European Union enacts new consumer privacy laws for its citizens, companies around the world are updating their terms of service agreements to comply.',
        'footer' => '<button data-modal-hide="defaultModal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600 dark:focus:ring-opacity-50 dark:focus:outline-none">I understand</button>',
    ];
@endphp
<div id="defaultModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-20 right-20 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full" style="z-index: 10000;">
  <div class="relative top-2 mx-auto p-5 w-1/2 bordermax-w-2xl max-h-full shadow-lg  bg-white rounded overflow-hidden ">
            <div class="mt-3 text-center">
                {{--<div class="mx-auto flex items-center justify-center ">
                    <img class=" rounded-full" src="{{asset('profile.jpeg')}}" alt="profile photo" width="300" height="300">
                </div>
                <h3 class="text-lg leading-6 font-medium text-gray-900">{{$modal['name']}}</h3>
                <div class="mx-auto flex items-center justify-center mt-2 px-7 py-3">
                    <div class="text-gray-700 text-center bg-gray-50 p-2">
                    <p class="text-lg font-semibold">Developer Profile</p>
                    <p class="text-sm mt-2">As a highly skilled and experienced developer, I have a strong background in building and maintaining complex software systems. With expertise in a variety of programming languages and frameworks, I am able to quickly adapt to new technologies and deliver high-quality code. My excellent problem-solving skills and attention to detail enable me to find and fix issues quickly, ensuring that projects are completed on time and to the highest standards.</p>
                    <p class="text-sm mt-2">In addition to my technical abilities, I am also a strong communicator and team player. I work well with others, sharing my knowledge and collaborating on projects to achieve the best possible results. My ability to explain complex technical concepts in simple terms makes me an effective mentor and leader.</p>
                    </div>


                </div>
                <div class="items-center px-4 py-1">
                    <button id="ok-btn" data-modal-hide="defaultModal"
                        class="px-4 py-2 bg-blue-500 text-white
                            text-base font-medium rounded-md w-full
                            shadow-sm hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300">
                        OK
                    </button>
                </div>
            </div>--}}
        </div>
</div>
</div>
@endpush
