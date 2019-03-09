<template>
    <ul class="chat" v-chat-scroll>
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
        <typing-message :user="typing.user" v-if="isTyping"></typing-message>
    </ul>
</template>

<script>
    import TypingMessage from "./TypingMessage";
    export default {
        components: {TypingMessage},
        props : ['messages', 'typing'],
        computed: {
            isTyping(){
                return this.typing.status.status === 1;
            }
        }
    }
</script>

<style scoped>

</style>