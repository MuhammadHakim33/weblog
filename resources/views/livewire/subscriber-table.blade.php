<div>
    <div class="p-4 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
        <h4>Subscribers <span class="opacity-60">({{$count}})</span></h4>
        <div class="flex gap-3 items-center">
            <input type="text" name="search" wire:model="search" class="form-input w-full sm:w-52 mt-0" placeholder="Search Title">
        </div>
    </div>
    <div class="overflow-auto md:overflow-visible">
        <table class="w-full table-auto text-left ">
            <thead class="uppercase border-y bg-black/5 text-black/60">
                <tr>
                    <th scope="col" class="py-3 px-4 border-y">Name</th>
                    <th scope="col" class="py-3 px-4 border-y">Joined</th>
                </tr>
            </thead>
            <tbody>
                @forelse($subscribers as $author)
                <tr class="border-y">
                    <td class="p-4 align-top flex gap-3 m-0">
                        <div>
                            <img src="{{$author->avatar}}" alt="" class="inline h-14 rounded-sm">
                        </div>
                        <div class="flex flex-col justify-center">
                            <p>{{$author->name}}</p>
                            <small class="text-black/60">{{$author->email}}</small>
                        </div>
                    </td>
                    <td class="p-4 align-top">
                        <p>{{$author->created_at}}</p>
                        <small class="text-black/60">Added</small>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="p-4">
                        <p class="w-fit mx-auto italic text-black/60">empty</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>