<div>
    <strong>{{__('emails.weddingRegistrationForm.name')}}</strong>:
    {{$weddingRegistration->firstname}} {{$weddingRegistration->lastname}}
    <br/>
    <strong>{{__('emails.weddingRegistrationForm.escort')}}</strong>:

    @if ($weddingRegistration->escorts)
        {{$weddingRegistration->escorts}}
    @else
        -
    @endif

    <br/>
    <strong>{{__('emails.weddingRegistrationForm.children')}}</strong>:
    @if ($weddingRegistration->children)
        {{$weddingRegistration->children}}
    @else
        -
    @endif

    <br/>
    <strong>{{__('emails.weddingRegistrationForm.attending')}}</strong>:
    @if ($weddingRegistration->isAttending)
        {{__('emails.weddingRegistrationForm.yes')}}
    @else
        {{__('emails.weddingRegistrationForm.no')}}
    @endif
    <br/>
    <strong>{{__('emails.weddingRegistrationForm.transport')}}</strong>: {{$weddingRegistration->transport}}
</div>
