<template>
    <Header :title="title" :content="title" :items="items" />
    <div class="col-12 mt-n3 mb-n5">
        <div class="card">
            <div class="card-body" :style="{ height: height + 'px' }">
                <div class="d-flex align-items-center mb-3">
                    <ul class="list-unstyled hstack gap-3 mb-0 font-size-11 flex-grow-1">
                        <li class="me-n2">
                             <button type="button" @click="addnew" class="btn btn-danger waves-effect waves-light"><i class='bx bx-plus-medical'></i></button>
                        </li>
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
                    <table class="table align-middle table-nowrap mb-0">
                        <thead class="thead-light">
                            <tr>
                                <th class="align-middle">Username</th>
                                <th class="align-middle">Name</th>
                                <th class="align-middle">Roles</th>
                                <th class="text-center">Created At</th>
                                <th class="text-center">Updated At</th>
                                <th class="align-middle"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="list in lists" v-bind:key="list.id">
                                <td><a class="text-body fw-bold">{{list.username}}</a> </td>
                                <td>
                                    <h5 class="font-size-13 mb-0 text-dark">{{list.lastname}}, {{list.firstname}} {{list.middlename[0]}}.</h5>
                                    <p class="font-size-11 text-muted mb-0">{{list.email}}</p>
                                </td>
                                <td class="align-middle">
                                    <span v-for="role in list.roles" v-bind:key="role.id" class="badge badge-pill badge-soft-success font-size-11 me-2">
                                        {{role.role.name}} {{ (role.college != null) ? '('+role.college.acronym+')' : ''}}
                                    </span>
                                </td>
                                <td class="text-center font-size-12">
                                    {{ list.created_at}}
                                </td>
                                <td class="text-center font-size-12">
                                    {{ list.updated_at}}
                                </td>
                                <td>
                                    <button @click="edit(list)" type="button" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light">
                                        View Details
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <Add :dropdowns="dropdowns" :colleges="colleges" ref="add"/>
</template>
<script>
import Add from "./Add.vue";
import Header from "@/Shared/Header.vue";
import Pagination from "@/Shared/Pagination.vue";
import _ from 'lodash';
export default {
    inject:['count', 'height'],
    components : { Header, Pagination, Add },
    props: ['colleges','dropdowns'],
    data(){
        return {
            currentUrl: window.location.origin,
             title: "Staffs",
            items: [
                {text: "User", href: "/",},
                {text: "Lists",active: true,},
            ],
            lists: [],
            meta: {},
            links: {},
        }
    },

    created(){
        this.fetch();
    },

    watch: {
        datares: {
            deep: true,
            handler(val = null) {
                this.fetch();
            },
        },
        keyword(newVal){
            this.checkSearchStr(newVal)
        }
    },

    computed: {
        datares() {
            return this.$page.props.flash.datares;
        },
    },

    methods : {
        checkSearchStr: _.debounce(function(string) {
            this.fetch();
        }, 300),

        fetch(page_url){
            page_url = page_url || '/staffs';
            axios.get(page_url,{
                params : {
                    keyword : this.keyword,
                    count: this.count,
                    search: true
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

        update(list){
            this.$refs.update.set(list);
            this.editable = true;
        },

        addnew(){
            this.$refs.add.new();
            this.editable = false;
        },

        edit(list){
            this.$refs.add.edit(list);
            this.editable = true;
        },

        role(roles,user){
            this.$refs.role.set(roles,user);
            this.editable = true;
        }
    }
}
</script>