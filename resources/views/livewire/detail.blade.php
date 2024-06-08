<div>
    <div class="md:px-[10em] px-6 w-full bg-gray-800">
        <div class="pt-8">
            <a href="/" class="flex items-center mb-3 text-white">
                <x-icon.left-arrow/>
                <span>Home</span>
            </a>
        </div>

        <div class="pb-[4em]  md:flex items-center md:gap-[10em]">
            @if($app->custom_logo)
                <img alt="Logo" class="w-[7em]" src="{{$app->custom_logo}}" />
            @else
                <i class="fas fa-{{$app->font_awesome}} text-white text-[6em] py-12"></i>
            @endif

            <div class="text-white ">
                <div class="text-[5em] font-bold">
                    {{$app->name}}
                </div>
                <div class="text-[2em]">
                    {{$app->description}}
                </div>
            </div>
        </div>

    </div>

    <x-page>
        <div class="gap-[5em] px-[4em] py-10 ">
            <x-link.black-button class="" target="_blank" href="{{$app->public_url}}">
                Go To app
            </x-link.black-button>
            <div class="bg-white py-6 px-6 mt-8">
                <div class="markdown">
                    {!! Str::markdown($app->content)  !!}
                </div>
            </div>
        </div>
    </x-page>

    @include('include.footer')
</div>
