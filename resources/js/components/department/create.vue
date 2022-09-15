<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Create Department</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <form @submit.prevent="addDepartment">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" v-model="department.name">
                                </div>

                                <button type="submit" class="btn btn-primary">Create</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
 
<script>
export default {
    data() {
        return {
            department: {}
        }
    },
    methods: {
        addDepartment() {
            axios
                .post('http://localhost:8000/api/v1/departments', this.department)
                .then(response => (
                    this.$router.push({ name: 'departmentList' })
                ))
                .catch(err => console.log(err))
                .finally(() => this.loading = false)
        }
    }
}
</script>