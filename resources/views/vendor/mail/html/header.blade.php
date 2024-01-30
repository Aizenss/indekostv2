@props(['url'])
<tr>
  <td class="header">
    <a href="{{ $url }}" style="display: inline-block;">
      @if (trim($slot) === 'Laravel')
        <img src="{{ asset('foto/inilogo.png') }}" class="logo" alt="Laravel Logo" style="    position: relative;max-width: 100%; border: none; height: 100px; max-height: 150px;width: 150px;">
      @else
        {{ $slot }}
      @endif
    </a>
  </td>
</tr>
