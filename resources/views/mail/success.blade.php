@component('mail::message')
<p>Terima kasih <b>{{$data['nama']}}</b>,<br>
  telah melakukan pendaftaran di LPK Aska Bali. Selanjutnya Anda dapat mengakses aplikasi melalui alamat:</p>
  <p>https://askabali.id/login</p>

  @component('mail::table')
  |        |          |
  | ------------- | ------------- |
  | Username      | {{$data['email']}}  |
  | Password |  {{$data['password']}}      |
  @endcomponent
<p></p><br>
<span>
  <small>{{ config('app.name') }}<br>
  Jalan Ngurah Rai, Besang, Semarapura Tengah, Kecamatan Klungkung, Kabupaten Klungkung, Bali.<br>
  Telepon 082123456776 | info@askabali.id
  </small>
</span>
@endcomponent
