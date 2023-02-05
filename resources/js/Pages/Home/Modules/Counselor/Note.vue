<template>
    <div class="card">
        <div class="card-body border-bottom py-3">
            <div class="d-flex align-items-center mt-n1 mb-n1">
                <ul class="list-unstyled hstack gap-3 mb-0 font-size-11 flex-grow-1">
                    <li class="fw-bold font-size-13">Session Notes</li>
                </ul>
                <div class="hstack gap-2">
                </div>
            </div>
        </div>
        <div class="card-body" :style="{ height: hayt + 'px' }">
        </div>
    </div>
</template>
<script>
export default {
    props: ['hayt']
}
</script>