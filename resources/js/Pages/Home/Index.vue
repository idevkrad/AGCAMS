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
                                        <h5 class="mb-1">
                                            {{ $page.props.auth.data.firstname+' '+$page.props.auth.data.lastname }}
                                        </h5>
                                        <p class="mb-0"> {{ $page.props.auth.data.role }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 align-self-center">
                            <div class="text-lg-center mt-4 mt-lg-0">
                                <div class="row">
                                    <div class="col-4" v-for="(list,name, index) in counts" v-bind:key="index">
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
            <Appointment title="Pending" :dropdowns="dropdowns" :counselors="counselors" :hayt="hayt"/>
        </div>
        <div class="col-xl-4">
            <Information :dropdowns="dropdowns" :hayt="hayt" :user="user.data"/>
        </div>
    </div>
</template>
<script>
import Appointment from '../Home/Modules/Student/Appointment.vue';
import Information from '../Home/Modules/Student/Information.vue';
export default {
    props: ['dropdowns','counselors','user','counts'],
    inject:['hayt'],
    components: { Appointment, Information },
    data() {
        return {
            currentUrl: window.location.origin,
            content: 'test'
        }
    },

    created(){

    },

    methods: {
        
    }
}
</script>
