<template>
        <div class="row justify-content-center ">
                <div class="col-sm-4">
                        <input v-on:input="closeDetails" v-model="flight_number" type="text" :class="error ? 'form-control border-danger' : 'form-control'" placeholder="Flight Number">
                        <div class="help-text error-text mt-2 text-danger" v-if="error" v-text="error.error"></div>
                </div>
                <div class="col-sm-3">
                        <button v-on:click="flightDetails" class="btn btn-primary">Get Flight Details</button>
                </div>
                <div class="col-sm-6 p-4">
                        <Details v-if="show" :information="information" :number="flight_number"/>
                </div>
        </div>
</template>

<script>
    import Details from './FlightDetailsComponent.vue';

    export default {
        components: {Details},

        data() {
            return {
                information: '',
                flight_number: '',
                error: '',
                show: false,
            }
        },
        methods: {
            flightDetails() {
                if (!this.flight_number) {
                    return this.error = {'error': 'Flight number is required '}
                }
                axios.get(`/api/flights/${this.flight_number}`)
                    .then(res => {
                        this.information = res.data.data;
                        this.error = '';
                        this.show = true
                    })
                    .catch(error => {
                        this.error = error.response.data.error;
                    });
            },
            closeDetails() {
                this.show = false;
            }
        },

    }
</script>