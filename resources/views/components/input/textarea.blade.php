@props(['rows' => 3])

<div class="flex rounded-md shadow-sm">
    <textarea {{ $attributes }} rows="{{$rows}}" class="mt-1 form-textarea block w-full transition rounded-md shadow-sm border-gray-300 border border-cool-gray-300 duration-150 ease-in-out sm:text-sm sm:leading-5"></textarea>
</div>
