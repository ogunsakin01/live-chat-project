<template>
    <div class="container">
        <div class="d-flex align-items-center p-3 my-3 bg-dark text-white-50 rounded shadow-sm">
            <div class="lh-100">
                <h6 class="mb-0 text-white lh-100">All Users Chat Forum <small> Since 2019 </small></h6>
                <p class="text-success"> {{ users.length }} online </p>
                <p v-if="this.typing_message.status === 1">
                    <small class="text-light">@{{ this.typing_message.user.name }} is typing >>> <i class="font-italic">{{ this.typing_message.message}}</i> ...</small></p>
            </div>
        </div>
        <chat-messages :messages="messages" :users="users" :user="user"></chat-messages>
        <div class="my-3 p-3 bg-white rounded shadow-sm">
            <chat-form v-on:messagesent="addMessage" @typing="typing" :user="user"></chat-form>
        </div>
    </div>
</template>

<script>
    import ChatMessages from './../components/helpers/ChatMessages.vue';
    import ChatForm from './../components/helpers/ChatForm.vue';

    export default {
        props: ['user','users'],
        components: {ChatMessages, ChatForm},
        mounted() {
            this.fetchMessages();
            Echo.private('chat')
                .listen('MessageSent', (e) => {
                    this.messages.push({
                        message: e.message.message,
                        user: e.user
                    });
                })
                .listenForWhisper('typing', (e) => {
                    this.typing_message.user = e.status.user
                    this.typing_message.status = e.status.status
                    this.typing_message.message = e.status.message
                });
            },
        data() {
            return {
                messages: [],
                typing_message: {
                    user: '',
                    status: 0,
                    message: ''
                },
            }
        },
        methods: {
            fetchMessages() {
                axios.get('/messages')
                    .then((response) => {
                        this.messages = response.data.data;
                    })
            },

            addMessage(message) {
                this.messages.push(message)
                axios.post('/messages', message)
                    .then((response) => {

                    })
            },

            typing(status) {
                Echo.private('chat')
                    .whisper('typing', {
                        status: status
                    });
            }
        }
    }
</script>

<style scoped>

</style>