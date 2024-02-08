<script setup>
import { computed } from 'vue'
import { usePage } from '@inertiajs/vue3'

const page = usePage()
const user = computed(() => page.props.auth.user)
</script>

<template>
    <header class="topbar">
        <nav class="navbar top-navbar navbar-expand-md navbar-light">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.html">
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
                                            <p class="text-muted">{{ user.email }}</p><a href="pages-profile.html" class="btn btn-rounded btn-danger btn-sm">View Profile</a></div>
                                    </div>
                                </li>
                                <li role="separator" class="divider"></li>
                                <li><a href="user/logout"><i class="fa fa-power-off"></i> Logout</a></li>
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
                    <li> <a class="waves-effect waves-dark" href="home" aria-expanded="false"><i class="mdi mdi-home"></i><span class="hide-menu">Dashboard </span></a></li>
                    <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-database"></i><span class="hide-menu">Master Data </span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="movement">Movement List</a></li>
                            <li><a href="client">Client List</a></li>
                        </ul>
                    </li>
                    <li class="nav-devider"></li>
                    <li class="nav-small-cap">Superadmin Access Only</li>
                    <li> <a class="waves-effect waves-dark" href="/" aria-expanded="false"><i class="mdi mdi-account"></i><span class="hide-menu">Users </span></a></li>
                </ul>
            </nav>
        </div>
    </aside>
</template>

<style>
</style>