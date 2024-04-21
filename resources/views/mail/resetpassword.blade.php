@component('mail::message')
  # Halo @if($data['role'] == 1)
  {{$data['tendik']['nama']}}
  @elseif($data['role'] == 2)
  {{$data['calon']['nama']}}
  @else
  {{$data['dosen']['nama']}}
  @endif
<p>Seseorang telah meminta pembaruan password pada akun SPMB anda. Jika ini Anda, silahkan klik tombol <b>Reset Password</b>. Jika bukan, abaikan email ini.</p>
@component('mail::button', ['url' => $link])
Reset Password
@endcomponent
<br>
Terima kasih,
<br>
<span>
  <small>Universitas Mahasaraswati Denpasar<br>
  Jalan Kamboja 11 A Denpasar<br>
  Telepon (0361) 227019 | info@unmas.ac.id
  </small>
</span>
@endcomponent
