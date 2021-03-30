<div class="relative flex w-full">
    <input data-basePage="{{isset($global->page) ? $global->page : ''}}" data-xhrBase="quick_search" data-lijax="800" data-name="q" data-state="both" id="quick_search" value="{{request()->q}}" type="search" class="flex-1 text-sm border border-gray-200 rounded h-9 pr-2 pl-8 focus" data-remove-query="page" placeholder="{{ __('Search') }}">
    <span class="spinner"></span>
</div>