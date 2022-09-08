<template>
    <div class="container">
        <h2 class="text-center">Levels List</h2>
        <div class="row">
            <div class="col-md-12">
                <router-link to="/create" class="btn btn-primary btn-sm float-right mb-2">Add Level</router-link>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Level Name</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(level, key) of levels" v-bind:key="key">
                            <td>{{ key+1 }}</td>
                            <td>{{ level.level_name }}</td>
                            <td>
                                <router-link class="btn btn-success btn-sm" :to="{ name: 'LevelEdit', params: { levelId: level.id }}">Edit</router-link>
                                <button class="btn btn-danger btn-sm" @click="deleteLevel(level.id)">Delete</button>
                            </td>
                            <td>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    
</template>

<script>
    export default {
        data() {
            return {
                levels: {}
            }
        },
        created() {
            this.getLevels();
        },
        methods: {
            getLevels() {
              axios.get('http://127.0.0.1:8000/api/levels')
                  .then(response => {
                      this.levels = response.data;
                  });
            },
            deleteLevel(levelId) {
                axios
                    .delete(`http://127.0.0.1:8000/api/levels/${levelId}`)
                    .then(response => {
                        let i = this.levels.map(data => data.id).indexOf(levelId);
                        this.levels.splice(i, 1)
                    });
            }
        }
    }
</script>