<button
    {{ $attributes->merge([
        'class'=>'ft-button w-full py-4 font-semibold'
    ]) }}>

    {{ $slot }}

</button>