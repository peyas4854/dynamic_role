<template>
    <div class="container">
        <div class="card">

            <div class="card-body">
                <ul class="nav flex-column">
                    <li class="nav-item" >
                        <a class="nav-link" :class="[route == '/home' ? 'active' : '', 'nav-link' ]" v-if="dashboard=='read-only'" href="/home">Dahsboard</a>
                    </li>
                    <li class="nav-item" v-if="dhaka == 'manage' || dhaka=='read-only'">
                        <a :class="[route == '/dhaka' ? 'active' : '', 'nav-link' ]" href="/dhaka">Dhaka</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Chittagong</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Sylhet</a>
                    </li>
                    <li class="nav-item" v-if="user_list == 'manage' || user_list == 'read_only'">
                        <a
                           :class="[route == '/user-list' ? 'active' : '', 'nav-link' ]"
                           href="/user-list">User List</a>
                    </li>
                    <li class="nav-item " >
                        <a
                            v-if="settings == 'manage' || settings == 'read_only'"
                           :class="[route == '/settings' ? 'active' : '', 'nav-link' ]"

                           href="/settings">Settings</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Sidebar.vue",
        props:['dhaka','route','user_list','dashboard','settings'],
        mounted(){
            console.log( 'user_list',this.user_list);
        }

    }
</script>

<style scoped lang="scss">
    a.nav-link.active {
        color: #1a1919;
        background-color: #45d3d5;
    }

</style>
