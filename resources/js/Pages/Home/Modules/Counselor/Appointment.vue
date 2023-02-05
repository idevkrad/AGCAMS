<template>
<div v-if="status != 116 && status != 'secretary'">
    <div class="table-responsive mt-n2" v-if="lists.length > 0" >
        <table class="table table-nowrap table-centered table-hover mb-0 align-middle" >
            <thead class="thead-light bg-info text-white">
                <tr class="font-size-11">
                    <th class="align-middle" width="50%">Purpose</th>
                    <th class="text-end" width="50%">Student</th>
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
                        <h5 class="font-size-13 mb-0">{{list.student.name}}</h5>
                        <small>{{list.date}}</small>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
     <div v-else class="alert alert-secondary" role="alert">No {{title}} found</div>
</div>
<div v-if="status == 116 || status == 'secretary'">
    <div class="d-flex align-items-center mb-2" style="margin-top: -11px;">
        <ul class="list-unstyled hstack gap-3 mb-0 font-size-11 flex-grow-1">
            <li class="fw-bold font-size-13">
                <div class="search-box">
                <div class="position-relative">
                    <input type="text" class="form-control bg-light border-light rounded" placeholder="Search...">
                    <i class="bx bx-search-alt search-icon"></i>
                </div>
            </div>
            </li>
        </ul>
        <div class="hstack gap-2">
            <ul class="list-inline user-chat-nav text-end mb-n2 mt-n2 dropdown">
                <Pagination v-if="meta" @fetch="fetch" :links="links" :pagination="meta"/>
            </ul>
        </div>
    </div>
                
    <div class="table-responsive" v-if="lists.length > 0">
        <table class="table table-nowrap table-centered table-hover mb-0 align-middle" >
            <thead class="thead-light">
               <tr class="font-size-11">
                    <th class="align-middle" width="25%">Purpose</th>
                    <th class="align-middle" :width="(status == 'secretary') ? '18%' : '35%'">Student</th>
                    <th class="text-center" width="18%" v-if="status == 'secretary'">Counselor</th>
                    <th class="text-center" width="20%">Date</th>
                    <th class="text-center" width="15%">Status</th>
                    <th width="5%"></th>
                </tr>
            </thead>
            <tbody>
               <tr v-for="list in lists" v-bind:key="list.id">
                    <td>
                        <h5 class="font-size-13 mb-0">{{list.purpose.name}}</h5>
                        <small>{{list.method.name}} <span class="text-muted">({{list.method.type}})</span></small>
                    </td>
                    <td>
                        <h5 class="font-size-13 mb-0">{{list.student.name}}</h5>
                        <small><span class="text-muted">{{list.course}}</span></small>
                    </td>
                    <td class="text-center" v-if="status == 'secretary'">
                        <h5 class="font-size-13 mb-0">{{list.counselor.name}}</h5>
                    </td>
                    <td class="text-center font-size-12">{{list.date}}</td>
                    <td class="text-center">
                        <span :class="'badge bg-'+list.status.color">{{ list.status.name }}</span>
                    </td>
                    <td class="text-end">
                        <button  @click="check(list)" type="button" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light"> View </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
     <div v-else class="alert alert-secondary" role="alert">No {{title}} found</div>
</div>

<Approve :title="title" ref="approve" @info="message"/>
</template>
<script>
import Pagination from "@/Shared/Pagination.vue";
import Approve from '../../../Modules/Appointments/Approve.vue';
export default {
    props: ['dropdowns','hayt','title', 'status'],
    components : { Approve, Pagination },
    data(){
        return {
            currentUrl: window.location.origin,
            lists: [],
            meta: {},
            links: {},
            page: '',
        }
    },
    created(){
        this.fetch();
    },
    methods : {
        check(data){
            this.$refs.approve.show(data);
        },
        
        fetch(page_url){
            page_url = page_url || '/appointments';
            axios.get(page_url,{
                params : {
                    keyword : this.keyword,
                    count: (this.status == 116 || this.status == 'secretary') ? Math.floor((this.hayt - 110) / 61) : 0,
                    status: this.status,
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

        message(){
            this.fetch();
            this.$emit('info', true)
        }
    }
}
</script>