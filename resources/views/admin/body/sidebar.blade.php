<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="index.html" class="waves-effect">
                        <i class="ri-dashboard-line"></i><span class="badge rounded-pill bg-success float-end">3</span>
                        <span>Gestion</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-layout-3-line"></i>
                        <span>Pages</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li>
                            <a href="javascript: void(0);" class="has-arrow">Utilisateurs</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="{{route('admin.gestion.utilisateurs')}}">Gestion</a></li>

                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow">Partenaires</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="{{route('admin.gestion.partenaires')}}">Gestion</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow">Tables de concertation</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="{{route('admin.gestion.tables_concertation')}}">Gestion</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow">Direction</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="{{route('admin.gestion.directions')}}">Gestion</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
