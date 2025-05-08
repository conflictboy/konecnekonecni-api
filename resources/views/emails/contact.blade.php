<div>
    {{__('emails.contactForm.name')}}: {{$contact->firstname}} {{$contact->lastname}}<br />
    {{__('emails.contactForm.email')}}: <a href="mailto:{{$contact->email}}">{{$contact->email}}</a><br />
    {{__('emails.contactForm.text')}}: {{$contact->text}}
</div>
