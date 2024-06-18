<x-page>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    <h1 class="text-2xl font-medium text-gray-900">
                        {{env('APP_NAME')}}
                    </h1>
                </div>

                <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8">

                    <div>
                        <div class="">
                            <h2 class="text-xl font-semibold text-gray-900">
                                <a href="/apps">
                                    Apps: {{count(config('constants.apps'))}}
                                </a>
                            </h2>
                            <div class="text-gray-500">
                                Number of Active Apps
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</x-page>
