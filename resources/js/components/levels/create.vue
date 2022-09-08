<template>
    <div class="container">
        <h2 class="text-center">Create Level</h2>
        <div class="row">
            <div class="col-md-12">
                <router-link to="/levels" class="btn btn-primary btn-sm float-right mb-2">Back</router-link>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form>
                    <div class="form-group">
                        <label>Level Name</label>
                        <input type="text" class="form-control" v-model="level.level_name">
                    </div>
                    
                    <button type="button" class="btn btn-primary" @click="createLevel()">Create</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                level: {}
            }
        },
        methods: {
            createLevel() {
                axios.post('http://127.0.0.1:8000/api/levels', this.level)
                    .then(response => (
                        this.$router.push({ name: 'levels' })
                    ))
                    .catch(err => console.log(err))
                    .finally(() => this.loading = false)
            }
        }
    }
</script>