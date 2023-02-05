<template>
    <b-modal v-model="showModal" @ok="create($event)" size="lg" title="New Appoinment" no-close-on-backdrop centered>
        <div class="row" style="margin-right: 10px; margin-left: 10px;">
            <b-form class="customform">
                <div class="row mt-4">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Purpose: <span v-if="form.errors" v-text="form.errors.purpose_id"
                                            class="haveerror"></span></label>
                                    <Multiselect v-model="purpose" :options="purposes" :allow-empty="false" :show-labels="false"
                                        label="name" track-by="id" placeholder="Select Purpose" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Method: <span v-if="form.errors" v-text="form.errors.method_id"
                                            class="haveerror"></span></label>
                                    <Multiselect v-model="method" :options="methods" :allow-empty="false" :show-labels="false"
                                        :custom-label="nameWithLang" label="name" track-by="id" placeholder="Select Purpose" />
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-12">
                        <div class="row mt-2">

                            <div class="col-xl-6 mt-2 mb-2">
                                <div class="form-group">
                                     <label>Counselor: <span v-if="form.errors" v-text="form.errors.counselor_id"
                                            class="haveerror"></span></label>
                                    <Multiselect v-model="counselor" :options="counselors.data" :allow-empty="false" :show-labels="false"
                                        label="name" track-by="id" placeholder="Select Counselor" />
                                </div>
                            </div>
                            <div class="col-xl-6 mt-2 mb-2">
                                <div class="form-group">
                                    <label>Date: <span v-if="form.errors" v-text="form.errors.birthday"
                                            class="haveerror"></span></label>
                                    <date-picker v-model:value="date" type="date" format="YYYY-MM-DD" lang="en"
                                        placeholder="Select Date" :disabled-date="notBeforeToday" :clearable="false">
                                    </date-picker>
                                </div>
                            </div>
                            <div class="col-xl-6" v-for="(list,index) in lists" v-bind:key="index">
                                <label class="card-radio-label mb-1">
                                    <input :disabled="(list.status == 1) ? false : true" type="radio" v-model="datetime" :value="list.value" :id="'time'+index" class="card-radio-input" />
                                    <div class="card-radio">
                                        <span :class="(list.status) ? '' : 'text-muted'">{{list.time}}</span>
                                        <span v-if="list.status" class="text-success" style="float: right;">Available</span>
                                        <span v-else class="text-danger" style="float: right;">Not Available</span>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </b-form>
        </div>
        <template v-slot:footer>
            <b-button @click="hide()" variant="secondary" block>Cancel</b-button>
            <b-button @click="create('ok')" variant="primary" :disabled="form.processing" block>Save</b-button>
        </template>
    </b-modal>
</template>

<script>
    import Multiselect from '@suadelabs/vue3-multiselect';
    import DatePicker from 'vue-datepicker-next';
    import 'vue-datepicker-next/index.css';
    export default {
        props: ['dropdowns', 'colleges', 'counselors'],
        components: {
            Multiselect,
            DatePicker
        },
        data() {
            return {
                currentUrl: window.location.origin,
                purpose: '',
                method: '',
                counselor: '',
                date: '',
                datetime: '',
                form: {},
                lists: [],
                editable: false,
                showModal: false,
            }
        },

        watch: {
            counselor(){
                if(this.date != ''){
                    this.fetch();
                }
            }, 
            date(){
                if(this.counselor != ''){
                    this.fetch();
                }
            }
        },

        computed: {
            purposes: function () {
                return this.dropdowns.filter(x => x.classification === 'Purpose');
            },
            methods: function () {
                return this.dropdowns.filter(x => x.classification === 'Method');
            }
        },

        methods: {
            nameWithLang({name,type}) {return `${name} — [${type}]`},

            fetch(){
                 axios.get(this.currentUrl+'/home/time',{
                    params : {
                        counselor : this.counselor.id,
                        date:  new Date(this.date).toLocaleDateString("af-ZA")
                    }
                })
                .then(response => {
                   this.lists = response.data;
                })
                .catch(err => console.log(err));
            },

            notBeforeToday(date) {
                return date <= new Date(new Date().setHours(0, 0, 0, 0));
            },

            show() {
                this.showModal = true;
            },

            create() {
                this.form = this.$inertia.form({
                    counselor_id: this.counselor.id,
                    date: this.datetime,
                    method_id : (this.method) ? this.method.id : '',
                    purpose_id : (this.purpose) ? this.purpose.id : ''
                })

                if (!this.editable) {
                    this.form.post('/appointments', {
                        preserveScroll: true,
                        onSuccess: (response) => {
                            this.hide();
                        }
                    });
                } else {
                    this.form.put('/appointments', {
                        preserveScroll: true,
                        onSuccess: (response) => {
                            this.hide();
                        }
                    });
                }
            },

            hide(){
                this.form.reset().clearErrors(); 
                this.date= '';
                this.datetime = '';
                this.counselor = '';
                this.method = '';
                this.purpose = '';
                this.showModal = false;
            },
        }
    }

</script>
<style>
.card-radio {
    padding: .5rem;
}
</style>
