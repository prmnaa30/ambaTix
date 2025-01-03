<div class="flex flex-col gap-1 text-text-100">
    <label for="{{ $id }}" class="w-fit">{{ $label }}</label>
    
    @if ($inputTag == 'input')
        <input
            type="{{ $type }}"
            name="{{ $name }}"
            id="{{ $id }}"
            value="{{ $value ?? null }}"
            class="w-full border-2 border-primary-500 focus:outline-none focus:border-primary-400 transition-colors duration-500 ease rounded-lg p-1 bg-transparent placeholder:text-text-500 text-text-300 {{ $class ?? '' }}"
            placeholder="{{ $placeholder }}"
            {{ $attributes ?? null}}
            required
        />
    @elseif ($inputTag == 'textarea')
        <textarea
            name="{{ $name }}"
            id="{{ $id }}"
            class="w-full border-2 border-primary-500 focus:outline-none focus:border-primary-400 transition-colors duration-500 ease rounded-lg p-1 bg-transparent placeholder:text-text-500 text-text-300"
            placeholder="{{ $placeholder }}"
            required
        >{{ $value ?? null }}</textarea>
    @endif
    
</div>
