<template>
    <div class="container">

        <div class="card">


            <div class="card-header d-flex">
                <h4 class="mr-auto"> Roles </h4>
                <button type="button" class="btn btn-primary"
                        data-toggle="modal"
                        data-target="#roleModal"
                        @click="modalOpen()"
                >Add
                </button>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Created By</th>
                        <th class="text-right">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(data,i) in roleData" :key="i">
                        <td>{{ data.title }}</td>
                        <td>{{ data.user.name }}</td>

                        <td class="text-right">
                            <button class="btn btn-info btn-sm" data-toggle="modal"
                                    data-target="#roleModal" @click="editRoles(data.id)"> Edit
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
                            <h4 class="modal-title">Modal Heading</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <form class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="role-title">Title</label>
                                    <input name="title" id="role-title" class="form-control" type="text"
                                           v-model="title" placeholder="Enter your role title">
                                </div>
                                <hr>
                                <div class="form-group col-md-12">
                                    <h6 class="m-0">Dashboard</h6>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="dashboard-role-1"
                                               v-model="check"
                                               value="can_see_dashboard"
                                               name="can_see_dashboard"/>
                                        <label class="custom-control-label" for="dashboard-role-1">can see dashboard</label>

                                    </div>


                                </div>
                                <div class="form-group col-md-12">
                                    <h6 class="m-0">Settings</h6>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="setting-role-1"
                                               v-model="check"
                                               value="can_edit_setting"
                                               name="can_edit_setting"/>
                                        <label class="custom-control-label" for="setting-role-1">can edit setting</label>

                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="email-role-2"
                                               v-model="check"
                                               value="can_see_setting" name="can_see_setting"/>
                                        <label class="custom-control-label"
                                               for="email-role-2">can see setting</label> <br>
                                    </div>

                                </div>
                                <div class="form-group col-md-12">
                                    <h6 class="m-0">User List</h6>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="user-list-1"
                                               v-model="check"
                                               value="can_edit_user_list"
                                               name="can_edit_user_list"/>
                                        <label class="custom-control-label" for="user-list-1">can edit user list</label>

                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="user-list-2"
                                               v-model="check"
                                               value="can_see_user_list" name="can_see_user_list"/>
                                        <label class="custom-control-label"
                                               for="user-list-2">can_see_user_list</label> <br>
                                    </div>

                                </div>
                                <div class="form-group col-md-12">
                                    <h6 class="m-0">Dhaka</h6>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="dhaka-1" v-model="check"
                                               value="can_see_dhaka" name="can_see_dhaka"/>
                                        <label class="custom-control-label" for="dhaka-1">can_see_dhaka</label> <br>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="dhaka-2" v-model="check"
                                               value="can_manage_dhaka" name="can_manage_dhaka"/>
                                        <label class="custom-control-label" for="dhaka-2">can_manage_dhaka</label> <br>
                                    </div>

                                </div>
                                <div class="form-group col-md-12">
                                    <h6 class="m-0">Chittagong</h6>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="chittagong-1"
                                               v-model="check"
                                               value="can_see_chittagong" name="can_see_chittagong"/>
                                        <label class="custom-control-label"
                                               for="chittagong-1">can_see_chittagong</label> <br>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="chittagong-2"
                                               v-model="check"
                                               value="can_manage_chittagong" name="can_manage_chittagong"/>
                                        <label class="custom-control-label"
                                               for="chittagong-2">can_manage_chittagong</label> <br>
                                    </div>

                                </div>
                                <div class="form-group col-md-12">
                                    <h6 class="m-0">Sylhet</h6>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="sylhet-1"
                                               v-model="check"
                                               value="can_see_sylhet" name="can_see_sylhet"/>
                                        <label class="custom-control-label" for="sylhet-1">can_see_chittagong</label>
                                        <br>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="sylhet-2"
                                               v-model="check"
                                               value="can_manage_sylhet" name="can_manage_sylhet"/>
                                        <label class="custom-control-label" for="sylhet-2">can_manage_sylhet</label>
                                        <br>
                                    </div>

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
        name: "Setting.vue",

        data() {
            return {
                title: '',
                check: [],
                inputFields: {},
                modal: false,
                roleData: [],
                isEdit: {
                    status: false,
                    id: '',
                },
            }
        },
        mounted() {
            this.modalCloseAction('#roleModal');
            this.getRoles('/role');
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
                    title: this.title,
                    permissions: this.check,
                };
                if (this.isEdit.status) {
                    console.log('id', this.isEdit.id)
                    axios.put('/role/' + this.isEdit.id, this.inputFields)
                        .then(function (response) {
                            $('#roleModal').modal('hide');
                            instance.title = '';
                            instance.check = [];
                            instance.isEdit.status = false;
                            instance.getRoles('/role');
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                } else {
                    axios.post('/role', this.inputFields)
                        .then(function (response) {
                            $('#roleModal').modal('hide');
                            instance.title = '';
                            instance.check = [];
                            instance.getRoles('/role');
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                }

            },
            getRoles(route) {
                let instance = this;
                axios.get(route)
                    .then(function (response) {
                        // handle success
                        instance.roleData = response.data;
                    })
                    .catch(function (error) {
                        // handle error
                        console.log(error);
                    })
            },
            editRoles(id) {
                let instance = this;
                instance.isEdit.status = true;
                instance.isEdit.id = id;
                console.log('id', id)
                axios.get('/role/' + id + '/edit')
                    .then(function (response) {
                        console.log('response', response)
                        instance.title = response.data.title;
                        instance.check = response.data.permissions;
                        instance.modal = true;
                    })
                    .catch(function (error) {
                        // handle error
                        console.log(error);
                    })
            },
            deleteMethod(id){
                let instance = this;
                axios.delete('/role/' + id)
                    .then(function (response) {
                        console.log('response', response)
                        instance.getRoles('/role');
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
