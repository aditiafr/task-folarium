<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="page" href="{{ route('pegawai') }}">Pegawai</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Request::is('kontrak') ? 'active' : '' }}" aria-current="page" href="{{ route('kontrak') }}">Kontrak</a>
    </li>
    {{-- <li class="nav-item">
        <a class="nav-link {{ Request::is('pinjam') ? 'active' : '' }}" aria-current="page" href="{{ route('pinjam') }}">Pinjam</a>
    </li> --}}
</ul>
