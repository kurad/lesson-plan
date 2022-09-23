<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Create Class</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <form @submit.prevent="updateClass">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" v-model="classes.name">
                                </div>
                                <div class="form-group">
                                    <label>Class Size</label>
                                    <input type="number" class="form-control" v-model.number="classes.size">
                                </div>
                                <div class="form-group">
                                    <label>Learner with SEN</label>
                                    <input type="number" class="form-control" v-model.number="classes.SEN">
                                </div>
                                <div class="form-group">
                                    <label>Location</label>
                                    <input type="text" class="form-control" v-model="classes.location">
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
            classes: {}
        }
    },
    created() {
        axios
            .get(`http://localhost:8000/api/v1/class-setup/${this.$route.params.id}`)
            .then((res) => {
                this.classes = res.data;
            });
    },
    methods: {
        updateClass() {
            axios
                .put(`http://localhost:8000/api/v1/class-setup/${this.$route.params.id}`, this.classes)
                .then((res) => {
                    this.$router.push({ name: 'classList' });
                });
        }
    }
}
</script>