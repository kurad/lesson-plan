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
                            <form @submit.prevent="updateDepartment">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" v-model="department.name">
                                </div>

                                <button type="submit" class="btn btn-primary">Update</button>
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
    created() {
        axios
            .get(`http://localhost:8000/api/v1/departments/${this.$route.params.id}`)
            .then((res) => {
                this.department = res.data;
            });
    },
    methods: {
        updateDepartment() {
            axios
                .put(`http://localhost:8000/api/v1/departments/${this.$route.params.id}`, this.department)
                .then((res) => {
                    this.$router.push({ name: 'departmentList' });
                });
        }
    }
}
</script>