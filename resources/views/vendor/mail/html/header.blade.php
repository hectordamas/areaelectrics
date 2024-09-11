@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="https://i.postimg.cc/G2fMfBYG/logo-dark.png" class="logo" alt="{{ env('APP_NAME') }}">
@else
<img src="https://i.postimg.cc/G2fMfBYG/logo-dark.png" class="logo" alt="{{ env('APP_NAME') }}">
@endif
</a>
</td>
</tr>
