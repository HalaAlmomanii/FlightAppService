<template>
        <div class="card border-primary mb-3">
                <div class="card-header  mb-3 text-primary">
                        <h6>FLight Details of : <span class="text-dark">{{number}}</span></h6>
                </div>
                <div v-if="information.length===0" class="card-body">
                        <div class="error-text mt-2 text-danger"> Not Found</div>
                </div>
                <div v-else class="card-body">
                        <div class="row " v-for="(value,key) in information">
                                <h6 class="col-sm-6 text-primary ">{{key}}</h6>
                                <p class="col-sm-6 text-dark">{{value}}</p>
                        </div>
                </div>
        </div>

</template>

<script>
    export default {
        props: ['information', 'number'],
    }
</script>
