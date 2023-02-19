<div x-data="{
    expanded: false,
    selectedOption:{{ $defaultOption ?? '' }},
    options: {{ $options ?? '[]' }},
    close() {
        this.expanded = false
    },
    onSelected: function(option) {
        this.selectedOption = option
        this.close()
    },
    onClick(e) {
        this.expanded = true;
    },
}" {{ $attributes->filter(fn ($value, $key) => ! in_array($key, ['options', 'defaultOption'])) }}>
    <div>
        @if(!empty($label))
            <label {{ $label->attributes }}>{{ $label }}</label>
        @endif
        <div x-on:click.outside="expanded = false" {{ $div->attributes }}>
            <button {{ $button->attributes }}>
                {{ $button }}
            </button>
            <template x-if="expanded">
                <ul {{ $ul->attributes }}>
                    <template x-if="options.length > 0">
                        {{ $content }}
                    </template>
                </ul>
            </template>
        </div>
    </div>
</div>
