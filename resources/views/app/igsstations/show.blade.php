<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('crud.igsstations.show_title')
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-partials.card>
                <x-slot name="title">
                    <a href="{{ route('igsstations.index') }}" class="mr-4"
                        ><i class="mr-1 icon ion-md-arrow-back"></i
                    ></a>
                </x-slot>

                <div class="mt-4 px-4">
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.igsstations.inputs.name')
                        </h5>
                        <span>{{ $igsstation->name ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.igsstations.inputs.x_axis')
                        </h5>
                        <span>{{ $igsstation->x_axis ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.igsstations.inputs.y_axis')
                        </h5>
                        <span>{{ $igsstation->y_axis ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.igsstations.inputs.z_axiz')
                        </h5>
                        <span>{{ $igsstation->z_axiz ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.igsstations.inputs.latitude')
                        </h5>
                        <span>{{ $igsstation->latitude ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.igsstations.inputs.longitude')
                        </h5>
                        <span>{{ $igsstation->longitude ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.igsstations.inputs.height')
                        </h5>
                        <span>{{ $igsstation->height ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.igsstations.inputs.receiver_name')
                        </h5>
                        <span>{{ $igsstation->receiver_name ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.igsstations.inputs.receiver_satellite_system')
                        </h5>
                        <span
                            >{{ $igsstation->receiver_satellite_system ?? '-'
                            }}</span
                        >
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.igsstations.inputs.receiver_serial_number')
                        </h5>
                        <span
                            >{{ $igsstation->receiver_serial_number ?? '-'
                            }}</span
                        >
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.igsstations.inputs.receiver_firmware_version')
                        </h5>
                        <span
                            >{{ $igsstation->receiver_firmware_version ?? '-'
                            }}</span
                        >
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.igsstations.inputs.receiver_date_installed')
                        </h5>
                        <span
                            >{{ $igsstation->receiver_date_installed ?? '-'
                            }}</span
                        >
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.igsstations.inputs.antenna_name')
                        </h5>
                        <span>{{ $igsstation->antenna_name ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.igsstations.inputs.antenna_radome')
                        </h5>
                        <span>{{ $igsstation->antenna_radome ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.igsstations.inputs.antenna_serial_number')
                        </h5>
                        <span
                            >{{ $igsstation->antenna_serial_number ?? '-'
                            }}</span
                        >
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.igsstations.inputs.antenna_arp')
                        </h5>
                        <span>{{ $igsstation->antenna_arp ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.igsstations.inputs.antenna_marker_north')
                        </h5>
                        <span
                            >{{ $igsstation->antenna_marker_north ?? '-'
                            }}</span
                        >
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.igsstations.inputs.antenna_marker_east')
                        </h5>
                        <span
                            >{{ $igsstation->antenna_marker_east ?? '-' }}</span
                        >
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.igsstations.inputs.antenna_date_installed')
                        </h5>
                        <span
                            >{{ $igsstation->antenna_date_installed ?? '-'
                            }}</span
                        >
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.igsstations.inputs.clock_type')
                        </h5>
                        <span>{{ $igsstation->clock_type ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.igsstations.inputs.clock_input_frequency')
                        </h5>
                        <span
                            >{{ $igsstation->clock_input_frequency ?? '-'
                            }}</span
                        >
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.igsstations.inputs.receiver_elevation_cutoff')
                        </h5>
                        <span
                            >{{ $igsstation->receiver_elevation_cutoff ?? '-'
                            }}</span
                        >
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.igsstations.inputs.antenna_marker_up')
                        </h5>
                        <span>{{ $igsstation->antenna_marker_up ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.igsstations.inputs.clock_effective_dates')
                        </h5>
                        <span
                            >{{ $igsstation->clock_effective_dates ?? '-'
                            }}</span
                        >
                    </div>
                </div>

                <div class="mt-10">
                    <a href="{{ route('igsstations.index') }}" class="button">
                        <i class="mr-1 icon ion-md-return-left"></i>
                        @lang('crud.common.back')
                    </a>

                    @can('create', App\Models\Igsstation::class)
                    <a href="{{ route('igsstations.create') }}" class="button">
                        <i class="mr-1 icon ion-md-add"></i>
                        @lang('crud.common.create')
                    </a>
                    @endcan
                </div>
            </x-partials.card>
        </div>
    </div>
</x-app-layout>
