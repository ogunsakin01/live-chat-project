<template>
    <div id="chat_messages">
        <ul class="chat" >
            <li class="left clearfix" v-for="message in messages">
                <div class="chat-body clearfix">
                    <div class="header">
                        <strong class="primary-font pull-left">
                            {{ message.user.name }}
                        </strong>
                        <small class="pull-right">{{ moment(message.created_at).format('MMM Do YYYY, h:mm a') }}</small>
                    </div>
                    <p>
                        {{ message.message }}
                        <i class="fa fa-delete"></i>
                    </p>
                </div>
            </li>
            <typing-message :user="typing.user" :message="typing.message" v-if="isTyping"></typing-message>
        </ul>
    </div>

</template>

<script>
    import TypingMessage from "./TypingMessage";
    export default {
        components: {TypingMessage},
        props : ['messages', 'typing'],
        computed: {
            isTyping() {
                return this.typing.status === 1;
            }
        },
        mounted(){
            this.scrollToEnd()
        },
        methods : {
            scrollToEnd(){
                let container = document.querySelector('#chat_messages');
                let scrollHeight = container.scrollHeight;
                container.scrollTop = scrollHeight;
            }
        },
        updated(){
            this.scrollToEnd()
        }

    }
</script>

<style scoped>

</style>