<div x-data="{
    expanded:false,
    minIptLength:{{ intval($minIptLength ?? 0) }},
    loading:false,
    filteredOptions:[],
    selectedOption:null,
    iptValue: '',
    pagination: {
        page: {{ intval($page ?? 1) }},
        more:true,
        perPage: {{ $perPage ?? 15 }}
    },
    get shouldIptLength() {
        const shouldIptLength = this.minIptLength - this.iptValue.length ?? 0;
        return shouldIptLength > 0 ? shouldIptLength :  0
    },
    onClick(e) {
        this.iptValue = e.target.value;
        this.expanded = true;
    },
    onInput(e) {
        this.iptValue = e.target.value;
        this.expanded = true;
        this.resetPagination();
        this.resetSelectedOption()
        this.resetFilteredOptions();
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
    resetPagination() {
        this.pagination.page = 1;
        this.pagination.more = true;
    },
    resetSelectedOption() {
        this.selectedOption = null
    },
    resetFilteredOptions() {
        this.filteredOptions = [];
    },
}" {{ $attributes->filter(fn ($value, $key) => ! in_array($key, ['minIptLength','page', 'perPage'])) }}>
    <div>
        @if(!empty($label))
            <label {{ $label->attributes }}>{{ $label }}</label>
        @endif
        <div x-on:click.outside="expanded = false" {{ $combobox->attributes }}>
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
                    <template x-if="shouldIptLength <= 0 && filteredOptions.length === 0 && !loading">
                        <li {{ $help->attributes }}>
                            No results found
                        </li>
                    </template>
                    <template x-if="shouldIptLength <= 0 && loading">
                        <li {{ $help->attributes }}>
                            Loading data ...
                        </li>
                    </template>
                </ul>
            </template>
        </div>
    </div>
</div>
