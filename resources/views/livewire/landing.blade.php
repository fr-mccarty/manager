<div>
    <div class="md:px-[10em] px-6 py-[4em] md:gap-[10em] bg-gray-800 w-full md:flex items-center">
        <i class="fas fa-book-bible text-white text-[10em]"></i>

        <div class="text-white ">
            <div class="text-[5em] font-bold">
                Catholic Resources
            </div>
            <div class="text-[2em]">
                Useful Tech for Church people and Small Businesses
            </div>
            <div class="mt-10">
                <x-link.white-button target="_blank" href="http://lolekproductions.org">
                    Lolek Productions
                </x-link.white-button>
            </div>
        </div>
    </div>

    <x-page>


        @foreach($apps as $index => $app)
            <div class="{{ $index % 2 != 0 ? 'flex-row-reverse' : '' }} gap-[5em] md:flex justify-between px-[4em] py-[4em]  items-center">
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
                @if($app->custom_logo)
                    <img alt="Logo" class="w-[7em]" src="{{$app->custom_logo}}" />
                @else
                    <i class="fas fa-{{$app->font_awesome}} text-[6em] py-12"></i>
                @endif
            </div>
        @endforeach
    </x-page>

    @include('include.footer')

</div>
