@php $editing = isset($user) @endphp

<div class="flex flex-wrap">
    <x-inputs.group class="w-full">
        <x-inputs.text
            name="name"
            label="Name"
            :value="old('name', ($editing ? $user->name : ''))"
            maxlength="255"
            placeholder="Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.email
            name="email"
            label="Email"
            :value="old('email', ($editing ? $user->email : ''))"
            maxlength="255"
            placeholder="Email"
            required
        ></x-inputs.email>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.password
            name="password"
            label="Password"
            maxlength="255"
            placeholder="Password"
            :required="!$editing"
        ></x-inputs.password>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <div
            x-data="imageViewer('{{ $editing && $user->image ? \Storage::url($user->image) : '' }}')"
        >
            <x-inputs.partials.label
                name="image"
                label="Image"
            ></x-inputs.partials.label
            ><br />

            <!-- Show the image -->
            <template x-if="imageUrl">
                <img
                    :src="imageUrl"
                    class="object-cover rounded border border-gray-200"
                    style="width: 100px; height: 100px;"
                />
            </template>

            <!-- Show the gray box when image is not available -->
            <template x-if="!imageUrl">
                <div
                    class="border rounded border-gray-200 bg-gray-100"
                    style="width: 100px; height: 100px;"
                ></div>
            </template>

            <div class="mt-2">
                <input
                    type="file"
                    name="image"
                    id="image"
                    @change="fileChosen"
                />
            </div>

            @error('image') @include('components.inputs.partials.error')
            @enderror
        </div>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="phone"
            label="Phone"
            :value="old('phone', ($editing ? $user->phone : ''))"
            maxlength="255"
            placeholder="Phone"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="title"
            label="Title"
            :value="old('title', ($editing ? $user->title : ''))"
            maxlength="255"
            placeholder="Title"
        ></x-inputs.text>
    </x-inputs.group>

    <div class="px-4 my-4">
        <h4 class="font-bold text-lg text-gray-700">
            Assign @lang('crud.roles.name')
        </h4>

        <div class="py-2">
            @foreach ($roles as $role)
            <div>
                <x-inputs.checkbox
                    id="role{{ $role->id }}"
                    name="roles[]"
                    label="{{ ucfirst($role->name) }}"
                    value="{{ $role->id }}"
                    :checked="isset($user) ? $user->hasRole($role) : false"
                    :add-hidden-value="false"
                ></x-inputs.checkbox>
            </div>
            @endforeach
        </div>
    </div>
</div>
