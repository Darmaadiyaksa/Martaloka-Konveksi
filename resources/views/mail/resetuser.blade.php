@component('mail::message')
<p>Halo <b>{{$data['nama']}}</b>,<br>
  Kami melakukan pembaruan data SPMB sehingga memerlukan perubahan terhadap hak akses Anda. Selanjutnya Anda dapat mengakses aplikasi SPMB melalui alamat: https://spmb.unmas.ac.id/login dengan password yang baru:</p>

  @component('mail::table')
  |        |          |
  | ------------- | ------------- |
  | Username      | {{$data['email']}}  |
  | Password |  {{$data['password']}}      |
  @endcomponent
<p>Anda dapat mengubah password setelah berhasil login ke aplikasi, terima kasih.</p><br>
<span>
  <small>{{ config('app.name') }}<br>
  Jalan Kamboja 11 A Denpasar<br>
  Telepon (0361) 227019 | info@unmas.ac.id
  </small>
</span>
@endcomponent
