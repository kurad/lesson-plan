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
                            <form @submit.prevent="updateUnit">
                                <div class="form-group">
                                    <label>Subject</label>
                                    <select class="form-control" v-model="units.subject_id">
                                        <option value="0">-- Select Subject --</option>
                                        <option v-for="item in subjects" :value="item.id">{{ item.name}} </option>

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Unit No</label>
                                    <input type="number" class="form-control" v-model.number="units.unit_no">
                                </div>
                                <div class="form-group">
                                    <label>Unit Title</label>
                                    <input type="text" class="form-control" v-model="units.title">
                                </div>
                                <div class="form-group">
                                    <label>Key Unit Competence</label>
                                    <textarea class="form-control" v-model="units.key_unit_competence"></textarea>
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
import axios from 'axios';


export default {
    data() {
        return {
            units: {
                subject_id: null,
                unit_no: null,
                title: null,
                key_unit_competence: null,
            },
            subject: 0,
            subjects: []
        }
    },
    created() {
        axios
            .get(`http://localhost:8000/api/v1/unit-management/${this.$route.params.id}`)
            .then((res) => {
                this.units = res.data;
            });
        this.getSubjects();
    },
    methods: {
        getSubjects() {
            axios.get('http://localhost:8000/api/v1/subject-management').then(function (response) {
                this.subjects = response.data;
            }.bind(this));
        },

        updateUnit() {
            axios
                .put(`http://localhost:8000/api/v1/unit-management/${this.$route.params.id}`, {
                    subjectId: this.units.subject_id,
                    unitNo: this.units.unit_no,
                    title: this.units.title,
                    unitCompetence: this.units.key_unit_competence,
                })
                .then((res) => {
                    this.$router.push({ name: 'unitList' });
                });
        }
    }
}
</script>