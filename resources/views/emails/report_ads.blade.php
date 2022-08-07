@component('mail::message')
    # Your Nex Ad

    Your Nex Ad Notification!

    {{--    use url not rout because rout doesn't  exist--}}
    @component('mail::button', ['url' => '/my-ads'])
        check your adds
    @endcomponent

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
