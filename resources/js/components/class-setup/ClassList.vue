<template>

    <div class="row">
        <div class="col-12 mb-2 text-end">
            <router-link :to='{name:"class.create"}' class="btn btn-primary">Create</router-link>
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
                                    <th>Class Size</th>
                                    <th>Students with SEN</th>
                                    <th>Class Location</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="item in classes" :key="item.id">
                                    <td>{{ item.id }}</td>
                                    <td>{{ item.name }}</td>
                                    <td>{{ item.size }}</td>
                                    <td>{{ item.learner_with_SEN }}</td>
                                    <td>{{ item.location }}</td>
                                    <td>
                                        <router-link :to='{name:"class.edit",params:{id:item.id}}'
                                            class="btn btn-success btn-xs">
                                            <i class="fas fa-pencil-alt"></i>
                                        </router-link>
                                        <button type="button" @click="deleteClass(item.id)"
                                            class="btn btn-danger btn-xs"><i class="fas fa-trash-alt"></i></button>
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
    name: "classes",
    data() {
        return {
            classes: []
        }
    },
    mounted() {
        this.getClasses()
    },
    methods: {
        async getClasses() {
            await axios.get('/api/v1/class-setup').then(response => {
                this.classes = response.data
            }).catch(error => {
                console.log(error)
                this.classes = []
            })
        },
        deleteClass(id) {
            if (confirm("Are you sure to delete this class ?")) {
                axios.delete(`/api/v1/class-setup/${id}`).then(response => {
                    this.getClasses()
                }).catch(error => {
                    console.log(error)
                })
            }
        }
    }
}
</script>