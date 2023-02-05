<template>

    <FullCalendar :options='calendarOptions' />
</template>
<script>
import FullCalendar from '@fullcalendar/vue3';
import dayGridPlugin from '@fullcalendar/daygrid';
import timeGridPlugin from "@fullcalendar/timegrid";
import interactionPlugin from "@fullcalendar/interaction";
import listPlugin from "@fullcalendar/list";
    export default {
        props: ['hayt'],
        components: {
            FullCalendar,
        },
        data() {
            return {
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
                    initialEvents:[],
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
                },
                currentEvents: [],
            }
        }
    }

</script>
