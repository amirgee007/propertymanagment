{{--flash('Message')->success(): Set the flash theme to "success".--}}
{{--flash('Message')->error(): Set the flash theme to "danger".--}}
{{--flash('Message')->warning(): Set the flash theme to "warning".--}}
{{--flash('Message')->overlay(): Render the message as an overlay.--}}
{{--flash()->overlay('Modal Message', 'Modal Title'): Display a modal overlay with a title.--}}
{{--flash('Message')->important(): Add a close button to the flash message.--}}
{{--flash('Message')->error()->important(): Render a "danger" flash message that must be dismissed.--}}



@foreach (session('flash_notification', collect())->toArray() as $message)
    @if ($message['overlay'])
        @include('flash::modal', [
            'modalClass' => 'flash-modal',
            'title'      => $message['title'],
            'body'       => $message['message']
        ])
    @else
        <div class="alert
                    alert-{{ $message['level'] }}
                    {{ $message['important'] ? 'alert-important' : '' }}"
                    role="alert"
        >
            @if ($message['important'])
                <button type="button"
                        class="close"
                        data-dismiss="alert"
                        aria-hidden="true"
                >&times;</button>
            @endif

            {!! $message['message'] !!}
        </div>
    @endif
@endforeach

{{ session()->forget('flash_notification') }}
