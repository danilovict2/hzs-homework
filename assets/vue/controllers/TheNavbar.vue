<template>
    <nav class="navbar fixed-top navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div>
                    <img src="/img/students.jpg" class="profile-picture">
                </div>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Početna stranica</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Profesionalna orijentacija</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Rang lista</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Pretraga..." aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Pretraži</button>
                </form>
                <div class="login-signup-btns">
                    <button type="button" class="btn btn-outline-secondary">Prijavi se</button>
                    <button type="button" class="btn btn-success">Registruj se</button>
                </div>
            </div>
        </div>
    </nav>
</template>

<script setup></script>