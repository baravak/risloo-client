<div class="container mx-auto pt-8 px-4">
    <div class="flex flex-col md:flex-row items-right md:items-center mb-3 cursor-default">
        <span class="w-8 border-t border-gray-200 hidden md:inline-block ml-3"></span>
        <h1 class="font-bold text-2xl text-gray-800">{{$sample->scale->title}}</h1>
        <span class="text-sm text-gray-500 md:mr-2 mt-2 md:mt-0">{{ $sample->edition }}</span>
    </div>
    <div id="content" class="flex flex-col lg:flex-row">
        <div class="lg:flex-1 lg:pl-4 mb-4 lg:mb-0">
            <div class="flex h-1 rounded-full overflow-hidden bg-gray-200 mb-2">
                <div id="progress" class="bg-brand transition-all duration-300 ease-linear" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <div class="border border-gray-300 p-4 mb-40 lg:mb-0 rounded">

                @includeWhen($sample->chain, 'samples.panel.bulk-sampleStatus')
                @includeWhen($sample->prerequisites, 'samples.panel.information')
                @include('samples.panel.description')
                @include('samples.panel.items')
                @include('samples.panel.close')
            </div>
        </div>
        <div class="lg:flex-shrink-0 lg:w-56 hidden lg:block">
            @include('samples.formAside')
        </div>
        <div class="lg:hidden fixed bottom-0 right-0 w-full p-4 bg-white aside-box-shadow">
            @include('samples.formAside-mobile')
        </div>
    </div>
</div>


