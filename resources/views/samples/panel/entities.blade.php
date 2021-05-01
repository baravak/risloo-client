<div  data-nav="entity-{{ $entKey }}" data-title="{{ isset($entity->title) ? $entity->title : __('Section') }}" class="hidden">
    @isset($entity->title)
        <h2 class="font-medium text-lg mb-2">{{ $entity->title }}</h2>
    @endisset
    @isset($entity->description)
        @markdown($entity->description)
    @endisset
</div>
