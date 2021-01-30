<template>

    <div class="container">
        <div class="row" v-if="permission">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h4> Dhaka</h4>
                        <p> Todays Count </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h4> Chittagong</h4>
                        <p> Todays Count </p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">

                    <div class="card-body">
                        <h4> Sylhet </h4>
                        <p> Todays Count </p>
                    </div>
                </div>

            </div>
        </div>
        <div class="row" v-else>


            <h4> You have No permission for content</h4>


        </div>
    </div>


</template>

<script>
    export default {
        props: ['permission'],
        created() {
            console.log('Component mounted', this.permission)
        }
    }
</script>
