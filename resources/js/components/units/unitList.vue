<template>

    <div class="row">
        <div class="col-12 mb-2 text-end">
            <router-link :to='{name:"unit.create"}' class="btn btn-primary">Create</router-link>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>List of Units</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Unit Title</th>
                                    <th>Unit Key competence</th>
                                    <th>Subject</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="item in units" :key="item.id">
                                    <td>{{ item.id }}</td>
                                    <td>Unit {{ item.unit_no }}: {{ item.title }}</td>
                                    <td>{{ item.key_unit_competence }}</td>
                                    <td>{{ item.subject.name }}</td>
                                    <td>
                                        <router-link :to='{name:"unit.edit",params:{id:item.id}}'
                                            class="btn btn-success btn-xs">
                                            <i class="fas fa-pencil-alt"></i>
                                        </router-link>
                                        <button type="button" @click="deleteDepartment(item.id)"
                                            class="btn btn-danger btn-xs">
                                            <i class="fas fa-trash-alt sm"></i></button>
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
    name: "units",
    data() {
        return {
            units: []
        }
    },
    mounted() {
        this.getUnits()
    },
    methods: {
        async getUnits() {
            await axios.get('/api/v1/unit-management').then(response => {
                this.units = response.data
            }).catch(error => {
                console.log(error)
                this.units = []
            })
        },
        deleteUnit(id) {
            if (confirm("Are you sure to delete this Unit ?")) {
                axios.delete(`/api/v1/unit-management/${id}`).then(response => {
                    this.getUnits()
                }).catch(error => {
                    console.log(error)
                })
            }
        }
    }
}
</script>