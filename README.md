<h2 align="center">Laravel-Alpine-Components</h2>

## About
This is about laravel blade and alpinejs related components

## Function
- [x] combobox
- [ ] remote-combobox
- [ ] select
- [ ] data-time
- [ ] modal
- [ ] dropdown

## Install

``` 
composer require yxx/laravel-alpine-components
```

## View Local Example

- Execute:
``` 
php artisan vendor:publish --provider="Yxx\LaravelAlpineComponents\Providers\LaravelAlpineComponentServiceProvider
```

- Accessed at the `{your domain}/alp-examples/` route.

## Code example

```php
    @php
        $options = [
            ["id" => 1, "name" => 'Alabama'],
            ["id" => 2, "name" => 'Colorado'],
            ["id" => 3, "name" => 'Indiana'],
            ["id" => 4, "name" => 'Nevada'],
            ["id" => 5, "name" => 'NewYork'],
            ["id" => 6, "name" => 'Oklahoma'],
            ["id" => 7, "name" => 'Pennsylvania'],
            ["id" => 8, "name" => 'Guam']
       ];
    @endphp
    <x-alp-combobox class="w-96" minIptLength="2" options="{!! json_encode($options) !!}">
        <x-slot:label class="block text-sm font-medium text-gray-700">State federal district or territory</x-slot:label>
        <x-slot:combobox class="relative mt-1">
            <x-slot:input
                @click="onClick"
                @input="(e) => {
                    onInput(e);
                    filteredOptions = iptValue === '' ? options: options.filter((option) => option.name.toLowerCase().includes(iptValue.toLowerCase()))
                }"
                type="text"
                class="w-full rounded-md border border-gray-300 bg-white py-2 pl-3 pr-12 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500 sm:text-sm">
            </x-slot:input>
            <x-slot:button type="button" class="absolute inset-y-0 right-0 flex items-center rounded-r-md px-2 focus:outline-none">
                <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M10 3a.75.75 0 01.55.24l3.25 3.5a.75.75 0 11-1.1 1.02L10 4.852 7.3 7.76a.75.75 0 01-1.1-1.02l3.25-3.5A.75.75 0 0110 3zm-3.76 9.2a.75.75 0 011.06.04l2.7 2.908 2.7-2.908a.75.75 0 111.1 1.02l-3.25 3.5a.75.75 0 01-1.1 0l-3.25-3.5a.75.75 0 01.04-1.06z" clip-rule="evenodd" />
                </svg>
            </x-slot:button>
            <x-slot:ul class="absolute z-10 mt-1 max-h-60 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm" id="options" role="listbox">
                <x-slot:content>
                    <template x-for="option in filteredOptions" :key="option.id">
                        <li @click="(e)=> {
                            onSelected(option.name);
                        }"  class="group text-gray-900 relative cursor-default select-none py-2 pl-3 pr-9 hover:text-white hover:bg-gray-700">
                            <span class="block truncate" x-text="option.name"></span>
                        </li>
                    </template>
                </x-slot:content>
                <x-slot:help class="relative cursor-default select-none py-2 pl-3 pr-9 text-sm text-gray-500"></x-slot:help>
            </x-slot:ul>
        </x-slot:combobox>
    </x-alp-combobox>
```


