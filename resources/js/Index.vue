<template>
    <div>
        <nav class="navbar bg-white border-bottom navbar-light"></nav>
        <router-link class="navbar-brand  mr-auto" :to="{ name: 'home' }"
            >LaravelBnb</router-link
        >
        <router-link class="btn nav-button" :to="{ name: 'second' }"
            >Second</router-link
        >
        <div class="container mt-4 mb-4 pr-4 pl-4">
            <router-view></router-view>
        </div>
    </div>
</template>
