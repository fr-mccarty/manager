<div>
    <div class="w-full bg-gray-800">
        <x-page>
            <div class="md:px-[4em] px-6">
                <div class="pt-8">
                    <a href="/" class="flex items-center mb-3 text-white">
                        <x-icon.left-arrow/>
                        <span>Home</span>
                    </a>
                </div>

                <div class="pb-[4em] xl:flex items-center md:gap-[10em]">
                    <div class="py-12">
                    @if($app['custom_logo'])
                        <div class="bg-white p-3 rounded-xl w-48 h-48 flex items-center justify-center">
                            <img alt="Logo" class="w-[7em]" src="{{$app['custom_logo']}}" />
                        </div>
                    @else
                        <i class="fas fa-{{$app['font_awesome']}} text-white text-[6em]"></i>
                    @endif
                    </div>

                    <div class="text-white ">
                        <div class="text-[5em] font-bold">
                            {{$app['name']}}
                        </div>
                        <div class="text-[2em]">
                            {{$app['description']}}
                        </div>

                        <x-link.white-button class="mt-8" target="_blank" href="{{$app['public_url']}}">
                            Go To app
                        </x-link.white-button>
                    </div>
                </div>
            </div>



        </x-page>
    </div>

    <x-page>
        <div class="gap-[5em] px-[4em] py-10 ">
            <div class="bg-white py-6 px-6 mt-8">
                <div class="markdown">
                    {!! Str::markdown($app['content'])  !!}
                </div>
            </div>
        </div>
    </x-page>

    @include('include.footer')
</div>
