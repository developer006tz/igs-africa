@php $editing = isset($corsstation) @endphp

<div class="flex flex-wrap">
    <x-inputs.group class="w-full">
        <x-inputs.text
            name="pnum"
            label="Pnum"
            :value="old('pnum', ($editing ? $corsstation->pnum : ''))"
            maxlength="255"
            placeholder="Pnum"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.select name="stntype" label="Stntype">
            @php $selected = old('stntype', ($editing ? $corsstation->stntype : 'GPS')) @endphp
            <option value="GPS" {{ $selected == 'GPS' ? 'selected' : '' }} >Gps</option>
            <option value="GLONASS " {{ $selected == 'GLONASS ' ? 'selected' : '' }} >Glonass</option>
            <option value="Galileo" {{ $selected == 'Galileo' ? 'selected' : '' }} >Galileo</option>
            <option value="BeiDou" {{ $selected == 'BeiDou' ? 'selected' : '' }} >Bei dou</option>
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.select name="stnstatus" label="Stnstatus">
            @php $selected = old('stnstatus', ($editing ? $corsstation->stnstatus : 'installed')) @endphp
            <option value="installed" {{ $selected == 'installed' ? 'selected' : '' }} >Installed</option>
            <option value="not-installed" {{ $selected == 'not-installed' ? 'selected' : '' }} >Not installed</option>
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.select name="opstatus" label="Opstatus">
            @php $selected = old('opstatus', ($editing ? $corsstation->opstatus : 'Operable')) @endphp
            <option value="Operable" {{ $selected == 'Operable' ? 'selected' : '' }} >Operable</option>
            <option value="Non-Operational" {{ $selected == 'Non-Operational' ? 'selected' : '' }} >Non operational</option>
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="sitecity"
            label="Sitecity"
            :value="old('sitecity', ($editing ? $corsstation->sitecity : ''))"
            maxlength="255"
            placeholder="Sitecity"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="sitestate"
            label="Sitestate"
            :value="old('sitestate', ($editing ? $corsstation->sitestate : ''))"
            maxlength="255"
            placeholder="Sitestate"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="region"
            label="Region"
            :value="old('region', ($editing ? $corsstation->region : 'noUS'))"
            maxlength="255"
            placeholder="Region"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.number
            name="latitude"
            label="Latitude"
            :value="old('latitude', ($editing ? $corsstation->latitude : ''))"
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
            :value="old('longitude', ($editing ? $corsstation->longitude : ''))"
            max="255"
            step="0.01"
            placeholder="Longitude"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.number
            name="elevation"
            label="Elevation"
            :value="old('elevation', ($editing ? $corsstation->elevation : ''))"
            max="255"
            step="0.01"
            placeholder="Elevation"
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.select name="project" label="Project">
            @php $selected = old('project', ($editing ? $corsstation->project : 'PI')) @endphp
            <option value="PI" {{ $selected == 'PI' ? 'selected' : '' }} >Pi</option>
            <option value="GNN" {{ $selected == 'GNN' ? 'selected' : '' }} >Gnn</option>
            <option value="other" {{ $selected == 'other' ? 'selected' : '' }} >Other</option>
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.select name="network" label="Network">
            @php $selected = old('network', ($editing ? $corsstation->network : 'PI')) @endphp
            <option value="PI" {{ $selected == 'PI' ? 'selected' : '' }} >Pi</option>
            <option value="GGN" {{ $selected == 'GGN' ? 'selected' : '' }} >Ggn</option>
            <option value="other" {{ $selected == 'other' ? 'selected' : '' }} >Other</option>
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.select name="multi_types" label="Multi Types">
            @php $selected = old('multi_types', ($editing ? $corsstation->multi_types : 'GPS')) @endphp
            <option value="GPS" {{ $selected == 'GPS' ? 'selected' : '' }} >Gps</option>
            <option value="GPS+GLO+GAL+BDS" {{ $selected == 'GPS+GLO+GAL+BDS' ? 'selected' : '' }} >Gps glo gal bds</option>
            <option value="GPS+GLO+GAL+BDS+IRSS" {{ $selected == 'GPS+GLO+GAL+BDS+IRSS' ? 'selected' : '' }} >Gps glo gal bds irss</option>
            <option value="GPS+GLO" {{ $selected == 'GPS+GLO' ? 'selected' : '' }} >Gps glo</option>
            <option value="GPS+GLO+GAL+BDS+IRNS+SBAS" {{ $selected == 'GPS+GLO+GAL+BDS+IRNS+SBAS' ? 'selected' : '' }} >Gps glo gal bds irns sbas</option>
            <option value="GPS+GLO+GAL+BDS+QZSS" {{ $selected == 'GPS+GLO+GAL+BDS+QZSS' ? 'selected' : '' }} >Gps glo gal bds qzss</option>
            <option value="DBS" {{ $selected == 'DBS' ? 'selected' : '' }} >Dbs</option>
            <option value="IRSS" {{ $selected == 'IRSS' ? 'selected' : '' }} >Irss</option>
            <option value="GLO" {{ $selected == 'GLO' ? 'selected' : '' }} >Glo</option>
            <option value="SBAS" {{ $selected == 'SBAS' ? 'selected' : '' }} >Sbas</option>
            <option value="GAL" {{ $selected == 'GAL' ? 'selected' : '' }} >Gal</option>
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.number
            name="is_realtime"
            label="Is Realtime"
            :value="old('is_realtime', ($editing ? $corsstation->is_realtime : ''))"
            max="255"
            placeholder="Is Realtime"
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.number
            name="mean_latency_last_hour"
            label="Mean Latency Last Hour"
            :value="old('mean_latency_last_hour', ($editing ? $corsstation->mean_latency_last_hour : ''))"
            max="255"
            placeholder="Mean Latency Last Hour"
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.number
            name="mean_latency_last_day"
            label="Mean Latency Last Day"
            :value="old('mean_latency_last_day', ($editing ? $corsstation->mean_latency_last_day : ''))"
            max="255"
            placeholder="Mean Latency Last Day"
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.number
            name="data_complete_last_hour"
            label="Data Complete Last Hour"
            :value="old('data_complete_last_hour', ($editing ? $corsstation->data_complete_last_hour : ''))"
            max="255"
            placeholder="Data Complete Last Hour"
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.number
            name="data_complete_last_day"
            label="Data Complete Last Day"
            :value="old('data_complete_last_day', ($editing ? $corsstation->data_complete_last_day : ''))"
            max="255"
            placeholder="Data Complete Last Day"
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.select name="status" label="Status">
            @php $selected = old('status', ($editing ? $corsstation->status : 'ok')) @endphp
            <option value="ok" {{ $selected == 'ok' ? 'selected' : '' }} >Ok</option>
            <option value="unavilable" {{ $selected == 'unavilable' ? 'selected' : '' }} >Unavilable</option>
            <option value="non-operational" {{ $selected == 'non-operational' ? 'selected' : '' }} >Non operational</option>
            <option value="failed" {{ $selected == 'failed' ? 'selected' : '' }} >Failed</option>
            <option value="other" {{ $selected == 'other' ? 'selected' : '' }} >Other</option>
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.date
            name="date_installed"
            label="Date Installed"
            value="{{ old('date_installed', ($editing ? optional($corsstation->date_installed)->format('Y-m-d') : '')) }}"
            max="255"
        ></x-inputs.date>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.number
            name="last_rinex_data_year"
            label="Last Rinex Data Year"
            :value="old('last_rinex_data_year', ($editing ? $corsstation->last_rinex_data_year : ''))"
            max="255"
            placeholder="Last Rinex Data Year"
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="data_download_link"
            label="Data Download Link"
            :value="old('data_download_link', ($editing ? $corsstation->data_download_link : ''))"
            maxlength="255"
            placeholder="Data Download Link"
        ></x-inputs.text>
    </x-inputs.group>
</div>
