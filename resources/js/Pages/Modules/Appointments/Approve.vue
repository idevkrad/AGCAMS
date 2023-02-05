<template>
    <b-modal v-model="showModal" @ok="create($event)" :size="(info.status.name == 'Approved' || info.status.name == 'Completed') ? 'lg' : ''" :title="title" centered v-if="info.student">
        <div class="row" style="margin-right: 10px; margin-left: 10px;">

            <div :class="(info.status.name == 'Approved' || info.status.name == 'Completed') ? 'col-lg-8' : 'col-md-12'" class="border-bottom">
                <div class="d-flex mb-3">
                    <div class="flex-shrink-0 me-3"><img :src="currentUrl+'/images/avatars/'+info.student.avatar" alt=""
                            class="avatar-sm rounded-circle img-thumbnail"></div>
                    <div class="flex-grow-1 align-self-center">
                        <div class="text-muted">
                            <h5 class="mb-0">{{ info.student.name}}</h5>
                            <p class="mb-0 font-size-11">{{ info.course }} - {{info.year}}</p>
                            <!-- <p class="mb-0 font-size-11">{{ $page.props.auth.data.department.name }}</p> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 border-bottom text-end" v-if="info.status.name == 'Approved' || info.status.name == 'Completed'">
                <div class="mt-0 mt-lg-0">
                    <h5 class="mt-1"><span :class="'badge bg-'+info.status.color+' ms-1'">{{info.status.name}}</span></h5>
                    <p class="mt-n1 mb-0 font-size-11">{{ info.created_at}}</p>
                </div>
            </div>
            
            <div :class="(info.status.name == 'Approved' || info.status.name == 'Completed') ? 'col-md-4' : 'col-md-12'" class="mt-2">
                <div class="row">
                    <div class="col-lg-12 align-self-center mt-n1">
                        <div class="mt-0 pt-2">
                            <p class="mb-0 text-muted"><i class="mdi mdi-circle align-middle font-size-10 me-2 text-primary"></i>Counselor</p>
                            <span class="fw-bold font-size-13">{{ info.counselor.name }}</span>
                        </div>
                        <div class="mt-0 pt-2">
                            <p class="mb-0 text-muted"><i class="mdi mdi-circle align-middle font-size-10 me-2 text-primary"></i>Purpose</p>
                            <span class="fw-bold font-size-13">{{ info.purpose.name }}</span>
                        </div>
                        <div class="mt-0 pt-2">
                            <p class="mb-0 text-muted"><i class="mdi mdi-circle align-middle font-size-10 me-2 text-primary"></i>Method</p>
                            <span class="fw-bold font-size-13">{{ info.method.name }} <span class="text-muted font-size-12 fw-light">({{info.method.type}})</span></span>
                        </div>
                        <div class="mt-0 pt-2">
                            <p class="mb-0 text-muted"><i class="mdi mdi-circle align-middle font-size-10 me-2 text-primary"></i>Date & Time</p>
                            <span class="fw-bold font-size-13">{{ info.date }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8" v-if="info.status.name == 'Approved' || info.status.name == 'Completed'">
                <div class="mt-2">
                    <label style=" margin-bottom: 2px; font-size: 11px;">Concern <span v-if="form.errors"
                            class="haveerror">{{(form.errors.concern) ? '(required)' : ''}}</span></label>
                    <textarea class="form-control" v-model="concern" rows="2" placeholder="Input concerns here"
                        :readonly="(info.status.name == 'Completed') ? true : false"></textarea>
                </div>
                <div  class="mt-1">
                    <label style=" margin-bottom: 2px; font-size: 11px;">Intervention <span v-if="form.errors"
                            class="haveerror">{{(form.errors.intervention) ? '(required)' : ''}}</span></label>
                    <textarea class="form-control" v-model="intervention" rows="2" placeholder="Input intervention"
                        :readonly="(info.status.name == 'Completed') ? true : false"></textarea>
                </div>
            </div>
        </div>
        <template v-slot:footer>
            <b-button @click="hide()" variant="secondary" block>Cancel</b-button>
            <b-button v-if="info.status.name == 'Pending'" @click="update('Approve')" variant="primary" :disabled="form.processing" block>Approve</b-button>
            <b-button v-if="info.status.name == 'Approved'" @click="update('Complete')" variant="primary" :disabled="form.processing" block>Submit</b-button>
        </template>
    </b-modal>
</template>

<script>
    export default {
        data() {
            return {
                currentUrl: window.location.origin,
                form: {},
                info: {},
                editable: false,
                showModal: false,
                concern: '',
                intervention: ''
            }
        },

        methods: {
            show(info) {
                this.info = info;
                if (info.note) {
                    this.concern = this.info.note.concern;
                    this.intervention = this.info.note.intervention;
                }
                this.showModal = true;
            },

            update(type) {
                this.form = this.$inertia.form({
                    id: this.info.id,
                    type: type,
                    concern: this.concern,
                    intervention: this.intervention
                })
                this.form.put('/appointments/update', {
                    preserveScroll: true,
                    onSuccess: (response) => {
                        this.showModal = false;
                        this.$emit('info', true)
                    }
                });
            },

            hide(){
                this.showModal = false;
            }
        }
    }

</script>
