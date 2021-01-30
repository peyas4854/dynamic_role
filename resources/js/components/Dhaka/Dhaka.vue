<template>
    <div>
        <div class="card" v-if="permission == 'read_only' || permission == 'manage'">
            <div class="card-body">
                <h4> Only dhaka can see </h4>
            </div>
        </div>
        <div class="card" v-if="permission == 'manage'">
            <div class="card-body">
                <h4> Only dhaka can manage </h4>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        name: "Dhaka.vue",
        props:['permission'],
        created() {
            console.log('daka',this.permission)
        }
    }
</script>

<style scoped>

</style>
