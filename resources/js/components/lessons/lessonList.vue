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
                                    <th>Lesson Title</th>
                                    <th>Unit</th>
                                    <th>Topic Area</th>
                                    <th>Duration</th>
                                    <th>Date</th>
                                    <th>Objectives</th>
                                    <th>Reference</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="item in lessons" :key="item.id">
                                    <td>{{ item.id }}</td>
                                    <td> {{ item.title }}</td>
                                    <td> {{ item.unit.title }}</td>
                                    <td>{{ item.topic_area }}</td>
                                    <td>{{ item.duration }}</td>
                                    <td>{{ item.date }}</td>
                                    <td>{{ item.instructional_objective }}</td>
                                    <td>{{ item.reference }}</td>
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
            lessons: []
        }
    },
    mounted() {
        this.getLessons()
    },
    methods: {
        async getLessons() {
            await axios.get('/api/v1/lesson-management').then(response => {
                this.lessons = response.data
            }).catch(error => {
                console.log(error)
                this.lessons = []
            })
        },
        deleteLesson(id) {
            if (confirm("Are you sure to delete this Unit ?")) {
                axios.delete(`/api/v1/unit-management/${id}`).then(response => {
                    this.getLessons()
                }).catch(error => {
                    console.log(error)
                })
            }
        }
    }
}
</script>