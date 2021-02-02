<template>
    <div class="container">
        <div class="card">
            <div class="card-header d-flex">
                <h4 class="mr-auto"> User Roles </h4>
<!--                <button type="button" class="btn btn-primary"-->
<!--                        data-toggle="modal"-->
<!--                        data-target="#roleModal"-->
<!--                        @click="modalOpen()"-->
<!--                >Assign Roles-->
<!--                </button>-->
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Role</th>
                        <th class="text-right" v-if="permission == 'manage'">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(data,i) in userData" :key="i">
                        <td>{{ data.name }}</td>
                        <td v-if="data.is_admin == 1">Admin</td>
                        <td v-else-if="data.role_id">{{ data.role.title }}</td>
                        <td v-else>-</td>

                        <td class="text-right" v-if="permission == 'manage'">
                            <button class="btn btn-info btn-sm" data-toggle="modal"
                                    data-target="#roleModal" @click="editUser(data.id)"> Edit
                            </button>
                            <button class="btn btn-danger btn-sm" @click="deleteMethod(data.id)"> Delete</button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal fade" id="roleModal" v-if="modal">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Assign Role</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <form class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="role-title">Title</label>
                                    <input name="name" id="role-title" class="form-control" type="text" readonly
                                           v-model="name" placeholder="Enter your role name">
                                </div>
                                <hr>
                                <div class="form-group col-md-12">
                                    <label for="role">role</label>
                                    <select v-model="role_id" id="role" class="custom-select"
                                            name="role"
                                    >
                                        <option value="0">Admin</option>
                                        <option :value="role.id" v-for="role in roles"> {{ role.title }}</option>
                                    </select>


                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" @click="store">Save</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    export default {
        name: "UserList.vue",
        props:['permission'],

        data() {
            return {
                name: '',
                check: [],
                inputFields: {},
                modal: false,
                userData: [],
                roles: [],
                role_id: '',
                isEdit: {
                    status: false,
                    id: '',
                },
            }
        },
        mounted() {
            this.getRole('/role');
            this.getUser('/user');
            console.log('permission',this.permission);
        },
        methods: {
            modalOpen() {
                console.log('reset');
                this.reset();
                this.modal = true;

            },
            modalCloseAction(modalID) {
                let instance = this;
                $(modalID).on('hidden.bs.modal', function (e) {
                    // instance.modal = false;
                    console.log('modal  close');
                });
            },
            store() {
                let instance = this;
                this.inputFields = {
                    role_id: this.role_id,
                };
                if (this.isEdit.status) {
                    console.log('id', this.isEdit.id)
                    axios.put('/user/' + this.isEdit.id, this.inputFields)
                        .then(function (response) {
                            $('#roleModal').modal('hide');
                            instance.getUser('/user');
                            instance.isEdit.status = false;
                            instance.role_id = '';

                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                } else {
                    // axios.post('/role', this.inputFields)
                    //     .then(function (response) {
                    //         $('#roleModal').modal('hide');
                    //         // instance.title = '';
                    //         instance.check = [];
                    //         instance.getUser('/user');
                    //     })
                    //     .catch(function (error) {
                    //         console.log(error);
                    //     });
                }
            },
            getUser(route) {
                let instance = this;
                axios.get(route)
                    .then(function (response) {
                        // handle success
                        // console.log('getUser', response)
                        instance.userData = response.data;
                    })
                    .catch(function (error) {
                        // handle error
                        console.log(error);
                    })
            },
            getRole(route) {
                let instance = this;
                axios.get(route)
                    .then(function (response) {
                        // handle success
                        instance.roles = response.data;
                    })
                    .catch(function (error) {
                        // handle error
                        console.log(error);
                    })
            },
            editUser(id) {
                let instance = this;
                instance.isEdit.status = true;
                instance.isEdit.id = id;
                console.log('id', id)
                axios.get('/user/' + id + '/edit')
                    .then(function (response) {
                        console.log('response', response.data)
                        instance.name = response.data.name;
                        instance.role_id = response.data.role_id;
                        instance.modal = true;
                    })
                    .catch(function (error) {
                        // handle error
                        console.log(error);
                    })
            },
            deleteMethod(id) {
                let instance = this;
                axios.delete('/role/' + id)
                    .then(function (response) {
                        console.log('response', response)
                        instance.getUser('/role');
                    })
                    .catch(function (error) {
                        // handle error
                        console.log(error);
                    })

            },
            reset() {
                this.title = '';
                this.check = [];
            }
        }
    }
</script>

<style scoped>

</style>

