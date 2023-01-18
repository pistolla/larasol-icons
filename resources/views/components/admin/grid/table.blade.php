<table {{ $attributes->merge(['class' => 'table align-items-center mb-0']) }}>
    <thead>
        {{ $head }}
    </thead>

    <tbody class="bg-white">
        {{ $body }}
    </tbody>
</table>