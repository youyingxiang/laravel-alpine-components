<div x-data="alpineData()" {{ $attributes->filter(fn ($value, $key) => ! in_array($key, ['minIptLength','options'])) }}>
    <div>
        @if(!empty($label))
            <label {{ $label->attributes }}>{{ $label }}</label>
        @endif
        <div x-on:click.outside="expanded = false" {{ $combobox->attributes }}>
            <input {{ $input->attributes->filter(fn ($value, $key) => ! in_array($key, ['@click', '@input'])) }} x-ref="comboboxIpt" x-bind:value="iptValue"/>
            <button {{ $button->attributes }}>
                {{ $button }}
            </button>
            <template x-if="expanded">
                <ul {{ $ul->attributes }}>
                    <template x-if="shouldIptLength > 0">
                        <li {{ $help->attributes }}>
                            Please enter <span x-text="shouldIptLength"></span> or more characters
                        </li>
                    </template>
                    <template x-if="shouldIptLength <= 0 && filteredOptions.length > 0">
                        {{ $content }}
                    </template>
                    <template x-if="shouldIptLength <= 0 && filteredOptions.length === 0">
                        <li {{ $help->attributes }}>
                            No results found
                        </li>
                    </template>
                </ul>
            </template>
        </div>
    </div>
</div>

<script>
    const alpineData = () => {
        return {
            expanded: false,
            minIptLength: {{ intval($minIptLength ?? 0) }},
            options: {{ $options ?? '[]' }},
            filteredOptions: [],
            iptValue: '',
            get shouldIptLength() {
                const shouldIptLength = this.minIptLength - this.iptValue.length ?? 0;
                return shouldIptLength > 0 ? shouldIptLength : 0
            },
            close(focusAfter) {
                this.expanded = false
                focusAfter && focusAfter.focus()
            },
            onSelected: function (value) {
                this.iptValue = value
                this.close($refs.comboboxIpt)
            },
            resetFilteredOptions() {
                this.filteredOptions = [];
            }
        }
    }
</script>
