
@component('mail::message')
    # Your order was shipped

    Some details about the order...

    @component('mail::button',['url'=>'link'])
        More Details
    @endcomponent

    Thanks <br>

    Laravel
@endcomponent
