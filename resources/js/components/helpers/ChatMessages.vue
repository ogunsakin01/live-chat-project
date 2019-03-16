<template>
        <div class="chat row" v-chat-scroll>
            <div v-for="message,key in messages" class="col-md-12">
                <div :class="myMessage(message.user.id)+' media chat-message position-sticky d-inline-block overflow-auto p-2 m-2 shadow-none rounded border message_' +(key)"
                     @mouseover="shadow(1,key)" @mouseleave="shadow(0,key)" v-if="!message.status" style="width: auto;">
                    <p class="media-body mb-0 small text-gray-dark">
                <span class="d-block">
                   <b class="font-weight-bold" v-if="hideMyName(message.user.id)"><fa :class="'fa fa-circle ' + online(message.user.id)"></fa> {{ message.user.name }}</b>
                    <small class="font-italic">{{ moment(message.created_at).format('MMM Do YYYY, h:mm a') }}</small>
                </span>
                        <span class="font-weight-normal">{{ message.message }} </span>
                    </p>
                </div>
            </div>
        </div>

</template>

<script>
    export default {
        props: ['messages', 'user', 'users'],
        methods: {
            shadow(status, key) {
                $('.message_' + key).removeClass("shadow")
                $('.message_' + key).addClass("shadow-none")
                if (status == 1)
                    $('.message_' + key).addClass("shadow")
                $('.message_' + key).removeClass("shadow-none")
            },
            myMessage(id) {
                if (id === this.user.id) {
                    return "my-message text-light"
                }
                return "bg-light text-muted"
            },
            hideMyName(id){
                return id !== this.user.id
            },
            online(id){
                let status = "text-danger";
                for(let i = 0; i < this.users.length; i++){
                    if(this.users[i].id === id){
                        status = "text-success";
                    }
                }
                return status
            }
        }


    }
</script>

<style scoped>


</style>