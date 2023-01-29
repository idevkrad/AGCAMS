<template>
    <Header :title="title" :content="title" :items="items" />
    <div class="col-12 mt-n3 mb-n5">
        <div class="card">
            <div class="card-body" :style="{ height: height + 'px' }" style="overflow: auto;">
                

                <div class="row">
                    <div class="col-md-2">
                        <myUpload field="img" @crop-success="cropSuccess" v-model="photo.show" :width="500" :height="500"
                            :params="params" :headers="headers" lang-type="en" img-format="png">
                        </myUpload>
                        <div @click="toggleShow" class="fuzone" style="width: 175px; height: 160px;">
                            <div v-if="photo.url != ''"><img :src="photo.url" style="width: 150px; height: 150x;"></div>
                            <div v-else class="fu-text" @click="toggleShow"><span><i class="fa fa-picture"></i> Click here to upload<br></span></div>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <b-form class="customform">
                            <div class="row mt-4">
                                <div class="col-md-12 mb-3">
                                    <div class="card bg-soft bg-info border shadow-none mb-3">
                                        <div class="p-1">
                                            <div class="d-flex mt-1">
                                                <div class="avatar-xs align-self-center ml-2 ms-2 mr-2">
                                                    <div class="avatar-title rounded bg-transparent"><i class="bx bx-news h4 mt-1"></i></div>
                                                </div>
                                                <div class="overflow-hidden mr-auto align-self-center">
                                                    <h5 class="fw-bold font-size-12 mt-1 fw-bold">Personal Information</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Firstname: <span v-if="form.errors" v-text="form.errors.firstname" class="haveerror"></span></label>
                                        <input type="text" class="form-control" v-model="user.firstname" style="text-transform: capitalize;">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Middlename: <span v-if="form.errors" v-text="form.errors.middlename" class="haveerror"></span></label>
                                        <input type="text" class="form-control" v-model="user.middlename" style="text-transform: capitalize;"> 
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label>Lastname: <span v-if="form.errors" v-text="form.errors.lastname" class="haveerror"></span></label>
                                        <input type="text" class="form-control" v-model="user.lastname" style="text-transform: capitalize;">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Birthday: <span v-if="form.errors" v-text="form.errors.birthday" class="haveerror"></span></label>
                                        <date-picker
                                            v-model:value="user.birthday"
                                            type="date" format="YYYY-MM-DD"
                                            lang="en"
                                            placeholder="Select Date"
                                            :clearable="false"
                                            >
                                        </date-picker>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="form-group mb-3">
                                            <label>Place of Birth: <span v-if="form.errors" v-text="form.errors.birth_place" class="haveerror"></span></label>
                                            <input type="text" class="form-control" v-model="user.birth_place" style="text-transform: capitalize;">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Religion: <span v-if="form.errors" v-text="form.errors.religion_id" class="haveerror"></span></label>
                                        <Multiselect 
                                        v-model="user.religion" 
                                        :options="religions"
                                        :allow-empty="false"
                                        :show-labels="false"
                                        label="name" track-by="id"
                                        placeholder="Select Religion"/>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label>Sex: <span v-if="form.errors" v-text="form.errors.sex_id" class="haveerror"></span></label>
                                        <Multiselect 
                                        v-model="user.sex" 
                                        :options="genders"
                                        :allow-empty="false"
                                        :show-labels="false"
                                        label="name" track-by="id"
                                        placeholder="Select Civil Status"/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Civil Status: <span v-if="form.errors" v-text="form.errors.civil_id" class="haveerror"></span></label>
                                        <Multiselect 
                                        v-model="user.civil_status" 
                                        :options="civils"
                                        :allow-empty="false"
                                        :show-labels="false"
                                        label="name" track-by="id"
                                        placeholder="Select Civil Status"/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Living Condition: <span v-if="form.errors" v-text="form.errors.living_id" class="haveerror"></span></label>
                                        <Multiselect 
                                        v-model="user.living_condition" 
                                        :options="livings"
                                        :allow-empty="false"
                                        :show-labels="false"
                                        label="name" track-by="id"
                                        placeholder="Select Living Condition"/>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label>Ethnic Affiliation: <span v-if="form.errors" v-text="form.errors.ethnic_id" class="haveerror"></span></label>
                                        <Multiselect 
                                        v-model="user.ethnic" 
                                        :options="ethnics"
                                        :allow-empty="false"
                                        :show-labels="false"
                                        label="name" track-by="id"
                                        placeholder="Select Ethnic"/>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Language/Dialect Spoken: <span v-if="form.errors" v-text="form.errors.languages" class="haveerror"></span></label>
                                        <Multiselect 
                                        v-model="user.languages" 
                                        :options="languages"
                                        :allow-empty="false"
                                        :show-labels="false"
                                        :multiple="true"
                                        label="name" track-by="id"
                                        placeholder="Select language/Dialect"/>
                                    </div>
                                </div>

                                <div class="col-md-12 mt-n2 mb-2"><hr /></div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Zamboanga City Address: <span v-if="form.errors" v-text="form.errors.city_name" class="haveerror"></span></label>
                                        <input type="text" class="form-control" v-model="user.city.name">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Telephone No.: <span v-if="form.errors" v-text="form.errors.city_telephone" class="haveerror"></span></label>
                                        <input type="text" class="form-control" v-model="user.city.telephone"> 
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label>Mobile No.: <span v-if="form.errors" v-text="form.errors.city_mobile" class="haveerror"></span></label>
                                        <input type="text" class="form-control" v-model="user.city.mobile">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Province Address: <span v-if="form.errors" v-text="form.errors.province_name" class="haveerror"></span></label>
                                        <input type="text" class="form-control" v-model="user.province.name">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Telephone No.: <span v-if="form.errors" v-text="form.errors.province_telephone" class="haveerror"></span></label>
                                        <input type="text" class="form-control" v-model="user.province.telephone"> 
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label>Mobile No.: <span v-if="form.errors" v-text="form.errors.province_mobile" class="haveerror"></span></label>
                                        <input type="text" class="form-control" v-model="user.province.mobile">
                                    </div>
                                </div>

                                <div class="col-md-12 mt-n2 mb-2"><hr /></div>

                            </div>
                        </b-form>

                        <div class="row mt-n3">
                            <div class="col-md-12">
                                <div class="">
                                    <label style="margin-bottom: -5px; font-size: 11px;">Incase of emergency:</label>
                                    <div class="input-group me-2 mb-1">
                                        <label class="input-group-text">Name <span v-if="form.errors" v-text="form.errors" class="haveerror"></span></label>
                                        <input type="text" class="form-control" placeholder="Enter Name" style="width: 20%;" v-model="user.emergency.name"/>
                                        <label class="input-group-text">Relation <span v-if="form.errors" v-text="form.errors" class="haveerror"></span> </label>
                                        <select v-model="user.emergency.relation" class="form-select" style="width: 17%;">
                                            <option value="" selected disabled>Select Relation</option>
                                        </select>
                                        <label class="input-group-text">Address<span v-if="form.errors" v-text="form.errors" class="haveerror"></span></label>
                                        <input type="text" class="form-control" placeholder="Enter Address" style="width: 20%;" v-model="user.emergency.address"/>
                                        <label class="input-group-text">Phone<span v-if="form.errors" v-text="form.errors" class="haveerror"></span></label>
                                        <input type="text" class="form-control" placeholder="Enter Contact" style="width: 20%;" v-model="user.emergency.contact"/>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <b-form class="">
                            <div class="row mt-5">

                                <div class="col-md-12 mb-3">
                                    <div class="card bg-soft bg-info border shadow-none mb-3">
                                        <div class="p-1">
                                            <div class="d-flex mt-1">
                                                <div class="avatar-xs align-self-center ml-2 ms-2 mr-2">
                                                    <div class="avatar-title rounded bg-transparent"><i class="bx bx-news h4 mt-1"></i></div>
                                                </div>
                                                <div class="overflow-hidden mr-auto align-self-center">
                                                    <h5 class="fw-bold font-size-12 mt-1 fw-bold">SCHOLASTIC DATA</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="input-group me-2 mb-1">
                                        <label class="input-group-text" style="width: 15%;">Grade School <span v-if="form.errors" v-text="form.errors" class="haveerror"></span></label>
                                        <input type="text" class="form-control" placeholder="Name of School" style="width: 30%;" v-model="user.emergency.name"/>
                                        <input type="text" class="form-control" placeholder="Address" style="width: 30%;" v-model="user.emergency.contact"/>
                                        <input type="text" class="form-control" placeholder="Year Graduated" style="width: 15%;" v-model="user.emergency.contact"/>
                                        <input type="text" class="form-control" placeholder="GPA" style="width: 10%;" v-model="user.emergency.contact"/>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="input-group me-2 mb-1">
                                        <label class="input-group-text" style="width: 15%;">High School <span v-if="form.errors" v-text="form.errors" class="haveerror"></span></label>
                                        <input type="text" class="form-control" placeholder="Name of School" style="width: 30%;" v-model="user.emergency.name"/>
                                        <input type="text" class="form-control" placeholder="Address" style="width: 30%;" v-model="user.emergency.contact"/>
                                        <input type="text" class="form-control" placeholder="Year Graduated" style="width: 15%;" v-model="user.emergency.contact"/>
                                        <input type="text" class="form-control" placeholder="GPA" style="width: 10%;" v-model="user.emergency.contact"/>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="input-group me-2 mb-1">
                                        <label class="input-group-text" style="width: 15%;">College <span v-if="form.errors" v-text="form.errors" class="haveerror"></span></label>
                                        <input type="text" class="form-control" placeholder="Name of School" style="width: 30%;" v-model="user.emergency.name"/>
                                        <input type="text" class="form-control" placeholder="Address" style="width: 30%;" v-model="user.emergency.contact"/>
                                        <input type="text" class="form-control" placeholder="Year Graduated" style="width: 15%;" v-model="user.emergency.contact"/>
                                        <input type="text" class="form-control" placeholder="GPA" style="width: 10%;" v-model="user.emergency.contact"/>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-n2 mb-2">
                                     <button @click="add" class="btn btn-primary btn-sm" type="button" style="margin-bottom: -50px;">Add Awards/Citations/Honors</button>
                                    <hr />
                                </div>
                                <div class="col-md-12">
                                    <div class="input-group me-2 mb-1" v-for="(field, index) in user.awards" :key="index">
                                        <label class="input-group-text" style="width: 3%;">{{index+1}}. </label>
                                        <input type="text" class="form-control" placeholder="Institution" style="width: 30%;" v-model="field.name"/>
                                        <input type="text" class="form-control" placeholder="Position" style="width: 30%;" v-model="field.position"/>
                                        <input type="text" class="form-control" placeholder="Year Attended" style="width: 15%;" v-model="field.year"/>
                                        <button type="button" @click="remove(index)" class="btn btn-primary"> <i class='bx bx-trash'></i></button>
                                    </div>
                                </div>

                            </div>
                        </b-form>

                        <b-form class="customform">
                            <div class="row mt-5">

                                <div class="col-md-12 mb-3">
                                    <div class="card bg-soft bg-info border shadow-none mb-3">
                                        <div class="p-1">
                                            <div class="d-flex mt-1">
                                                <div class="avatar-xs align-self-center ml-2 ms-2 mr-2">
                                                    <div class="avatar-title rounded bg-transparent"><i class="bx bx-news h4 mt-1"></i></div>
                                                </div>
                                                <div class="overflow-hidden mr-auto align-self-center">
                                                    <h5 class="fw-bold font-size-12 mt-1 fw-bold">HEALTH QUESTIONNAIRE</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group mb-3">
                                        <label>Height: <span v-if="form.errors" v-text="form.errors.province_mobile" class="haveerror"></span></label>
                                        <input type="text" class="form-control" v-model="user.health.height">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group mb-3">
                                        <label>Weight: <span v-if="form.errors" v-text="form.errors.province_mobile" class="haveerror"></span></label>
                                        <input type="text" class="form-control" v-model="user.health.weight">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group mb-3">
                                        <label>Physical and/or Learning Disabilities: <span v-if="form.errors" v-text="form.errors.province_mobile" class="haveerror"></span></label>
                                        <input type="text" class="form-control" v-model="user.health.disabilities">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        
                                        <div class="form-check float-end">
                                            <input class="form-check-input" type="checkbox" id="gridCheck"/>
                                        </div>
                                            <label class="form-check-label" for="gridCheck">
                                            Is hardbound available?
                                            </label>
                                            
                                    </div>
                                </div>


                            </div>
                        </b-form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import DatePicker from 'vue-datepicker-next';
import 'vue-datepicker-next/index.css';
import myUpload from 'vue-image-crop-upload/upload-3.vue';
import Multiselect from '@suadelabs/vue3-multiselect';
import Header from "@/Shared/Header.vue";
import _ from 'lodash';
export default {
    inject:['count', 'height'],
    components : { Header, myUpload, Multiselect, DatePicker },
    props: ['dropdowns'],
    data(){
        return {
            currentUrl: window.location.origin,
            title: "Add Student",
            items: [
                {text: "User", href: "/",},
                {text: "Lists",active: true,},
            ],
            lists: [],
            meta: {},
            links: {},
            photo: {show: false,url: '',signature: ''},
            params: {token: '123456798',name: 'avatar'},
            headers: {smail: '*_~' },
            form: {},
            user:{
                firstname: '', middlename: '', lastname:'', birthday: '', birth_place: '', religion: '', civil_status: '', living_condition: '', sex: '',
                emergency: {name:'',relation:'',address:'', contact: ''},
                is_international: '',
                ethnic: '', languages: [],
                city: {name:'',telephone:'',mobile:''},
                province: {name:'',telephone:'',mobile:''},
                awards: [{}],
                health: {weight: '', height: '', disabilities: ''}
            }
        }
    },

    computed: {
        religions : function() {
            return this.dropdowns.filter(x => x.classification === 'Religion');
        },
        livings : function() {
            return this.dropdowns.filter(x => x.classification === 'Living Condition');
        },
        civils : function() {
            return this.dropdowns.filter(x => x.classification === 'Civil Status');
        },
        genders : function() {
            return this.dropdowns.filter(x => x.classification === 'Office');
        },
        ethnics : function() {
            return this.dropdowns.filter(x => x.classification === 'Ethnicities');
        },
        languages : function() {
            return this.dropdowns.filter(x => x.classification === 'Languages/Dialect');
        }
    },

    methods : {
        add() {
            this.user.awards.push({ name: '', year: '', position: ''});
        },

        remove(index) {
            if(confirm("Are you sure you want to remove?"))
            this.user.awards.splice(index, 1);
        },
        
    }
}
</script>
<style>
.multiselect__tag {
  font-size: 9px;
}
</style>