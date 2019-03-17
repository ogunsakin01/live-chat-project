<template>
    <div>
        <div class="input-group">
            <input id="btn-input" type="text" name="message" @input="typing(1),validateMessage" @blur="typing(0)"
                   class="form-control input-sm" placeholder="Type your message here..." v-model="newMessage"
                   @keyup.enter="sendMessage"/>
            <span class="input-group-btn">
            <button class="btn btn-primary btn-group btn-block" id="btn-chat" @click="sendMessage">
                Send
            </button>
        </span>
        </div>
        <span class="text-danger font-italic font-weight-light" v-if="error.status">
           <small>{{ error.message }}</small>
    </span>
    </div>
</template>

<script>
    export default {
        props: ['user'],
        data() {
            return {
                newMessage: '',
                error: {
                    status: false,
                    message: ''
                }
            }
        },
        methods: {
            sendMessage() {
                if (this.validateMessage()) {
                    this.$emit('messagesent', {
                        user: this.user,
                        message: this.newMessage
                    })
                    this.typing(0)
                    this.newMessage = ''
                }
            },
            typing(status) {
                this.$emit('typing', {
                    user: this.user,
                    status: status,
                    message: this.newMessage
                })
            },
            validateMessage() {
                $('input[name="message"]').removeClass('border-danger')
                this.error.status = false
                this.error.message = '';
                if (this.newMessage === "") {
                    $('input[name="message"]').addClass('border-danger')
                    this.error.status = true
                    this.error.message = " Don't be shy, tell us your mind ... "
                    return false;
                }
                return true;
            }
        }
    }
</script>

<style scoped>

</style>