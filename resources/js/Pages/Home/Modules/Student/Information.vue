<template>
    <div class="card">
        <div class="card-body border-bottom py-3">
            <div class="d-flex align-items-center mt-n1 mb-n1">
                <ul class="list-unstyled hstack gap-3 mb-0 font-size-11 flex-grow-1">
                    <li class="fw-bold font-size-13">Upcoming Appointment</li>
                </ul>
                <div class="hstack gap-2">
                    <button type="button" class="btn btn-warning btn-sm"><i class="bx bxs-alarm-exclamation align-baseline"></i> </button>
                </div>
            </div>
        </div>
        <div class="card-body border-bottom align-middle" :style="{ height: (hayt-110)/4 + 'px' }">
        <div class="table-responsive mt-n2" v-if="lists.length > 0" >
            <table class="table table-nowrap table-centered table-hover mb-0 align-middle" >
                <thead class="thead-light bg-info text-white">
                    <tr class="font-size-11">
                        <th class="align-middle" width="50%">Purpose</th>
                        <th class="text-end" width="50%">Counselor</th>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="table-responsive" v-if="lists.length > 0" data-simplebar :style="{ height: (hayt-80) + 'px' }">
            <table class="table table-nowrap table-striped table-centered table-hover mb-0 align-middle" >
                <tbody>
                    <tr v-for="list in lists" v-bind:key="list.id" @click="check(list)" style="cursor: pointer;">
                        <td>
                            <h5 class="font-size-13 mb-0">{{list.purpose.name}}</h5>
                            <small>{{list.method.name}} <span class="text-muted">({{list.method.type}})</span></small>
                        </td>
                        <td class="text-end">
                            <h5 class="font-size-13 mb-0">{{list.counselor.name}}</h5>
                            <small>{{list.date}}</small>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
           <div v-else class="alert alert-info alert-dismissible" role="alert"><i class="mdi mdi-alert-circle-outline me-2"></i>No upcoming appointment!</div>
        </div>
        <div class="card-body border-bottom py-3">
            <div class="d-flex align-items-center mt-n1 mb-n1">
                <ul class="list-unstyled hstack gap-3 mb-0 font-size-11 flex-grow-1">
                    <li class="fw-bold font-size-13">My Status</li>
                </ul>
                <div class="hstack gap-2">
                    <!-- <button type="button" class="btn btn-warning btn-sm"><i class="bx bxs-alarm-exclamation align-baseline"></i> </button> -->
                </div>
            </div>
        </div>
        <div class="card-body border-bottom" :style="{ height: (hayt-110)/4 + 'px' }">
           <div class="d-grid gap-2"><button :class="'btn btn-'+user.student.status.color+' btn-lg'" type="button" block="">{{user.student.status.name}}</button></div>
        </div>
        <div class="card-body border-bottom py-3">
            <div class="d-flex align-items-center mt-n1 mb-n1">
                <ul class="list-unstyled hstack gap-3 mb-0 font-size-11 flex-grow-1">
                    <li class="fw-bold font-size-13">Announcements</li>
                </ul>
                <div class="hstack gap-2">
                    <!-- <button type="button" class="btn btn-warning btn-sm"><i class="bx bxs-alarm-exclamation align-baseline"></i> </button> -->
                </div>
            </div>
        </div>
        <div class="card-body" :style="{ height: (hayt-52)/2 + 'px' }">
           <SimpleBar class="mt-n3" :style="{ height: (hayt-100)/2 + 'px' }">
                <li class="list-group-item border-0">
                  <div class="d-flex">
                    <div class="flex-grow-1">
                      <h5 class="font-size-14">Donec vitae sapien ut</h5>
                      <p class="text-muted">
                        If several languages coalesce, the grammar of the
                        resulting language
                      </p>

                      <div class="float-end">
                        <p class="text-muted mb-0">
                          <i class="mdi mdi-account me-1"></i> Joseph
                        </p>
                      </div>
                      <p class="text-muted mb-0">12 Mar, 2020</p>
                    </div>
                  </div>
                </li>
                <li class="list-group-item border-0">
                  <div class="d-flex">
                    <div class="flex-grow-1">
                      <h5 class="font-size-14">Cras ultricies mi eu turpis</h5>
                      <p class="text-muted">
                        To an English person, it will seem like simplified
                        English, as a skeptical cambridge
                      </p>

                      <div class="float-end">
                        <p class="text-muted mb-0">
                          <i class="mdi mdi-account me-1"></i> Jerry
                        </p>
                      </div>
                      <p class="text-muted mb-0">13 Mar, 2020</p>
                    </div>
                  </div>
                </li>
                <li class="list-group-item border-0">
                  <div class="d-flex">
                    <div class="flex-grow-1">
                      <h5 class="font-size-14">Duis arcu tortor suscipit</h5>
                      <p class="text-muted">
                        It va esser tam simplic quam occidental in fact, it va
                        esser occidental.
                      </p>

                      <div class="float-end">
                        <p class="text-muted mb-0">
                          <i class="mdi mdi-account me-1"></i> Calvin
                        </p>
                      </div>
                      <p class="text-muted mb-0">14 Mar, 2020</p>
                    </div>
                  </div>
                </li>
                <li class="list-group-item border-0">
                  <div class="d-flex">
                    <div class="flex-grow-1">
                      <h5 class="font-size-14">Donec vitae sapien ut</h5>
                      <p class="text-muted">
                        If several languages coalesce, the grammar of the
                        resulting language
                      </p>

                      <div class="float-end">
                        <p class="text-muted mb-0">
                          <i class="mdi mdi-account me-1"></i> Joseph
                        </p>
                      </div>
                      <p class="text-muted mb-0">12 Mar, 2020</p>
                    </div>
                  </div>
                </li>
           </SimpleBar>
        </div>
    </div>
    <Approve :title="title" ref="approve" @info="message"/>
</template>
<script>
import Approve from '../../../Modules/Appointments/Approve.vue';
import { SimpleBar } from 'simplebar-vue3';
import Information from './Profile/Information.vue';
export default {
    components: { Information, SimpleBar, Approve },
    props : ['hayt','user'],
    data(){
      return {
        lists: [],
        currentUrl: window.location.origin,
      }
    },
    created(){
        this.fetch();
    },
    methods: {
       fetch(page_url){
            page_url = page_url || '/appointments';
            axios.get(page_url,{
                params : {
                    keyword : this.keyword,
                    count: 0,
                    status: 115,
                    lists: true
                }
            })
            .then(response => {
                if(response){
                    this.lists = response.data.data;                    
                    this.meta = response.data.meta;
                    this.links = response.data.links;
                    this.page = this.meta.per_page*(this.meta.current_page - 1);
                }
            })
            .catch(err => console.log(err));
        },

         check(data){
            this.$refs.approve.show(data);
        },
    }
}
</script>