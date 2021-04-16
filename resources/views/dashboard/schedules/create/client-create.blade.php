<input type="hidden" name="clients_type" value="case">
<input type="hidden" name="case_id" value="{{ $case->id }}">
<div class="mt-4">
    <h3 class="block mb-2 text-sm text-gray-700 font-medium">{{ __('Select client') }}</h3>
    @foreach ($case->clients as $client)
        <label class="block group">
            <input type="checkbox" name="client_id[]" @if($case->clients->count() == 1) checked onclick="javascript:return false" @endif value="{{ $client->id }}" class="w-3.5 h-3.5 align-middle border border-gray-500 hover:border-brand rounded-sm focus:ring-1 focus:ring-offset-1">
            <span class="text-sm text-gray-500 mr-1 group-hover:text-blue-600">{{ $client->name }}</span>
        </label>
    @endforeach
</div>
