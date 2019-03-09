<template>
    <div class="input-group">
        <input id="btn-input" type="text" name="message" class="form-control input-sm" placeholder="Type ypur message here..." v-model="newMessage" @keyup.enter="sendMessage" />
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
            }
        }
    }
</script>

<style scoped>

</style>