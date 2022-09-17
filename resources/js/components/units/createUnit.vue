<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Create Unit</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <form @submit.prevent="addUnit">

                                <div class="form-group">
                                    <label>Subject</label>
                                    <!-- <select v-model="selected.subject" class="form-control">
                                        <option value="">-- Select Subject --</option>
                                        <option v-for="subject in subjects" :value="subject.id">{{subject.name}}
                                        </option>

                                    </select> -->
                                    <input type="text" class="form-control" v-model="unit.subject_id">
                                </div>
                                <div class="form-group">
                                    <label>Unit No</label>
                                    <input type="number" class="form-control" v-model="unit.unit_no">
                                </div>
                                <div class="form-group">
                                    <label>Unit Title</label>
                                    <input type="text" class="form-control" v-model="unit.title">
                                </div>
                                <div class="form-group">
                                    <label>Key Unit Competence</label>
                                    <input type="text" class="form-control" v-model="unit.key_unit_competence">
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
import axios from 'axios';
import data from 'css-tree/data';
import { then } from 'laravel-mix';

export default {
    data() {
        return {
            unit: {},
            subjects: []
        }
    },
    mounted() {
        this.getSubjects();
    },
    methods: {
        async getSubjects() {
            await axios.get('http://localhost:8000/api/v1/subject-management').then(response => {
                this.subjects = response.data;
            }).catch(error => {
                console.log(error)
                this.subjects = []
            })
        },

        addUnit() {
            axios
                .post('http://localhost:8000/api/v1/unit-management', this.unit)
                .then(response => (
                    this.$router.push({ name: 'unitList' })
                ))
                .catch(err => console.log(err))
                .finally(() => this.loading = false)
        }
    }
}
</script>