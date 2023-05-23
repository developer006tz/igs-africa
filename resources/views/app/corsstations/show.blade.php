<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('crud.corsstations.show_title')
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-partials.card>
                <x-slot name="title">
                    <a href="{{ route('corsstations.index') }}" class="mr-4"
                        ><i class="mr-1 icon ion-md-arrow-back"></i
                    ></a>
                </x-slot>

                <div class="mt-4 px-4">
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.corsstations.inputs.pnum')
                        </h5>
                        <span>{{ $corsstation->pnum ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.corsstations.inputs.stntype')
                        </h5>
                        <span>{{ $corsstation->stntype ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.corsstations.inputs.stnstatus')
                        </h5>
                        <span>{{ $corsstation->stnstatus ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.corsstations.inputs.opstatus')
                        </h5>
                        <span>{{ $corsstation->opstatus ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.corsstations.inputs.sitecity')
                        </h5>
                        <span>{{ $corsstation->sitecity ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.corsstations.inputs.sitestate')
                        </h5>
                        <span>{{ $corsstation->sitestate ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.corsstations.inputs.region')
                        </h5>
                        <span>{{ $corsstation->region ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.corsstations.inputs.latitude')
                        </h5>
                        <span>{{ $corsstation->latitude ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.corsstations.inputs.longitude')
                        </h5>
                        <span>{{ $corsstation->longitude ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.corsstations.inputs.elevation')
                        </h5>
                        <span>{{ $corsstation->elevation ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.corsstations.inputs.project')
                        </h5>
                        <span>{{ $corsstation->project ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.corsstations.inputs.network')
                        </h5>
                        <span>{{ $corsstation->network ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.corsstations.inputs.multi_types')
                        </h5>
                        <span>{{ $corsstation->multi_types ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.corsstations.inputs.is_realtime')
                        </h5>
                        <span>{{ $corsstation->is_realtime ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.corsstations.inputs.mean_latency_last_hour')
                        </h5>
                        <span
                            >{{ $corsstation->mean_latency_last_hour ?? '-'
                            }}</span
                        >
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.corsstations.inputs.mean_latency_last_day')
                        </h5>
                        <span
                            >{{ $corsstation->mean_latency_last_day ?? '-'
                            }}</span
                        >
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.corsstations.inputs.data_complete_last_hour')
                        </h5>
                        <span
                            >{{ $corsstation->data_complete_last_hour ?? '-'
                            }}</span
                        >
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.corsstations.inputs.data_complete_last_day')
                        </h5>
                        <span
                            >{{ $corsstation->data_complete_last_day ?? '-'
                            }}</span
                        >
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.corsstations.inputs.status')
                        </h5>
                        <span>{{ $corsstation->status ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.corsstations.inputs.date_installed')
                        </h5>
                        <span>{{ $corsstation->date_installed ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.corsstations.inputs.last_rinex_data_year')
                        </h5>
                        <span
                            >{{ $corsstation->last_rinex_data_year ?? '-'
                            }}</span
                        >
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.corsstations.inputs.data_download_link')
                        </h5>
                        <span
                            >{{ $corsstation->data_download_link ?? '-' }}</span
                        >
                    </div>
                </div>

                <div class="mt-10">
                    <a href="{{ route('corsstations.index') }}" class="button">
                        <i class="mr-1 icon ion-md-return-left"></i>
                        @lang('crud.common.back')
                    </a>

                    @can('create', App\Models\Corsstation::class)
                    <a href="{{ route('corsstations.create') }}" class="button">
                        <i class="mr-1 icon ion-md-add"></i>
                        @lang('crud.common.create')
                    </a>
                    @endcan
                </div>
            </x-partials.card>
        </div>
    </div>
</x-app-layout>
