<template>
    <div class="input-group">
        <input id="btn-input" type="text" name="message" @input="typing(1)" @blur="typing(0)" class="form-control input-sm" placeholder="Type your message here..." v-model="newMessage" @keyup.enter="sendMessage" />
        <span class="input-group-btn">
            <button class="btn btn-primary btn-sm" id="btn-chat" @click="sendMessage">
                Send
            </button>
        </span>
    </div>
</template>

<script>
    export default {
        props: ['user'],
        data(){
            return {
                newMessage: ''
            }
        },
        methods : {
            sendMessage(){
                if(this.newMessage == ''){
                    this.newMessage = "empty message"
                }
                this.$emit('messagesent', {
                    user: this.user,
                    message: this.newMessage
                })

                this.newMessage = ''
            },
            typing(status){
             this.$emit('typing',{
                 status: status
             })
            },
        }
    }
</script>

<style scoped>

</style>