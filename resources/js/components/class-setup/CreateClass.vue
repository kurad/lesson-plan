<template>

    <div class="row">
        <div class="col-12 mb-2 text-end">
            <router-link :to='{name:"create"}' class="btn btn-primary">Create</router-link>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>List of Classes</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="item in departments" :key="item.id">
                                    <td>{{ item.id }}</td>
                                    <td>{{ item.name }}</td>
                                    <td>
                                        <router-link :to='{name:"edit",params:{id:item.id}}' class="btn btn-success">
                                            Edit</router-link>
                                        <button type="button" @click="deleteDepartment(item.id)"
                                            class="btn btn-danger">Delete</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: "departments",
    data() {
        return {
            departments: []
        }
    },
    mounted() {
        this.getDepartments()
    },
    methods: {
        async getDepartments() {
            await axios.get('/api/v1/departments').then(response => {
                this.departments = response.data
            }).catch(error => {
                console.log(error)
                this.departments = []
            })
        },
        deleteDepartment(id) {
            if (confirm("Are you sure to delete this department ?")) {
                axios.delete(`/api/v1/departments/${id}`).then(response => {
                    this.getDepartments()
                }).catch(error => {
                    console.log(error)
                })
            }
        }
    }
}
</script>