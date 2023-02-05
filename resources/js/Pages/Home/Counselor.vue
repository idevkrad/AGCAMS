<template>
   <div class="row mb-n4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="d-flex">
                                <div class="me-3"><img :src="currentUrl+'/images/avatars/'+$page.props.auth.data.avatar"
                                        alt="" class="avatar-md rounded-circle img-thumbnail"></div>
                                <div class="flex-grow-1 align-self-center">
                                    <div class="text-muted">
                                        <p class="mb-2">Welcome to AGCAMS dashboard</p>
                                        <h5 class="mb-0">
                                            {{ $page.props.auth.data.firstname+' '+$page.props.auth.data.lastname }}
                                        </h5>
                                        <p class="mb-0">Counselor</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 align-self-center">
                            <div class="text-lg-center mt-4 mt-lg-0">
                                <div class="row">
                                    <div class="col-4" v-for="(list,name, index) in user" v-bind:key="index">
                                        <div>
                                            <p class="text-muted text-truncate mb-2"> {{name}} </p>
                                            <h5 class="mb-0">{{ list }}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 d-none d-lg-block">
                            <div class="clearfix mt-4 mt-lg-0">
                                
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

    <div class="row g-2" style="margin-bottom: -100px;">
        <div class="col-xl-8" >
            <div class="card">
                <div class="card-body border-bottom py-3">
                    <div class="d-flex align-items-center mt-n1 mb-n1">
                        <ul class="list-unstyled hstack gap-3 mb-0 font-size-11 flex-grow-1">
                            <li class="fw-bold font-size-13">List of Appointments</li>
                        </ul>
                        <div class="hstack gap-2">
                            <button type="button" class="btn btn-warning btn-sm"><i class="bx bxs-alarm-exclamation align-baseline"></i> </button>
                        </div>
                    </div>
                </div>
                <div class="card-body border-bottom align-middle" :style="{ height: hayt + 'px' }">
                    <Appointment title="Appointments" status="116" :dropdowns="dropdowns" :hayt="hayt" ref="complete" @info="message"/>
                </div>
            </div>
        </div>
         <div class="col-xl-4">
            
            <div class="card">
                <div class="card-body border-bottom py-3">
                    <div class="d-flex align-items-center mt-n1 mb-n1">
                        <ul class="list-unstyled hstack gap-3 mb-0 font-size-11 flex-grow-1">
                            <li class="fw-bold font-size-13">Pending Appointment</li>
                        </ul>
                        <div class="hstack gap-2">
                            <button type="button" class="btn btn-warning btn-sm"><i class="bx bxs-alarm-exclamation align-baseline"></i> </button>
                        </div>
                    </div>
                </div>
                <div class="card-body border-bottom align-middle" :style="{ height: (hayt-52)/2 + 'px' }">
                    <Appointment title="Pending Appointment" status="114" :dropdowns="dropdowns" :hayt="(hayt-52)/2" ref="pending" @info="message"/>
                </div>
                <div class="card-body border-bottom py-3">
                    <div class="d-flex align-items-center mt-n1 mb-n1">
                        <ul class="list-unstyled hstack gap-3 mb-0 font-size-11 flex-grow-1">
                            <li class="fw-bold font-size-13">Upcoming Appointments</li>
                        </ul>
                        <div class="hstack gap-2">
                            <!-- <button type="button" class="btn btn-warning btn-sm"><i class="bx bxs-alarm-exclamation align-baseline"></i> </button> -->
                        </div>
                    </div>
                </div>
                <div class="card-body border-bottom" :style="{ height: (hayt-52)/2 + 'px' }">
                    <Appointment title="Session Notes" status="115" :dropdowns="dropdowns" :hayt="(hayt-52)/2" ref="approve" @info="message"/>
                </div>
            </div>
        </div>
        <!-- <div class="col-xl-4">
            <Appointment title="Session Notes" status="115" :dropdowns="dropdowns" :hayt="hayt" ref="approve" @info="message"/>
        </div>
        <div class="col-xl-4">
            <Appointment title="Appointments" status="116" :dropdowns="dropdowns" :hayt="hayt" ref="complete" @info="message"/>
        </div> -->
    </div>
</template>
<script>
import Note from './Modules/Counselor/Note.vue';
import Appointment from './Modules/Counselor/Appointment.vue';
import Calendar from './Modules/Counselor/Calendar.vue';
export default {
    components: { Calendar, Appointment, Note },
    inject:['hayt'],
    props: ['dropdowns','user'],
    data(){
        return {
            currentUrl: window.location.origin,
        }
    },
    methods:{
        message(){
           this.$refs.approve.fetch();
           this.$refs.complete.fetch();
        }
    }
}
</script>