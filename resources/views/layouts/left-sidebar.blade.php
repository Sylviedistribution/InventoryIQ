<div class="left-side-bar">
    <div class="brand-logo">
        <a href="">
            <img src="vendors/images/deskapp-logo.svg" alt="" class="dark-logo">
            <img src="vendors/images/deskapp-logo-white.svg" alt="" class="light-logo">
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">
                <li class="dropdown">
                    <a href="{{route("index")}}" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-house-1"></span><span class="mtext">Home</span>
                    </a>
                </li>

                <!--<li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-user"></span><span class="mtext">Utilisateurs</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{route("user.list")}}">Lister les utilisateurs</a></li>
                        <li><a href="{{route("user.create")}}">Créer un utilisateur</a></li>
                    </ul>
                </li>-->

                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-user-2"></span><span class="mtext">Fournisseur</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{route("fournisseur.list")}}">Lister les fournisseurs</a></li>
                        <li><a href="{{route("fournisseur.create")}}">Ajouter un fournisseur</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-groceries-store"></span><span class="mtext">Produit</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{route("produit.list")}}">Lister les produits</a></li>
                        <li><a href="{{route("produit.create")}}">Ajouter un produit</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-up-arrow-11"></span><span class="mtext">Approvisionnement</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{route("appro.list")}}">Lister les approvisonnements</a></li>
                        <li><a href="{{route("appro.create")}}">Faire un approvionnement</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-money"></span><span class="mtext">Vente</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{route("vente.list")}}">Historique des ventes</a></li>
                        <li><a href="{{route("vente.create")}}">Effectuer une vente</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
