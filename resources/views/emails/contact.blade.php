<div>
    <strong>{{__('emails.contactForm.name')}}</strong>: {{$contact->firstname}} {{$contact->lastname}}<br />
    <strong>{{__('emails.contactForm.email')}}</strong>: <a href="mailto:{{$contact->email}}">{{$contact->email}}</a><br />
    <strong>{{__('emails.contactForm.text')}}</strong>: {!! nl2br($contact->text) !!}
</div>
