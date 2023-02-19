<div x-data="{
    expanded: false,
    minIptLength: {{ intval($minIptLength ?? 0) }},
    options: {{ $options ?? '[]' }},
    filteredOptions: [],
    selectedOption:null,
    iptValue: '',
    get shouldIptLength() {
        const shouldIptLength = this.minIptLength - this.iptValue.length ?? 0;
        return shouldIptLength > 0 ? shouldIptLength : 0
    },
    close(focusAfter) {
        this.expanded = false
        focusAfter && focusAfter.focus()
    },
    onSelected: function(text, option) {
        this.iptValue = text
        this.selectedOption = option
        this.close($refs.comboboxIpt)
    },
    onClick(e) {
        this.iptValue = e.target.value;
        this.expanded = true;
        if(this.iptValue.length === 0) {
            this.filteredOptions = this.options;
        }
    },
    onInput(e) {
        this.iptValue = e.target.value;
        this.expanded = true;
        this.resetSelectedOption()
        this.resetFilteredOptions()
    },
    resetSelectedOption() {
        this.selectedOption = null
    },
    resetFilteredOptions() {
        this.filteredOptions = [];
    }
}" {{ $attributes->filter(fn ($value, $key) => ! in_array($key, ['minIptLength','options'])) }}>
    <div>
        @if(!empty($label))
            <label {{ $label->attributes }}>{{ $label }}</label>
        @endif
        <div x-on:click.outside="expanded = false" {{ $div->attributes }}>
            <input {{ $input->attributes }} x-ref="comboboxIpt" x-bind:value="iptValue"/>
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
