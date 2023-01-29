<template>
    <div class="topnav">
        <div class="container-fluid">
            <nav class="navbar navbar-light navbar-expand-lg topnav-menu active">
                <div class="collapse navbar-collapse active" id="topnav-menu-content">
                    <ul class="navbar-nav active">
                        <li class="nav-item dropdown" v-for="item in menus">
                            <Link :href="item.link" :class="{'mm-active': $page.component.startsWith(item.name) }" class="nav-link dropdown-toggle arrow-none" id="topnav-components"
                                role="button"><i :class="'bx '+item.icon+' me-1'"></i> {{item.label}}
                            </Link>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</template>
<script>
import { menus} from "./menu";
export default {
    data(){
        return {
            menus: menus
        }
    },

    created(){
        console.log(this.wew);
    }
}
</script>
