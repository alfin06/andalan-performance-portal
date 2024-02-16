<script setup>
import { computed } from 'vue'
import { usePage } from '@inertiajs/vue3'

const page = usePage()
const user = computed(() => page.props.auth.user)

const props = defineProps({
    
})
</script>

<template>
    <header class="topbar">
        <nav class="navbar top-navbar navbar-expand-md navbar-light">
            <div class="navbar-header">
                <a class="navbar-brand" :href="route('home')">
                    <b>
                        <img src="/images/andalan-navlogo.png" alt="homepage" class="dark-logo" style="width:30%;height:auto;" />
                        <img src="" alt="homepage" class="light-logo"  />
                    </b>
                    <!-- <span>
                        <img src="/images/andalan-logo.png" alt="homepage" class="dark-logo" style="width:100%;height:auto;background-color:black;" />
                        <img src="/images/andalan-navlogo.png" class="light-logo" alt="homepage" style="width:30%;height:auto;" />
                    </span> -->
                </a>
            </div>
            <div class="navbar-collapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                    <li class="nav-item"> <a class="nav-link sidebartoggler hidden-sm-down waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                </ul>
                <ul class="navbar-nav my-lg-0">
                    <li class="nav-item hidden-xs-down search-box"> <a class="nav-link hidden-sm-down waves-effect waves-dark" href="javascript:void(0)"><i class="ti-search"></i></a>
                        <form class="app-search">
                            <input type="text" class="form-control" placeholder="Search & enter"> <a class="srh-btn"><i class="ti-close"></i></a> </form>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="/assets/images/users/user.png" alt="user" class="profile-pic" /></a>
                        <div class="dropdown-menu dropdown-menu-right animated flipInY">
                            <ul class="dropdown-user">
                                <li>
                                    <div class="dw-user-box">
                                        <div class="u-img"><img src="/assets/images/users/user.png" alt="user"></div>
                                        <div class="u-text">
                                            <h4>{{ user.name }}</h4>
                                            <p class="text-muted">{{ user.email }}</p>
                                            <a :href="route('profile')" class="btn btn-rounded btn-danger btn-sm mt-2">View Profile</a>
                                        </div>
                                    </div>
                                </li>
                                <li role="separator" class="divider"></li>
                                <li>
                                    <a :href="route('logout')"><i class="fa fa-power-off"></i> Logout</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <aside class="left-sidebar">
        <div class="scroll-sidebar">
            <nav class="sidebar-nav">
                <ul id="sidebarnav">
                    <li> <a class="waves-effect waves-dark" :href="route('home')" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Dashboard </span></a></li>
                    <li> <a class="waves-effect waves-dark" :href="route('movement.index')" aria-expanded="false"><i class="mdi mdi-fire"></i><span class="hide-menu">Movement </span></a></li>
                    <li> <a class="waves-effect waves-dark" :href="route('client.index')" aria-expanded="false"><i class="mdi mdi-account-multiple"></i><span class="hide-menu">Client </span></a></li>
  <li class="nav-devider" v-if="user.role === 'SUPERADMIN'"></li>
                    <li class="nav-small-cap"  v-if="user.role === 'SUPERADMIN'">Superadmin Access Only</li>
                    <li><a class="waves-effect waves-dark" :href="route('users.index')" aria-expanded="false" v-if="user.role === 'SUPERADMIN'"><i class="mdi mdi-account"></i><span class="hide-menu">Users </span></a></li>
                </ul>
            </nav>
        </div>
    </aside>
    <slot></slot>
</template>

<style>
</style>