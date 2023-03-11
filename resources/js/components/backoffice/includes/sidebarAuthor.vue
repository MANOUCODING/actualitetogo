<template>
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar" style="color: #fff">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
            <div class="sidebar-brand-icon">
                <img src='/assets/admin/img/blanc.png' style="width: 150px" alt="empty" >
            </div>
            
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="index.html">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Tableau de bord</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Actions principales
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>Mes articles</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header"></h6>
                    <a class="collapse-item" href="buttons.html">Tous les articles</a>
                    <a class="collapse-item" href="cards.html">Les articles publiés</a>
                    <a class="collapse-item" href="cards.html">Les brouillons</a>
                    <a class="collapse-item" href="cards.html">Ajouter un article</a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <router-link class="nav-link" style="cursor: pointer;" to="/admin/category">
                <i class="fas fa-fw fa-folder"></i>
                <span>Les catégories</span>
            </router-link>
            
        </li>

        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fas fa-fw fa-wrench"></i>
                <span>Les tags ou étiquettes</span>
            </a>
            
        </li>

        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fas fa-fw fa-wrench"></i>
                <span>Les auteurs</span>
            </a>
            
        </li>

        <!-- Nav Item - Charts -->
        <li class="nav-item">
            <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Les fichiers</span></a>
        </li>

    </ul>
    <!-- End of Sidebar -->
</template>

<script>

</script>