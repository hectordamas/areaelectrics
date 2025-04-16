@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="{{ asset('assets/images/logo_dark.png') }}" class="logo" alt="{{ env('APP_NAME') }} Logo">
@else
<img src="{{ asset('assets/images/logo_dark.png') }}" class="logo" alt="{{ env('APP_NAME') }} Logo">
@endif
</a>
</td>
</tr>
