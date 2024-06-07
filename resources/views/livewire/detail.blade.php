<div>
    <div class="md:px-[10em] px-6 py-[4em] md:gap-[10em] bg-gray-800 w-full md:flex items-center">
        <i class="fas fa-{{$app->font_awesome}} text-white text-[6em] py-12"></i>

        <div class="text-white ">
            <div class="text-[5em] font-bold">
                {{$app->name}}
            </div>
            <div class="text-[2em]">
                {{$app->description}}
            </div>
        </div>
    </div>

    <x-page>
        <div class="gap-[5em] px-[4em] py-[4em] ">
            <div>
                {{$app->content}}

            </div>
            <div>
                <x-link.black-button class="mt-7" target="_blank" href="{{$app->public_url}}">
                    Go To app
                </x-link.black-button>
            </div>
        </div>
    </x-page>

    @include('include.footer')
</div>
