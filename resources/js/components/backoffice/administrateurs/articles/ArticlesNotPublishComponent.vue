<template>
    <!-- Page Wrapper -->
    <div id="wrapper">
        <sidebar></sidebar>
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content" >
                <topbar></topbar>
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Les brouillons</h1>
                        <a href="/articles/create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i>Ajouter un article</a>
                    </div>
                </div>
            </div>
            <footerbar></footerbar>
        </div>
    </div>
</template>
