<template>
    <nav class="navbar navbar-dark navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
        <div class="container-fluid">
            <router-link to="/" class="navbar-brand">Oliveira Trust</router-link>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <router-link to="/" class="nav-link" aria-current="page" href="#">Suas Cotações</router-link>
                </li>

                <li class="nav-item">
                    <router-link to="/store" class="nav-link" aria-current="page" href="#">Nova Cotação</router-link>
                </li>
            </ul>
            </div>
        </div>
    </nav>
</template>