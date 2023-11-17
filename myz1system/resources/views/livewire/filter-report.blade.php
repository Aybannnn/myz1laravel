<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <div class="container" style="margin-top: 2rem;">
        <div class="filter" style="display: flex; justify-content: right; gap: 1rem;">
            <input wire:model="query" wire:keyup.debounce="filter" type="text" class="form-control" placeholder="Search report" style="width: 25%" style="font-size: 18px;">
            <select wire:model="status_id" wire:change="filter" name="status_id" style="border-radius: 6px; font-size: 18px;">
                <option value="">Filter Reports</option>
                    @foreach($status as $status)
                        <option value="{{$status->id}}">{{$status->status}}</option>
                    @endforeach
            </select>
        </div>
    </div>
</div>
