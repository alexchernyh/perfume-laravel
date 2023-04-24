@component('mail::message')
<h3>В партнерской программе зарегистрирован новый пользователь:<h3>

@component('mail::panel')

    {{ $partner->last_name }} {{ $partner->first_name }} {{ $partner->mid_name }}
    <br>
    ID: {{ $partner->id }}
    <br>
    Email: {{ $partner->email }}
    <br>
    Телефон: {{ $partner->phone }}
    <br>
    Город: {{ $partner->city }}
    <br>
    Пользователь приглашен партнером {{ $subPartner->last_name }} {{ $subPartner->first_name }} {{ $subPartner->mid_name }} (ID: {{ $subPartner->id }})

@endcomponent

@endcomponent

