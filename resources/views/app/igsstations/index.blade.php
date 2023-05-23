<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('crud.igsstations.index_title')
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
                            @can('create', App\Models\Igsstation::class)
                            <a
                                href="{{ route('igsstations.create') }}"
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
                                    @lang('crud.igsstations.inputs.name')
                                </th>
                                <th class="px-4 py-3 text-right">
                                    @lang('crud.igsstations.inputs.x_axis')
                                </th>
                                <th class="px-4 py-3 text-right">
                                    @lang('crud.igsstations.inputs.y_axis')
                                </th>
                                <th class="px-4 py-3 text-right">
                                    @lang('crud.igsstations.inputs.z_axiz')
                                </th>
                                <th class="px-4 py-3 text-right">
                                    @lang('crud.igsstations.inputs.latitude')
                                </th>
                                <th class="px-4 py-3 text-right">
                                    @lang('crud.igsstations.inputs.longitude')
                                </th>
                                <th class="px-4 py-3 text-right">
                                    @lang('crud.igsstations.inputs.height')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.igsstations.inputs.receiver_name')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.igsstations.inputs.receiver_satellite_system')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.igsstations.inputs.receiver_serial_number')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.igsstations.inputs.receiver_firmware_version')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.igsstations.inputs.receiver_date_installed')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.igsstations.inputs.antenna_name')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.igsstations.inputs.antenna_radome')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.igsstations.inputs.antenna_serial_number')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.igsstations.inputs.antenna_arp')
                                </th>
                                <th class="px-4 py-3 text-right">
                                    @lang('crud.igsstations.inputs.antenna_marker_north')
                                </th>
                                <th class="px-4 py-3 text-right">
                                    @lang('crud.igsstations.inputs.antenna_marker_east')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.igsstations.inputs.antenna_date_installed')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.igsstations.inputs.clock_type')
                                </th>
                                <th class="px-4 py-3 text-right">
                                    @lang('crud.igsstations.inputs.clock_input_frequency')
                                </th>
                                <th class="px-4 py-3 text-right">
                                    @lang('crud.igsstations.inputs.receiver_elevation_cutoff')
                                </th>
                                <th class="px-4 py-3 text-right">
                                    @lang('crud.igsstations.inputs.antenna_marker_up')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.igsstations.inputs.clock_effective_dates')
                                </th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600">
                            @forelse($igsstations as $igsstation)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-3 text-left">
                                    {{ $igsstation->name ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-right">
                                    {{ $igsstation->x_axis ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-right">
                                    {{ $igsstation->y_axis ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-right">
                                    {{ $igsstation->z_axiz ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-right">
                                    {{ $igsstation->latitude ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-right">
                                    {{ $igsstation->longitude ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-right">
                                    {{ $igsstation->height ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $igsstation->receiver_name ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $igsstation->receiver_satellite_system ??
                                    '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $igsstation->receiver_serial_number ??
                                    '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $igsstation->receiver_firmware_version ??
                                    '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $igsstation->receiver_date_installed ??
                                    '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $igsstation->antenna_name ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $igsstation->antenna_radome ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $igsstation->antenna_serial_number ?? '-'
                                    }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $igsstation->antenna_arp ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-right">
                                    {{ $igsstation->antenna_marker_north ?? '-'
                                    }}
                                </td>
                                <td class="px-4 py-3 text-right">
                                    {{ $igsstation->antenna_marker_east ?? '-'
                                    }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $igsstation->antenna_date_installed ??
                                    '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $igsstation->clock_type ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-right">
                                    {{ $igsstation->clock_input_frequency ?? '-'
                                    }}
                                </td>
                                <td class="px-4 py-3 text-right">
                                    {{ $igsstation->receiver_elevation_cutoff ??
                                    '-' }}
                                </td>
                                <td class="px-4 py-3 text-right">
                                    {{ $igsstation->antenna_marker_up ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $igsstation->clock_effective_dates ?? '-'
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
                                        @can('update', $igsstation)
                                        <a
                                            href="{{ route('igsstations.edit', $igsstation) }}"
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
                                        @endcan @can('view', $igsstation)
                                        <a
                                            href="{{ route('igsstations.show', $igsstation) }}"
                                            class="mr-1"
                                        >
                                            <button
                                                type="button"
                                                class="button"
                                            >
                                                <i class="icon ion-md-eye"></i>
                                            </button>
                                        </a>
                                        @endcan @can('delete', $igsstation)
                                        <form
                                            action="{{ route('igsstations.destroy', $igsstation) }}"
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
                                <td colspan="25">
                                    @lang('crud.common.no_items_found')
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="25">
                                    <div class="mt-10 px-4">
                                        {!! $igsstations->render() !!}
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
