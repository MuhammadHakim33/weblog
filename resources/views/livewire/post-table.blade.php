<div>
    <div class="p-4 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
        <h4>All Post <span class="opacity-60">({{ $count }})</span></h4>
        <div class="flex gap-3 items-center">
            <input type="text" name="search" wire:model="search" class="form-input w-full sm:w-52 mt-0" placeholder="Search Title">
            <select class="form-select btn-sm w-28 h-9 flex-none mt-0" wire:model="order">
                <option selected value="created_at">Newest</option>
                <option value="category_id">Category</option>
                <option value="status">Status</option>
            </select>
        </div>
    </div>
    <div class="overflow-auto md:overflow-visible">
        <table class="w-full table-auto text-left ">
            <thead class="uppercase border-y bg-black/5 text-black/60">
                <tr>
                    <th scope="col" class="py-3 px-4 border-y w-2/5">Title</th>
                    <th scope="col" class="py-3 px-4 border-y">Creator</th>
                    <th scope="col" class="py-3 px-4 border-y">Date</th>
                    <th scope="col" class="py-3 px-4 border-y w-28">Status</th>
                    <th scope="col" class="py-3 px-4 border-y w-12"></th>
                </tr>
            </thead>
            <tbody>
                @forelse($posts as $post)
                <tr>
                    <td class="border-y p-4 align-top"><a href="/posts/{{ $post->id }}" class="hover:underline hover:text-primary">{{ $post->title }}</a></td>
                    <td class="border-y p-4 align-top capitalize">{{ $post->user->name }}</td>
                    <td class="border-y p-4 align-top">
                        <p>{{ $post->created_at }}</p>
                        <small class="text-black/60">Added</small>
                    </td>
                    <td class="border-y p-4 align-top">
                        @if($post->status === 'rejected')
                        <span class="badge badge-danger capitalize">{{ $post->status }}</span>
                        @elseif($post->status === 'reviewed')
                        <span class="badge badge-warning capitalize">{{ $post->status }}</span>
                        @else
                        <span class="badge badge-success capitalize">{{ $post->status }}</span>
                        @endif
                    </td>
                    <td class="border-y p-4 align-top ">
                        <div class="md:relative" x-data="{dropdown: false}">
                            <button x-on:click="dropdown = !dropdown" class="btn-sm flex items-center hover:bg-black/5">
                                <i class="ri-more-2-line ri-xl"></i>
                            </button>
                            <div x-show="dropdown" x-cloak x-on:click.outside="dropdown = false" class="z-10 absolute right-4 md:right-0 flex flex-col rounded border bg-white shadow-lg w-32">
                                @can('admin')
                                <!-- Publish -->
                                @if($post->status == 'rejected')
                                <form action="/posts/{{ $post->id }}/publish" method="post">
                                    @method('put')
                                    @csrf
                                    <button class="w-full text-left py-2 px-4 text-sm hover:bg-primary/10" onclick="return confirm('Are you sure?')">Publish</button>
                                </form>
                                <!-- Reject -->
                                @elseif($post->status == 'published')
                                <form action="/posts/{{ $post->id }}/reject" method="post">
                                    @method('put')
                                    @csrf
                                    <button class="w-full text-left py-2 px-4 text-sm hover:bg-primary/10" onclick="return confirm('Are you sure?')">Reject</button>
                                </form>
                                <!-- Publish & Reject-->
                                @elseif($post->status == 'reviewed')
                                <form action="/posts/{{ $post->id }}/publish" method="post">
                                    @method('put')
                                    @csrf
                                    <button class="w-full text-left py-2 px-4 text-sm hover:bg-primary/10" onclick="return confirm('Are you sure?')">Publish</button>
                                </form>
                                <form action="/posts/{{ $post->id }}/reject" method="post">
                                    @method('put')
                                    @csrf
                                    <button class="w-full text-left py-2 px-4 text-sm hover:bg-primary/10" onclick="return confirm('Are you sure?')">Reject</button>
                                </form>
                                @endif
                                <hr>
                                @endcan
                                <!-- Edit -->
                                <a href="/posts/{{ $post->id }}/edit" class="py-2 px-4 text-sm hover:bg-primary/10">Edit</a>
                                <!-- Delete -->
                                <form action="/posts/{{ $post->id }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button class="w-full text-left py-2 px-4 text-sm hover:bg-red-700/10 text-red-700" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </div>
                        </div>
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
    <div class="p-4">{{ $posts->links() }}</div>
</div>