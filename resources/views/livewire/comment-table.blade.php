<div>
    <div class="p-4 flex flex-col sm:flex-row sm:items-center justify-between gap-3 border-b">
        <h4>All Comment <span class="opacity-60">({{ count($comments) }})</span></h4>
        <div class="flex gap-3 items-center">
            <select class="form-select btn-sm w-28 h-9 flex-none mt-0" wire:model="order">
                <option selected value="desc">Newest</option>
                <option value="asc">Oldest</option>
            </select>
        </div>
    </div>
    <div class="overflow-auto md:overflow-visible">
        <div class="w-full table-auto text-left">
            @forelse($comments->where('parent_id', NULL) as $comment)
            <div class="p-4 border-b">
                <div class="mb-4 text-sm space-y-1">
                    <span>
                        From
                        <span class="font-semibold">{{ $comment->user->name }}</span>
                        response to
                        <span class="font-semibold">{{ $comment->post->title }}</span>
                    </span>
                    <p class="opacity-70">comment on {{ $comment->created_at->diffForHumans() }}</p>
                </div>
                <div class="mb-4">
                    <p>{{ $comment->comment }}</p>
                </div>
                <!-- reply form -->
                <form class="flex gap-x-4" action="/comments" method="post">
                    @csrf
                    <input type="text" name="comment" class="form-input w-full mt-0" placeholder="Reply">
                    <input type="text" name="post_id" value="{{ $comment->post->id }}" hidden>
                    <input type="text" name="parent_id" value="{{ $comment->id }}" hidden>
                    <button type="submit" class="btn-sm btn-primary">Send</button>
                </form>
                <!-- reply list -->
                <div class="mt-4">
                    @foreach($comment->child as $child)
                    <div class="py-2 ml-10 text-sm space-y-1">
                        <div class="xl:flex gap-x-1">
                            <span class="font-semibold">{{ $child->user->name }}</span>
                            <p class="overflow-hidden">{{ $child->comment }}</p>
                        </div>
                        <p class="opacity-70">{{ $child->created_at->diffForHumans() }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
            @empty
            <div>
                <p class="w-fit mx-auto italic text-black/60">empty</p>
            </div>
            @endforelse
        </div>
    </div>
    <div class="p-4">{{ $comments->links() }}</div>
</div>
