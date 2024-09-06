@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="https://i.postimg.cc/YCW6J04F/logo-dark.png" class="logo" alt="Fiber Solutions">
@else
<img src="https://i.postimg.cc/YCW6J04F/logo-dark.png" class="logo" alt="Fiber Solutions">
@endif
</a>
</td>
</tr>
