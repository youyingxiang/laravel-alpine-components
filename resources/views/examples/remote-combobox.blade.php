@extends('alp::examples.layout')
@section('content')
    <x-alp-remote-combobox class="w-96" minIptLength="4" perPage="10">
        <x-slot:label class="block text-sm font-medium text-gray-700">Load data through api</x-slot:label>
        <x-slot:div class="relative mt-1">
            <x-slot:input
                type="text"
                class="w-full rounded-md border border-gray-300 bg-white py-2 pl-3 pr-12 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500 sm:text-sm"
                @click="onClick"
                @input="(e) => {
                    onInput(e);
                    if (shouldIptLength > 0) {
                        return;
                    }
                    if (loading) {
                       return;
                    }
                    loading = true
                    fetch('{{ route('remote-combobox.mockup') }}?' + new URLSearchParams({
                        query: iptValue,
                        page: pagination.page,
                        perPage: pagination.perPage
                    }))
                    .then(res => res.json())
                    .then((res) => {
                        const more  = res.pagination.more
                        const data  = res.data
                        pagination.more = more
                        more ? pagination.page += 1 : ''
                        data.length > 0 ? filteredOptions = filteredOptions.concat(data) : ''
                    })
                    .finally(() => {
                        loading = false
                    })
                }"
            >
            </x-slot:input>
            <x-slot:button type="button" class="absolute inset-y-0 right-0 flex items-center rounded-r-md px-2 focus:outline-none">
                <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M10 3a.75.75 0 01.55.24l3.25 3.5a.75.75 0 11-1.1 1.02L10 4.852 7.3 7.76a.75.75 0 01-1.1-1.02l3.25-3.5A.75.75 0 0110 3zm-3.76 9.2a.75.75 0 011.06.04l2.7 2.908 2.7-2.908a.75.75 0 111.1 1.02l-3.25 3.5a.75.75 0 01-1.1 0l-3.25-3.5a.75.75 0 01.04-1.06z" clip-rule="evenodd" />
                </svg>
            </x-slot:button>
            <x-slot:ul @scroll="(e) => {
                if (shouldIptLength <= 0 && pagination.more && Math.ceil(e.currentTarget.scrollTop + e.currentTarget.clientHeight)) {
                    if (loading) {
                       return;
                    }
                    loading = true
                    fetch('{{ route('remote-combobox.mockup') }}?' + new URLSearchParams({
                        query: iptValue,
                        page: pagination.page,
                        perPage: pagination.perPage
                    }))
                    .then(res => res.json())
                    .then((res) => {
                        const more  = res.pagination.more
                        const data  = res.data
                        pagination.more = more
                        more ? pagination.page += 1 : ''
                        data.length > 0 ? filteredOptions = filteredOptions.concat(data) : ''
                    })
                    .finally(() => {
                        loading = false
                    })
                }
            }" class="absolute z-10 mt-1 max-h-60 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm" id="options" role="listbox">
                <x-slot:content>
                    <template x-for="option in filteredOptions" :key="option.id">
                        <li @click="onSelected(option.name, option)" class="group text-gray-900 relative cursor-default select-none py-2 pl-3 pr-9 hover:text-white hover:bg-gray-700">
                            <span class="block truncate" x-text="option.name"></span>
                            <template x-if="iptValue === option.name">
                                <span class="text-gray-700 absolute inset-y-0 right-0 flex items-center pr-4 group-hover:text-white">
                                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                                    </svg>
                                </span>
                            </template>
                        </li>
                    </template>
                </x-slot:content>
                <x-slot:help class="relative cursor-default select-none py-2 pl-3 pr-9 text-sm text-gray-500"></x-slot:help>
            </x-slot:ul>
        </x-slot:div>
    </x-alp-remote-combobox>
@endsection