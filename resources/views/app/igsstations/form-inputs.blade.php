@php $editing = isset($igsstation) @endphp

<div class="flex flex-wrap">
    <x-inputs.group class="w-full">
        <x-inputs.text
            name="name"
            label="Name"
            :value="old('name', ($editing ? $igsstation->name : ''))"
            maxlength="255"
            placeholder="Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.number
            name="x_axis"
            label="X Axis"
            :value="old('x_axis', ($editing ? $igsstation->x_axis : ''))"
            max="255"
            step="0.01"
            placeholder="X Axis"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.number
            name="y_axis"
            label="Y Axis"
            :value="old('y_axis', ($editing ? $igsstation->y_axis : ''))"
            max="255"
            step="0.01"
            placeholder="Y Axis"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.number
            name="z_axiz"
            label="Z Axiz"
            :value="old('z_axiz', ($editing ? $igsstation->z_axiz : ''))"
            max="255"
            step="0.01"
            placeholder="Z Axiz"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.number
            name="latitude"
            label="Latitude"
            :value="old('latitude', ($editing ? $igsstation->latitude : ''))"
            max="255"
            step="0.01"
            placeholder="Latitude"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.number
            name="longitude"
            label="Longitude"
            :value="old('longitude', ($editing ? $igsstation->longitude : ''))"
            max="255"
            step="0.01"
            placeholder="Longitude"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.number
            name="height"
            label="Height"
            :value="old('height', ($editing ? $igsstation->height : ''))"
            max="255"
            step="0.01"
            placeholder="Height"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="receiver_name"
            label="Receiver Name"
            :value="old('receiver_name', ($editing ? $igsstation->receiver_name : ''))"
            maxlength="255"
            placeholder="Receiver Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="receiver_satellite_system"
            label="Receiver Satellite System"
            :value="old('receiver_satellite_system', ($editing ? $igsstation->receiver_satellite_system : ''))"
            maxlength="255"
            placeholder="Receiver Satellite System"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="receiver_serial_number"
            label="Receiver Serial Number"
            :value="old('receiver_serial_number', ($editing ? $igsstation->receiver_serial_number : ''))"
            maxlength="255"
            placeholder="Receiver Serial Number"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="receiver_firmware_version"
            label="Receiver Firmware Version"
            :value="old('receiver_firmware_version', ($editing ? $igsstation->receiver_firmware_version : ''))"
            maxlength="255"
            placeholder="Receiver Firmware Version"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.datetime
            name="receiver_date_installed"
            label="Receiver Date Installed"
            value="{{ old('receiver_date_installed', ($editing ? optional($igsstation->receiver_date_installed)->format('Y-m-d\TH:i:s') : '')) }}"
            max="255"
            required
        ></x-inputs.datetime>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="antenna_name"
            label="Antenna Name"
            :value="old('antenna_name', ($editing ? $igsstation->antenna_name : ''))"
            maxlength="255"
            placeholder="Antenna Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="antenna_radome"
            label="Antenna Radome"
            :value="old('antenna_radome', ($editing ? $igsstation->antenna_radome : ''))"
            maxlength="255"
            placeholder="Antenna Radome"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="antenna_serial_number"
            label="Antenna Serial Number"
            :value="old('antenna_serial_number', ($editing ? $igsstation->antenna_serial_number : ''))"
            maxlength="255"
            placeholder="Antenna Serial Number"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="antenna_arp"
            label="Antenna Arp"
            :value="old('antenna_arp', ($editing ? $igsstation->antenna_arp : ''))"
            maxlength="255"
            placeholder="Antenna Arp"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.number
            name="antenna_marker_north"
            label="Antenna Marker North"
            :value="old('antenna_marker_north', ($editing ? $igsstation->antenna_marker_north : ''))"
            max="255"
            step="0.01"
            placeholder="Antenna Marker North"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.number
            name="antenna_marker_east"
            label="Antenna Marker East"
            :value="old('antenna_marker_east', ($editing ? $igsstation->antenna_marker_east : ''))"
            max="255"
            step="0.01"
            placeholder="Antenna Marker East"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.datetime
            name="antenna_date_installed"
            label="Antenna Date Installed"
            value="{{ old('antenna_date_installed', ($editing ? optional($igsstation->antenna_date_installed)->format('Y-m-d\TH:i:s') : '')) }}"
            max="255"
            required
        ></x-inputs.datetime>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="clock_type"
            label="Clock Type"
            :value="old('clock_type', ($editing ? $igsstation->clock_type : ''))"
            maxlength="255"
            placeholder="Clock Type"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.number
            name="clock_input_frequency"
            label="Clock Input Frequency"
            :value="old('clock_input_frequency', ($editing ? $igsstation->clock_input_frequency : ''))"
            max="255"
            placeholder="Clock Input Frequency"
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.number
            name="receiver_elevation_cutoff"
            label="Receiver Elevation Cutoff"
            :value="old('receiver_elevation_cutoff', ($editing ? $igsstation->receiver_elevation_cutoff : ''))"
            max="255"
            placeholder="Receiver Elevation Cutoff"
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.number
            name="antenna_marker_up"
            label="Antenna Marker Up"
            :value="old('antenna_marker_up', ($editing ? $igsstation->antenna_marker_up : ''))"
            max="255"
            step="0.01"
            placeholder="Antenna Marker Up"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="clock_effective_dates"
            label="Clock Effective Dates"
            :value="old('clock_effective_dates', ($editing ? $igsstation->clock_effective_dates : ''))"
            maxlength="255"
            placeholder="Clock Effective Dates"
        ></x-inputs.text>
    </x-inputs.group>
</div>
