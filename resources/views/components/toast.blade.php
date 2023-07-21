@if(session()->has('success'))
    <div x-data="{show: true}"
         x-init="setTimeout(() => show = false, 4000 )"
         x-show="show"
         class="fixed text-center bottom-5 py-3 px-5 rounded-md right-3 bg-sky-700 text-sm text-white">
        <p class="inline-flex items-center">
            <svg aria-hidden="true"
                 class="w-4 h-4 rounded-full text-sky-400 border border-sky-400 mr-2"
                 fill="currentColor" viewBox="0 0 20 20"
                 xmlns="http://www.w3.org/2000/svg">
                <path
                    fill-rule="evenodd"
                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                    clip-rule="evenodd"></path>
            </svg>
            {{session('success')}}
        </p>
    </div>
@elseif(session()->has('error'))
    <div x-data="{show: true}"
         x-init="setTimeout(() => show = false, 4000 )"
         x-show="show"
         class="fixed text-right bottom-5 py-3 px-5 rounded-md right-3 bg-red-600 text-sm text-white">
        <span class="inline-flex items-center">
            <i class="bi bi-x-circle mr-2 text-base"></i>
            {{session('error')}}</span>
    </div>
@elseif(session()->has('status'))
    <div x-data="{show: true}"
         x-init="setTimeout(() => show = false, 4000 )"
         x-show="show"
         class="fixed text-right bottom-5 py-3 px-5 rounded-md right-3 bg-green-500 text-sm text-white">
        <p>
            <i class="bi bi-send-check text-base"></i>
            A new verification link has been sent to <br> the email address you provided during registration.
        </p>
    </div>
@elseif(session()->has('warning'))
    <div x-data="{show: true}"
         x-init="setTimeout(() => show = false, 4000 )"
         x-show="show"
         class="fixed text-right bottom-5 py-3 px-5 rounded-md right-3 bg-yellow-400 text-sm text-white">
        <p>
            {{session('warning')}}
        </p>
    </div>
@endif
