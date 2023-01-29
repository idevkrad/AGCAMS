<template>
    <b-modal v-model="showModal" @ok="create($event)" size="xl" title="Create User" no-close-on-backdrop centered>
        <div class="row" style="margin-right: 10px; margin-left: 10px;">
            <div class="col-md-3">
                <myUpload field="img" @crop-success="cropSuccess" v-model="photo.show" :width="500" :height="500"
                    :params="params" :headers="headers" lang-type="en" img-format="png">
                </myUpload>
                <div @click="toggleShow" class="fuzone" style="width: 225px; height: 210px;">
                    <div v-if="photo.url != ''">
                        <img :src="photo.url" style="width: 200px; height: 200x;">
                    </div>
                    <div v-else class="fu-text" @click="toggleShow">
                        <span>
                            <i class="fa fa-picture"></i> Click here to upload<br>
                            <!-- <span v-if="errors.avatar" style="color: red; font-size: 12px; margin-top: -20px;">({{ errors.avatar[0] }})</span> -->
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <b-form class="customform">
                    
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>ID Number:  <span v-if="form.errors" v-text="form.errors.username" class="haveerror"></span></label>
                                <input type="text" class="form-control" v-model="user.username">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label>Email: <span v-if="form.errors" v-text="form.errors.email" class="haveerror"></span></label>
                                <input type="email" class="form-control" v-model="user.email" style="text-transform: lowercase;">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Mobile No.:  <span v-if="form.errors" v-text="form.errors.mobile" class="haveerror"></span></label>
                                <input type="text" class="form-control" v-model="user.mobile">
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
                                <!-- :class="[(form.errors != undefined) ? 'is-invalid' : '']" -->
                                <input type="text" class="form-control" v-model="user.middlename" style="text-transform: capitalize;"> 
                            </div>
                        </div>
                         <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label>Lastname: <span v-if="form.errors" v-text="form.errors.lastname" class="haveerror"></span></label>
                                <input type="text" class="form-control" v-model="user.lastname" style="text-transform: capitalize;">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                <label>College: <span v-if="form.errors" v-text="form.errors.college_id" class="haveerror"></span></label>
                                <Multiselect 
                                v-model="user.college" 
                                :options="colleges"
                                :allow-empty="true"
                                :show-labels="false"
                                :multiple="true"
                                label="name" track-by="id"
                                placeholder="Select Course"/>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Role: <span v-if="form.errors" v-text="form.errors.college_id" class="haveerror"></span></label>
                                <Multiselect 
                                v-model="user.role" 
                                :options="roles"
                                 :allow-empty="true"
                                :show-labels="false"
                                :multiple="true"
                                label="name" track-by="id"
                                placeholder="Select Course"/>
                            </div>
                        </div>

                        <div class="col-md-6" style="margin-top: -8px; margin-bottom: -15px;">
                            <div class="row" style="margin-top: 20px;">
                                <div class="col-md-4">
                                    <div class="custom-control custom-radio mb-3">
                                        <input type="radio" id="customRadio1" class="custom-control-input me-2"  value="M" v-model="user.gender">
                                        <label class="custom-control-label" for="customRadio1">Male</label>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="custom-control custom-radio mb-3">
                                        <input type="radio" id="customRadio2" class="custom-control-input me-2" value="F" v-model="user.gender">
                                        <label class="custom-control-label" for="customRadio2">Female</label>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                </b-form>
            </div>
        </div>
        <template v-slot:footer>
            <b-button @click="hide()" variant="secondary" block>Cancel</b-button>
            <b-button @click="create('ok')" variant="primary" :disabled="form.processing" block>Save</b-button>
        </template>
    </b-modal>
</template>

<script>
    import myUpload from 'vue-image-crop-upload/upload-3.vue';
    import Multiselect from '@suadelabs/vue3-multiselect';
    export default {
        props: ['dropdowns','colleges'],
        components: { myUpload , Multiselect },
        data() {
            return {
                currentUrl: window.location.origin,
                user: {
                    id: '',
                    username: '',
                    email: '',
                    role:[],
                    firstname: '',
                    lastname: '',
                    middlename: '',
                    gender: '',
                    mobile: '',
                    avatar: 'avatar.jpg',
                    img: '',
                    profile_id: '',
                    college: [],
                },
                form: {},
                editable: false,
                showModal: false,
                photo: {
                    show: false,
                    url: '',
                    signature: ''
                },
                params: {
                    token: '123456798',
                    name: 'avatar'
                },
                headers: {
                    smail: '*_~'
                },
                r: []
            }
        },

        computed: {
            roles : function() {
                return this.dropdowns.filter(x => x.classification === 'Role');
            },
            "user.role" : function(){
                return [...new Map(this.r.map(item => [item.id, item])).values()];
            }
        },

        methods: {
            new() {
                this.showModal = true;
            },

            edit(list){
                var arr = [];
                this.user = list;
                const a = list.roles.filter((obj, index) => {
                    var a = index === list.roles.findIndex(o => obj.role_id === o.role_id);
                   if(a){arr.push(obj.role);}
                });
                this.user.role = arr;
                this.user.college = list.roles.filter(function(b) {if(b.college == null) {return false;}return true;}).map(function(a) { return a.college; });
                this.showModal = true;
                this.editable = true;
            },

            create() {
                this.form = this.$inertia.form({
                    id: this.user.id,
                    firstname: this.user.firstname,
                    lastname: this.user.lastname,
                    middlename: this.user.middlename,
                    email: this.user.email,
                    username: this.user.username,
                    roles: this.user.role,
                    mobile: this.user.mobile,
                    gender: this.user.gender,
                    avatar: this.user.avatar ,
                    colleges: this.user.college,
                    profile_id: this.user.profile_id,
                    img: this.user.img,
                    editable: this.editable
                })

                if(!this.editable){
                    this.form.post('/staffs',{
                        preserveScroll: true,
                        onSuccess: (response) => {
                            this.hide();
                        }
                    });
                }else{
                    this.form.put('/staffs/update',{
                        preserveScroll: true,
                        onSuccess: (response) => {
                            this.hide();
                        }
                    });
                }
            },

            hide(){
                // (this.form.hasOwnProperty('reset') ) ? this.form.reset().clearErrors() : this.user = {};
                this.showModal = false;
            },

            toggleShow() {
                this.photo.show = !this.photo.show;
            },

            cropSuccess(imgDataUrl, field) {
                this.photo.url = imgDataUrl;
                this.user.img = imgDataUrl;
            }
        }
    }
</script>
