<template>
    <div class="row justify-content-center">
        <a href="#" class="btn btn-outline-primary" v-on:click="load"> {{ message.answers }}</a>
        <div class="col-12 mt-2" v-for="response in responses">
            <div class="card">
                <div class="card-header">
                    <b>{{ response.user.username }}</b>: {{ response.message }}
                </div>
                <div class="card-footer text-muted">
                    {{ response.created_at }}
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['message'],
        data() {
            return {
                responses: [ ],
            }
        },
        methods: {
            load() {
                axios.get('/api/messages/' + this.message + '/responses').then(res => {
                    this.responses = res.data;
                });
            }
        }
    }
</script>
