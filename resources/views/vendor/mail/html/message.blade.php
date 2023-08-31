@props(['cover_image_text', 'cover_image'])
<x-mail::layout>
{{-- Header --}}
<x-slot:header>
<x-mail::header :url="config('app.url')" :cover_image_text="$cover_image_text" :cover_image="$cover_image">
</x-mail::header>
</x-slot:header>
{{-- Body --}}
{!! $slot !!}
{{-- Subcopy --}}
@isset($subcopy)
<x-slot:subcopy>
<x-mail::subcopy>
{{ $subcopy }}
</x-mail::subcopy>
</x-slot:subcopy>
@endisset
{{-- Footer --}}
<x-slot:footer>
<x-mail::footer>
</x-mail::footer>
</x-slot:footer>
</x-mail::layout>