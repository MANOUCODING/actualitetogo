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
            <router-link class="nav-link" style="cursor: pointer;" to="/admin/category">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Tableau de bord</span></router-link>
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
                    <router-link class="nav-link" style="cursor: pointer;" to="/admin/articles">Tous les articles</router-link>
                    <router-link class="nav-link" style="cursor: pointer;" to="/admin/articles/publish">Les articles publiés</router-link>
                    <router-link class="nav-link" style="cursor: pointer;" to="/admin/articles/not/publish">Les brouillons</router-link>
                    <router-link class="nav-link" style="cursor: pointer;" to="/admin/articles/create">Ajouter un article</router-link>
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
            <router-link class="nav-link" style="cursor: pointer;" to="/admin/tags">
                <i class="fas fa-fw fa-wrench"></i>
                <span>Les tags ou étiquettes</span>
            </router-link>
            
        </li>

        <li class="nav-item">
            <router-link class="nav-link" style="cursor: pointer;" to="/admin/authors">
                <i class="fas fa-fw fa-wrench"></i>
                <span>Les auteurs</span>
            </router-link>
            
        </li>

        <!-- Nav Item - Charts -->
        <li class="nav-item">
            <router-link class="nav-link" style="cursor: pointer;" to="/admin/files">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Les fichiers</span></router-link>
        </li>

        <li class="nav-item">
            <router-link class="nav-link" style="cursor: pointer;" to="/admin/messages">
            <i class="fas fa-envelope fa-fw"></i>
            <span>Messages</span></router-link>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
        configuration
        </div>

          <!-- Nav Item - Charts -->
        <li class="nav-item">
            <router-link class="nav-link" style="cursor: pointer;" to="/admin/users">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Les utilisateurs</span></router-link>
        </li>

        <li class="nav-item">
            <router-link class="nav-link" style="cursor: pointer;" to="/admin/newsletters">
            <i class="fas fa-envelope fa-fw"></i>
            <span>Newsletters</span></router-link>
        </li>

    </ul>
    <!-- End of Sidebar -->
</template>

<script>

</script>