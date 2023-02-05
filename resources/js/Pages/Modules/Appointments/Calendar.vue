<template>
    <Header :title="title" :content="title" :items="items" />
    <div class="col-12 mt-n3 mb-n5">
        <div class="card">
            <div class="card-body">
                <FullCalendar :options='calendarOptions' class="mt-n4"/>
            </div>
        </div>
    </div>
    <View ref="view"/>
</template>
<script>
import View from './View.vue';
import Header from "@/Shared/Header.vue";
import FullCalendar from '@fullcalendar/vue3';
import dayGridPlugin from '@fullcalendar/daygrid';
import timeGridPlugin from "@fullcalendar/timegrid";
import interactionPlugin from "@fullcalendar/interaction";
import listPlugin from "@fullcalendar/list";
    export default {
        inject: ['height'],
        components: {
            FullCalendar, Header, View
        },
        data() {
            return {
                currentUrl: window.location.origin,
                title: "Calendar",
                items: [
                    {text: "User", href: "/",},
                    {text: "Lists",active: true,},
                ],
                calendarEvents: [],
                calendarOptions: {
                    headerToolbar: {
                        left: "prev,next today",
                        center: "title",
                        right: "dayGridMonth,timeGridWeek,timeGridDay,listWeek",
                    },
                    plugins: [
                        dayGridPlugin,
                        timeGridPlugin,
                        interactionPlugin,
                        listPlugin,
                    ],
                    initialView: "dayGridMonth",
                    themeSystem: "bootstrap",
                    events:[],
                    editable: true,
                    droppable: true,
                    eventResizableFromStart: true,
                    dateClick: this.dateClicked,
                    eventClick: this.editEvent,
                    eventsSet: this.handleEvents,
                    weekends: true,
                    selectable: true,
                    selectMirror: true,
                    dayMaxEvents: true,
                    slotMinTime: "08:00:00",
			        slotMaxTime: "18:00:00",
                },
                currentEvents: [],
                showModal: false,
            }
        },

        created(){
            this.fetch();
        },

        methods : {
            editEvent(info) {
                 this.$refs.view.show(info);
            },

            fetch(page_url){
                page_url = page_url || '/appointments';
                axios.get(page_url,{
                    params : {
                        lists: 'Calendar'
                    }
                })
                .then(response => {
                    if(response){
                        this.calendarOptions.events = response.data.data;                    
                    }
                })
                .catch(err => console.log(err));
            },
        }
    }

</script>
<style>
.fc-view-harness {
    margin-top : -30px;
}
.fc-event-title {
    font-size: 12px;
}
  .krad {
       line-height: 240%; 
       border-radius: 3px;
       margin: 1px;
    }
</style>
