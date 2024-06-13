<div>
    <div class="py-[5em] bg-gray-800 w-full">
        <x-page>
            <div class="md:gap-[10em] px-[4em] md:flex items-center">
                <i class="fas fa-book-bible text-white text-[10em]"></i>

                <div class="text-white ">
                    <div class="text-[5em] font-bold">
                        Catholic Resource
                    </div>
                    <div class="text-[2em]">
                        Useful Tech for Church Leaders and other Entrepreneurs
                    </div>
                    <div class="mt-10">
                        <x-link.white-button target="_blank" href="https://lolekproductions.org">
                            Lolek Productions
                        </x-link.white-button>
                    </div>
                </div>
            </div>
        </x-page>
    </div>

    <x-page>
        @foreach($apps as $index => $app)
            @if($app->is_active)
                <div id="{{$app->url}}" class="{{ $index % 2 != 0 ? 'flex-row-reverse' : '' }} gap-[5em] md:flex justify-between px-[4em] py-[4em] items-center">
                    <div>
                        <div class="text-[3em] font-semibold">
                            {{$app->name}}
                        </div>
                        <div class="text-xl text-gray-600">
                            {{$app->description}}
                        </div>
                        <x-link.black-button class="mt-7" href="{{$app->url}}">
                            More Information
                        </x-link.black-button>
                    </div>
                    <div class="py-12">
                    @if($app->custom_logo)
                        <img alt="Logo" class="w-[7em]" src="{{$app->custom_logo}}" />
                    @else
                        <i class="fas fa-{{$app->font_awesome}} text-[6em]"></i>
                    @endif
                    </div>

                </div>
            @endif
        @endforeach
    </x-page>

    @include('include.footer')

</div>
