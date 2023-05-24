<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('crud.corsstations.index_title')
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-partials.card>
                <div class="mb-5 mt-4">
                    <div class="flex flex-wrap justify-between">
                        <div class="md:w-1/2">
                            <form>
                                <div class="flex items-center w-full">
                                    <x-inputs.text
                                        name="search"
                                        value="{{ $search ?? '' }}"
                                        placeholder="{{ __('crud.common.search') }}"
                                        autocomplete="off"
                                    ></x-inputs.text>

                                    <div class="ml-1">
                                        <button
                                            type="submit"
                                            class="button button-primary"
                                        >
                                            <i class="icon ion-md-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="md:w-1/2 text-right">
                            @can('create', App\Models\Corsstation::class)
                            <a
                                href="{{ route('corsstations.create_excel') }}"
                                class="button button-primary"
                            >
                                <i class="mr-1 icon ion-md-add"></i>
                                upload by excell
                            </a>
                            <a
                                href="{{ route('corsstations.create') }}"
                                class="button button-primary"
                            >
                                <i class="mr-1 icon ion-md-add"></i>
                                @lang('crud.common.create')
                            </a>
                            @endcan
                        </div>
                    </div>
                </div>

                <div class="block w-full overflow-auto scrolling-touch">
                    <table class="w-full max-w-full mb-4 bg-transparent">
                        <thead class="text-gray-700">
                            <tr>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.corsstations.inputs.pnum')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.corsstations.inputs.stntype')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.corsstations.inputs.stnstatus')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.corsstations.inputs.opstatus')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.corsstations.inputs.sitecity')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.corsstations.inputs.sitestate')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.corsstations.inputs.region')
                                </th>
                                <th class="px-4 py-3 text-right">
                                    @lang('crud.corsstations.inputs.latitude')
                                </th>
                                <th class="px-4 py-3 text-right">
                                    @lang('crud.corsstations.inputs.longitude')
                                </th>
                                <th class="px-4 py-3 text-right">
                                    @lang('crud.corsstations.inputs.elevation')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.corsstations.inputs.project')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.corsstations.inputs.network')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.corsstations.inputs.multi_types')
                                </th>
                                <th class="px-4 py-3 text-right">
                                    @lang('crud.corsstations.inputs.is_realtime')
                                </th>
                                <th class="px-4 py-3 text-right">
                                    @lang('crud.corsstations.inputs.mean_latency_last_hour')
                                </th>
                                <th class="px-4 py-3 text-right">
                                    @lang('crud.corsstations.inputs.mean_latency_last_day')
                                </th>
                                <th class="px-4 py-3 text-right">
                                    @lang('crud.corsstations.inputs.data_complete_last_hour')
                                </th>
                                <th class="px-4 py-3 text-right">
                                    @lang('crud.corsstations.inputs.data_complete_last_day')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.corsstations.inputs.status')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.corsstations.inputs.date_installed')
                                </th>
                                <th class="px-4 py-3 text-right">
                                    @lang('crud.corsstations.inputs.last_rinex_data_year')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.corsstations.inputs.data_download_link')
                                </th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600">
                            @forelse($corsstations as $corsstation)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-3 text-left">
                                    {{ $corsstation->pnum ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $corsstation->stntype ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $corsstation->stnstatus ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $corsstation->opstatus ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $corsstation->sitecity ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $corsstation->sitestate ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $corsstation->region ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-right">
                                    {{ $corsstation->latitude ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-right">
                                    {{ $corsstation->longitude ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-right">
                                    {{ $corsstation->elevation ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $corsstation->project ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $corsstation->network ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $corsstation->multi_types ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-right">
                                    {{ $corsstation->is_realtime ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-right">
                                    {{ $corsstation->mean_latency_last_hour ??
                                    '-' }}
                                </td>
                                <td class="px-4 py-3 text-right">
                                    {{ $corsstation->mean_latency_last_day ??
                                    '-' }}
                                </td>
                                <td class="px-4 py-3 text-right">
                                    {{ $corsstation->data_complete_last_hour ??
                                    '-' }}
                                </td>
                                <td class="px-4 py-3 text-right">
                                    {{ $corsstation->data_complete_last_day ??
                                    '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $corsstation->status ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $corsstation->date_installed ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-right">
                                    {{ $corsstation->last_rinex_data_year ?? '-'
                                    }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $corsstation->data_download_link ?? '-'
                                    }}
                                </td>
                                <td
                                    class="px-4 py-3 text-center"
                                    style="width: 134px;"
                                >
                                    <div
                                        role="group"
                                        aria-label="Row Actions"
                                        class="
                                            relative
                                            inline-flex
                                            align-middle
                                        "
                                    >
                                        @can('update', $corsstation)
                                        <a
                                            href="{{ route('corsstations.edit', $corsstation) }}"
                                            class="mr-1"
                                        >
                                            <button
                                                type="button"
                                                class="button"
                                            >
                                                <i
                                                    class="icon ion-md-create"
                                                ></i>
                                            </button>
                                        </a>
                                        @endcan @can('view', $corsstation)
                                        <a
                                            href="{{ route('corsstations.show', $corsstation) }}"
                                            class="mr-1"
                                        >
                                            <button
                                                type="button"
                                                class="button"
                                            >
                                                <i class="icon ion-md-eye"></i>
                                            </button>
                                        </a>
                                        @endcan @can('delete', $corsstation)
                                        <form
                                            action="{{ route('corsstations.destroy', $corsstation) }}"
                                            method="POST"
                                            onsubmit="return confirm('{{ __('crud.common.are_you_sure') }}')"
                                        >
                                            @csrf @method('DELETE')
                                            <button
                                                type="submit"
                                                class="button"
                                            >
                                                <i
                                                    class="
                                                        icon
                                                        ion-md-trash
                                                        text-red-600
                                                    "
                                                ></i>
                                            </button>
                                        </form>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="23">
                                    @lang('crud.common.no_items_found')
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="23">
                                    <div class="mt-10 px-4">
                                        {!! $corsstations->render() !!}
                                    </div>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </x-partials.card>
        </div>
    </div>
</x-app-layout>
