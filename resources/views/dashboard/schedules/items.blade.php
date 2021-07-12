@php
    $statusColors = [
        'draft' =>[
            'status' =>  'gray',
            'bg' => 'gray-50',
            'border' => 'gray-400'
        ],
        'registration_awaiting' =>[
            'status' =>  'yellow-600',
            'bg' => 'yellow-50',
            'border' => 'yellow-600'
        ],
        'client_awaiting' =>[
            'status' =>  'yellow-600',
            'bg' => 'yellow-50',
            'border' => 'yellow-600'
        ],
        'awaiting' =>[
            'status' =>  'yellow-600',
            'bg' => 'yellow-50',
            'border' => 'yellow-600'
        ],
        'session_awaiting' =>[
            'status' =>  'brand',
            'bg' => 'blue-50',
            'border' => 'blue-600'
        ],
        'in_session' =>[
            'status' =>  'green-500',
            'bg' => 'gray-50',
            'border' => 'gray-400'
        ],
        'finished' =>[
            'status' =>  'purple-500',
            'bg' => 'gray-50',
            'border' => 'gray-400'
        ],
        'canceled_by_client' =>[
            'status' =>  'red-500',
            'bg' => 'gray-50',
            'border' => 'gray-400'
        ],
        'canceled_by_center' =>[
            'status' =>  'red-500',
            'bg' => 'gray-50',
            'border' => 'gray-400'
        ],
    ];
@endphp

<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5 gap-4 p-4">
    @foreach ($schedules->where('started_at', '>=', $day)->where('started_at', '<=', (clone $day)->endOfDay()) as $schedule)
        @include('dashboard.schedules.item')
    @endforeach
</div>
