<template>
    <div class="card">
        <div class="card-body border-bottom py-3">
            <div class="d-flex align-items-center mt-n1 mb-n1">
                <ul class="list-unstyled hstack gap-3 mb-0 font-size-11 flex-grow-1">
                    <li class="fw-bold font-size-13">Appointments</li>
                </ul>
                <div class="hstack gap-2">
                    <button type="button" @click="new5()" class="btn btn-primary btn-sm"><i class="bx bxs-plus-circle align-baseline"></i> New</button>
                </div>
            </div>
        </div>
        <div class="card-body" :style="{ height: hayt + 'px' }">
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
            <div class="table-responsive">
                <table class="table table-nowrap table-centered table-hover mb-0 align-middle">
                    <thead class="thead-light">
                        <tr class="font-size-11">
                            <th class="align-middle" width="10%">Purpose</th>
                            <th class="text-center" width="30%">Counselor</th>
                            <th class="text-center" width="30%">Date</th>
                            <th class="text-center">Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="list in lists" v-bind:key="list.id">
                            <td>
                                <h5 class="font-size-13 mb-0">{{list.purpose.name}}</h5>
                                <small>{{list.method.name}} <span class="text-muted">({{list.method.type}})</span></small>
                            </td>
                            <td class="text-center">
                                <h5 class="font-size-13 mb-0">{{list.counselor.name}}</h5>
                            </td>
                            <td class="text-center font-size-12">{{list.date}}</td>
                            <td class="text-center">
                                <span :class="'badge bg-'+list.status.color">{{ list.status.name }}</span>
                            </td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <Add :dropdowns="dropdowns" :counselors="counselors" ref="add" />
</template>
<script>
import Pagination from "@/Shared/Pagination.vue";
import Add from '../../../Modules/Appointments/Add.vue';
export default {
    components : {Add, Pagination},
    props: ['dropdowns','counselors','hayt'],
    data(){
        return {
            currentUrl: window.location.origin,
            lists: [],
            meta: {},
            links: {},
            page: ''
        }
    },
    created(){
        this.fetch();
    },
    methods : {
        new5(){
            this.$refs.add.show();
        },
        
        fetch(page_url){
            page_url = page_url || '/appointments';
            axios.get(page_url,{
                params : {
                    keyword : this.keyword,
                    count: Math.floor((this.hayt - 110) / 61),
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
    }
}
</script>