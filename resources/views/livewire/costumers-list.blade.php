<div class="flex justify-content-center">
    @if ($all)
        <input type="hidden" name="all" value="1">
    @endif

    <button wire:click="setall" type="button"
        class="btn {{ $all ? 'btn-primary' : 'btn-warning' }} my-1">{{ $all ? 'Semua' : 'Manual' }}</button>
    @if (!$all)

        @forelse ($customers as $c)
        <div class="form-group">
            <input type="checkbox" name="customers[]"  value="{{$c['no_telp']}}">
            <span>{{$c['name']}}-{{$c['no_telp']}}</label>
        </div>
        @empty
        @endforelse

    @endif

</div>

@livewireScripts
