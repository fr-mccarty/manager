<button
    x-data="{ isTrue: @entangle($attributes->wire('model')) }"
    @click="isTrue = !isTrue"
    type="button"
    :class="{'bg-indigo-600': isTrue, 'bg-gray-200': !isTrue }"
    class="bg-gray-200 relative inline-flex flex-shrink-0 h-6 w-11 mt-1 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
>
    <span
        aria-hidden="true"
        :class="{'translate-x-5': isTrue, 'translate-x-0': !isTrue }"
        class=" pointer-events-none inline-block h-5 w-5 rounded-full bg-white shadow transform ring-0 transition ease-in-out duration-200"></span>
</button>
