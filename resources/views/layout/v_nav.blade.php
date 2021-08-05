<ul class="sidebar-menu" data-widget="tree">
    <li class="header">MAIN NAVIGATION</li>
    <li class="{{ request()->is('/') ? 'active' : ''}}"><a href="/"><i class="fa fa-home"></i> <span>Home</span></a></li>
    @if(auth()->user()->level==1)
        <li class="{{ request()->is('dokter') ? 'active' : ''}}"><a href="/dokter"><i class="fa fa-fw fa-plus-square"></i> <span>Dokter</span></a></li>
    @elseif(auth()->user()->level==2)
        <li class="{{ request()->is('pasien') ? 'active' : ''}}"><a href="/pasien"><i class="fa fa-fw fa-wheelchair"></i> <span>Pasien</span></a></li>
        <li class="{{ request()->is('rekammedis') ? 'active' : ''}}"><a href="/rekammedis"><i class="fa fa-fw fa-plus-square"></i> <span>Rekam Medis</span></a></li>
    @endif
    

    
</ul>