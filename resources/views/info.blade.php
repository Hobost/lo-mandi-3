@extends('layout.app')
@section('title', '- Info')
@section('styles')
@endsection
@section('content')
<div class="container mt-5">

<div class="bg-dark bg-opacity-10 text-black p-3 container my-3">
        
    <h1>Welcome to Lomba Osu Match at Night di Indonesia! AKA LM3 (Not a real tournament (yet))!</h1>
    <p class="mt-1">Selamat datang di turnamen tahunan terbesar di Indonesia! Yaitu, osu! Lo Mandi Tournament 3 dan yang lebih spesial lagi, tahun ini merupakan iterasi ke-14 nya!</p>
    <p><strong>Format 1v1, Top 16 Qualifier, dengan total hadiah tunai saat ini Rp 500.000,00 (Open for donation also)</strong></p>
    </div>
    <div class="bg-dark bg-opacity-10 text-black p-3 container my-3">
        <h2>INFORMATION (fake buttons except mainsheet)</h2>
        <div class="btn-group" role="group">
            <a href="https://docs.google.com/spreadsheets/d/1zSjTQYN_9qG_bZTnw89k-H3AV_mhZrVJdTP5_Z9crYE/" target="_blank">
                <button type="button" class="btn custom-btn">MAIN SHEET FOR A CONCLUDED TOURNAMENT</button>
            </a>
            <button type="button" class="btn custom-btn">PLAYER PENDAFTARAN</button>
            <button type="button" class="btn custom-btn">RULES</button>
            <button type="button" class="btn custom-btn">STAFF PENDAFTARAN</button>
            <button type="button" class="btn custom-btn">DISCORD</button>
            <button type="button" class="btn custom-btn">YOUTUBE</button>
            <button type="button" class="btn custom-btn">TWITCH</button>
        </div>
        <p class="mt-3">Sama seperti tahun sebelumnya, tidak akan ada batasan jumlah peserta terdaftar di osu! Lo Mandi Tournament 3
                             -- semua pendaftar akan bersama-sama mengikuti fase qualifier. 
                            Pendaftaran akan dibuka selama 2 (dua) minggu melalui Link Pendaftaran diatas. 
                            Pendaftar akan dinyatakan sah jika memenuhi kriteria yang sudah ditentukan, 
                            adapun kriteria yang wajib dipenuhi adalah:</p>
            
        <ul>
            <li>Tertera bendera Indonesia di profile osu!, jika merupakan pemain Indonesia tapi mempunyai bendera lain di 
                profilenya dapat melakukan verifikasi identitas terlebih dahulu melalui host.</li>
            <li>Tidak terdaftar sebagai staff inti osu! Lo Mandi Tournament 3 2024 (Host, Co-Host dan Mappool Selector).</li>
            <li>Tidak mendaftarkan lebih dari 1 akun (multi-account).</li>
            <li>Akun yang didaftarkan aktif selama 1 bulan terakhir</li>
            <li>Bersedia masuk dan aktif dalam discord osu! Lo Mandi Tournament 3  (2024) untuk menerima 
                informasi terkait osu! Lo Mandi Tournament 3 (2024).</li>
            <li>Dinyatakan lolos screening oleh pihak osu!staff.</li>
                
        </ul>
    </div>
    <div class="bg-dark bg-opacity-10 text-black p-3 container my-3">
        <h2>MAPPOOL</h2>
        <ul>
            <li>LM3 akan memiliki komposisi mappool sebagai berikut per masing-masing tahapannya :</li>
            <ul>
                <li>Qualifiers : 11 Map (4 NM | 2 HD | 2 HR | 3 DT)</li>
                <li>Round of 16 : 15 Map (4 NM | 2 HD | 2 HR | 3 DT | 3 FM | 1 TB)</li>
                <li>Quarterfinals, Semifinals, Finals, dan Grandfinals : 20 Map (5 NM | 3 HD | 3 HR | 4 DT | 4 FM | 1 TB)</li>
            </ul>
            <li>Tidak semua map pada map pool bersifat Ranked.</li>
            <li>Pada tahapan Qualifier, map-map yang akan dimainkan beserta urutannya sudah ditetapkan sebelumnya oleh panitia 
                dan tidak dapat diubah. 
                Tidak ada banning map dan warm-up pada tahapan Qualifier.</li>
            <li>Pada tahapan Knock-Out, urutan pemilihan map akan ditentukan berdasarkan hasil 
                !roll yang dilakukan sebelum pertandingan dimulai.</li>
            <li>Proses banning map akan dilangsungkan secara berurutan mulai dari pemain dengan !roll terendah mendapatkan ban pertama, 
                diteruskan dengan pemain dengan !roll tertinggi mendapatkan ban kedua dan ketiga secara langsung dengan 
                diteruskan kembali ban terakhir (keempat) dari pemain !roll terendah.</li>
            <li>Sistem pada pool FreeMod akan mengikuti sistem yang diterapkan pada turnamen LM3, 
                di mana ketika map FreeMod aktif dimainkan para peserta diwajibkan untuk memasang setidaknya 1 mod pada lapangan pertandingan. 
                Berikut merupakan daftar mod-mod yang diperbolehkan untuk map FreeMod:</li>
                <ul>
                    <li>Easy (1.85x Multiplier), HardRock dan Hidden.</li>
                </ul>
            <li>Mod-mod lainnya seperti Relax dan SpunOut tidak diperkenankan untuk dipergunakan pada pool FreeMod. 
                Apabila kamu memang memutuskan untuk memasang mod Easy, 
                pastikan kamu untuk tetap bermain dengan serius ya hehehihihuhuhaha)</li>
                <li>Tie Breaker akan dilangsungkan jika terdapat kedudukan yang imbang dalam suatu pertandingan pada tahapan Knock-Out.</li>
                <li>Map Tie Breaker akan dimainkan dalam keadaan FreeMod aktif, namun 
                    (tidak seperti pada pool FreeMod) peserta yang bertanding tidak diwajibkan untuk memasang mod 
                    pada map Tie Breaker yang bersangkutan.</li>        
        </ul>

    </div>
    <div class="bg-dark bg-opacity-10 text-black p-3 container my-3">
        <h2>RULES</h2>
        <p class="mt-3">osu! Lo Mandi Tournament 3  (2024) akan dilangsungkan dengan dua tahapan utama, yakni Qualifier Stage dan Knock-Out Stage. 
            Berikut penjelasan mengenai tahapan osu! Lo Mandi Tournament 3  (2024).</p>
        <p class="mt-3"><b>Qualifiers:</b></p>
        <ul>
            <li>Tahapan Qualifier akan dilangsungkan di dalam beberapa room multiplayer (Qualifier Lobby) secara paralel.</li>
            <li>Terdapat total 11 map (mod-specific) yang harus dimainkan secara berurutan oleh para peserta.</li>
            <li>Semua rangkaian pertandingan Qualifier akan menggunakan No-Fail.</li>
            <li>Pada Qualifier terdapat 11 map dengan mod-specific 4 No Mod | 2 Hidden | 2 Hard Rock | 3 Double Time.</li>
            <li>Masing-masing peserta hanya diperbolehkan untuk berpartisipasi di dalam salah satu Qualifier Lobby. Peserta yang telah ikut serta pada salah satu Qualifier 
                Lobby tidak diperkenankan untuk kembali bermain ke dalam Qualifier Lobby lainnya dengan alasan apapun.</li>
            <li>Total poin masing-masing peserta dari kesepuluh map akan kemudian diakumulasikan oleh panitia berdasarkan mp link yang tersedia. 
                16 peserta dengan total Z-percentile sum tertinggi akan dinyatakan lolos ke tahapan Knock-Out Stage.</li>
        </ul>
        <p class="mt-3"><b>Knock-Out Stage:</b></p>
        <ul>
            <li>Tahapan Knock-Out meliputi lima fase yakni fase Round of 16, Quarterfinals, Semifinals, Finals dan Grandfinals.</li>
            <li>Tahapan Knock-Out dilangsungkan dengan sistem eliminasi ganda (double elimination) 
                sesuai dengan bracket yang tertera pada Challonge resmi osu! Lo Mandi Tournament 3  (2024).</li>
            <li>Pertandingan pada tiap-tiap fasenya akan dilangsungkan dengan kondisi sebagai berikut:
            </li>
            <ul>
                <li>Qualifiers : 7*</li>
                <li>Round of 16: Best of 9 (6.9*)</li>
                <li>Quarter-Finals: Best of 11 (7.1*)</li>
                <li>Semi-Finals: Best of 11 (7.3*)</li>
                <li>Finals: Best of 13 (7.5*)</li>
                <li>Grand-Final: Best of 13 (7.8*)</li>
            </ul>
            <li>Masing-masing peserta akan memiliki hak untuk melakukan ban satu map dari mappool Round of 16 dan dua map dari mappool Quarterfinals, 
                Semifinals, Finals dan Grandfinals, 
                tidak ada larangan untuk melakukan banning atau picking pada mod yang bersamaan.</li>
            <li>Secara singkat urutan Banning adalah: ABBA</li>
            <li>Bracket reset akan dilangsungkan jika pemenang lower bracket grandfinal '
                memenangkan pertandingan pertama-nya melawan Grandfinalist dari Upper Bracket.</li>
            <li>Tie Break akan berlangsung apabila diperlukan.</li>
        </ul>
        <p class="mt-3">Keseluruhan pertandingan akan dilangsungkan dalam setting Head to Head., ScoreV2 dan keadaan room akan menggunakan NoFail. 
            Waktu untuk tiap-tiap pertandingan akan ditentukan sebelumnya oleh panitia, 
            namun para peserta yang bertanding diperbolehkan untuk melakukan reschedule (baik melalui channel #reschedule yang disediakan oleh panitia pada Discord 
            LM3 ataupun pada media-media lainnya) dengan 
            catatan bahwa panitia harus diinformasikan sebelumnya terkait rencana pergantian jadwal yang telah disepakati.</p>
            <ul>
                <li>Peraturan yang tertera bersifat fleksibel, di mana peraturan dapat berubah sewaktu-waktu baik dengan atau tanpa pemberitahuan 
                    lebih lanjut sebelumnya.</li>
                <li>Peserta yang tidak hadir dalam rentang waktu 10 menit setelah jadwal yang telah ditentukan tanpa pemberitahuan 
                    sebelumnya dapat langsung secara sepihak dinyatakan gugur secara otomatis oleh panitia.</li>
                <li>Peserta yang terputus dari server osu! (disconnected) di tengah suatu map ketika pertandingan sedang berlangsung maka:</li>
                <ul>
                    <li>Dalam kondisi demikian, pertandingan akan dilanjutkan seperti biasa tanpa adanya rematch. Namun, dalam kasus-kasus tertentu 
                        (semisal ketika ada peserta yang ter-disconnect sebelum lagu dimulai), 
                        map tersebut dapat diulang (di-rematch) dengan sesuai dengan keputusan dari panitia dan persetujuan dari 
                        peserta-peserta lainnya yang terlibat.</li>
                </ul>
                <li>Penggunaan program ilegal dan jasa joki pemain (multi-accounting) dalam bentuk apapun sangat dilarang keras.</li>
                <li>Panitia berhak untuk menindaklanjuti segala bentuk pelanggaran dengan berbagai tindakan disipliner (mulai dari teguran halus 
                    hingga pengeluaran/pendiskualifikasian peserta yang bersangkutan dari turnamen) 
                    baik dengan ataupun tanpa peringatan terlebih dahulu sebelumnya.</li>
                <li>Segala keputusan panitia bersifat mutlak dan tidak dapat diganggu gugat tanpa disertai bukti yang jelas untuk menyanggahnya.</li>
            </ul>
    </div>
    <div class="bg-dark bg-opacity-10 text-black p-3 container my-3">
        <h2>SCHEDULE</h2>
        <p>osu! Lo Mandi Tournament 3  (2024) direncanakan untuk berlangsung dengan schedule sebagai berikut:</p>
        <ul class="my-1">
            <li>Periode Registrasi: <b>25 August sampai 08 September 2024</b></li>
            <li>Screening: <b>08 September - 21 September</b></li>
        </ul>
        <p class="my-1">---</p>
        <ul>
            <li>Qualifier: <b>23 September - 29 September</b></li>
            <li>Round of 16: <b>30 September - 06 October</b></li>
            <li>Quarterfinals: <b>07 October - 13 October</b></li>
            <li>Semifinals: <b>14 October - 20 October</b></li>
            <li>Finals: <b>21 October - 27 October</b></li>
            <li>Grandfinals: <b>28 October - 03 November</b></li>
        </ul>
    </div>
    <div class="bg-dark bg-opacity-10 text-black p-3 container my-3">
        <h2>PRIZES</h2>
        <p class="mt-3">Saat ini total hadiah yang berhasil dianggarkan sebesar Rp 500.000,00 dengan initial prizepool Rp 500.000,00 dengan rincian tambahan:</p>
        <ul style="list-style-type: none; padding: 0;">
            <li><span>🥇 1st place:</span> Badge (Pending), Banner Profile, Plakat dan 60% dari total Prizepool dan 100 ribu (Tambah dari donation)</li>
            <li><span>🥈 2nd place:</span> Banner Profile, Plakat dan 30% dari total Prizepool</li>
            <li><span>🥉 3rd place:</span> Banner Profile, Plakat dan 10% dari total Prizepool</li>        
        </ul>
        <p>Kami selalu membuka donasi untuk LM3 Dengan Saweria Temporary atau sponsorship dengan cara dm Discord Chokecomint, semua donasi Rp100.000,00 akan kami list di forum post ini.</p>
        <p>Semua donasi akan masuk kedalam prizepool tanpa terkecuali, Informasi lebih lengkap demi transparansi dapat didapatkan dengan join server Discord resmi LM3.</p>
        
    </div>
    <div class="bg-dark bg-opacity-10 text-black p-3 container my-3">
        <h2>STAFF</h2>
            <p>Host: Ryou Yamada</p>
            <p class="my-3">Co-host: diorytt</p>
    </div>
    <div class="bg-dark bg-opacity-10 text-black p-3 container my-3">
        <p class="centered-text">Semua masalah dan keluhan di turnamen ini dapat dilaporkan ke https://pif.ephemeral.ink/tournament-reports</p>
    </div>

</div>
@endsection