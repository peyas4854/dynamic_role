<template>
    <div class="container">
        <div class="card">

            <div class="card-body">
                <ul class="nav flex-column">
                    <li class="nav-item" v-if="dhaka == 'manage' || dhaka=='read-only'">
                        <a class="nav-link" href="#">Dhaka</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Chittagong</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Sylhet</a>
                    </li>
                    <li class="nav-item" >
                        <a class="nav-link" href="/settings">Settings</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Sidebar.vue",
        props:['dhaka','route'],
        created() {
            console.log('dhaka',this.dhaka);
            console.log('route',this.route);
        }
    }
</script>

<style scoped>

</style>
