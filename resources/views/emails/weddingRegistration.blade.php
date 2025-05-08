<div>
    {{__('emails.weddingRegistrationForm.name')}}: {{$weddingRegistration->firstname}} {{$weddingRegistration->lastname}}
    <br/>
    {{__('emails.weddingRegistrationForm.escort')}}:

    @if ($weddingRegistration->escorts)
        {{$weddingRegistration->escorts}}
    @else
        -
    @endif

    <br/>
    {{__('emails.weddingRegistrationForm.children')}}:
    @if ($weddingRegistration->children)
        {{$weddingRegistration->children}}
    @else
        -
    @endif

    <br/>
    {{__('emails.weddingRegistrationForm.attending')}}:
    @if ($weddingRegistration->isAttending)
        {{__('emails.weddingRegistrationForm.yes')}}
    @else
        {{__('emails.weddingRegistrationForm.no')}}
    @endif
    <br/>
    {{__('emails.weddingRegistrationForm.transport')}}: {{$weddingRegistration->transport}}
</div>
