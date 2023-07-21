<!-- Sidebar starts -->
<div
    class="fixed top-16 left-0 w-64 mr-1 shadow-lg h-screen border rounded bg-gray-100 dark:border-gray-800 dark:bg-gray-900 shadow flex-col justify-between hidden sm:flex">
    <div class="overflow-y-auto">
        <ul class="list-none space-y-2">
            <x-side-bar-item
                id="dashboard"
                name="Dashboard"
                link="{{ route('dashboard') }}"
                class="bi bi-graph-up-arrow">
            </x-side-bar-item>
            <x-side-bar-drop-down-item
                id="announcements"
                name="Announcements"
                link=""
                class="bi bi-book-fill">
                <x-side-bar-drop-down-item-link
                    id="announcement"
                    name="Announcement"
                    link="{{route('post.index')}}"
                    class="bi bi-book">
                </x-side-bar-drop-down-item-link>
                <x-side-bar-drop-down-item-link
                    id="category"
                    name="Category"
                    link="{{route('category.index')}}"
                    class="bi bi-bezier2">
                </x-side-bar-drop-down-item-link>
            </x-side-bar-drop-down-item>
            <x-side-bar-item
                name="Profile"
                id="profile"
                link="{{route('profile.edit')}}"
                class="bi bi-person">
            </x-side-bar-item>
            @if(auth()->user()->isAdministrator())
                <x-side-bar-item
                    id="manage_user"
                    name="Manage User"
                    link="{{route('users.index')}}"
                    class="bi bi-person-gear">
                </x-side-bar-item>
            @endif
        </ul>
    </div>
</div>
<div
    class="w-64 h-screen border rounded bg-gray-100 dark:border-gray-700 absolute dark:bg-gray-900 shadow md:h-screen flex-col justify-between sm:hidden transition duration-700 ease-in-out"
    id="mobile-nav">
    <button aria-label="toggle sidebar" id="openSideBar"
            class="h-10 w-10 bg-gray-900 absolute right-0 mt-16 -mr-10 flex items-center shadow rounded-tr rounded-br justify-center cursor-pointer focus:outline-none"
            onclick="sidebarHandler(true)">
        <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/light_with_icons_at_bottom-svg7.svg" alt="toggler">
    </button>
    <button aria-label="Close sidebar" id="closeSideBar"
            class="hidden h-10 w-10 bg-gray-900 absolute right-0 mt-16 -mr-10 flex items-center shadow rounded-tr rounded-br justify-center cursor-pointer text-white"
            onclick="sidebarHandler(false)">
        <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/light_with_icons_at_bottom-svg8.svg" alt="cross">
    </button>
    <div class="overflow-scroll">
        <ul class="list-none">
            <x-side-bar-item
                id="dashboard"
                name="Dashboard"
                link="{{ route('dashboard') }}"
                class="bi bi-graph-up-arrow">
            </x-side-bar-item>
            <x-side-bar-drop-down-item
                id="announcements"
                name="Announcements"
                link=""
                class="bi bi-book-fill">
                <x-side-bar-drop-down-item-link
                    id="announcement"
                    name="Announcement"
                    link="{{route('post.index')}}"
                    class="bi bi-book">
                </x-side-bar-drop-down-item-link>
                <x-side-bar-drop-down-item-link
                    id="category"
                    name="Category"
                    link="{{route('category.index')}}"
                    class="bi bi-bezier2">
                </x-side-bar-drop-down-item-link>
            </x-side-bar-drop-down-item>
            <x-side-bar-item
                name="Profile"
                link="{{route('profile.edit')}}"
                class="bi bi-person">
            </x-side-bar-item>
            @if(auth()->user()->isAdministrator())
                <x-side-bar-item
                    id="manage_user"
                    name="Manage User"
                    link="{{route('users.index')}}"
                    class="bi bi-person-gear">
                </x-side-bar-item>
            @endif
        </ul>
    </div>
</div>
<!-- Sidebar ends -->
