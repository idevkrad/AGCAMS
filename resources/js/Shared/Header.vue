<template>
    <Head :title="title"></Head>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mt-n2 font-size-18">{{ content }}</h4>

                <div class="page-title-right">
                    <b-breadcrumb :items="items" class="m-0"></b-breadcrumb>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props: {
        title: {
            type: String,
            default: '',
        },
        content : { type: String },
        items: {
            type: Array,
            default: () => {
                return []
            },
        },
    },    
}
</script>
