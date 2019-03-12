<template>
    <li class="left clearfix">
        <div class="chat-body clearfix">
            <div class="header">
                <strong class="primary-font pull-left">
                    {{ user.name }}
                </strong>
            </div>
            <i> is typing >>> <small><b>{{ message }}</b></small> ...</i>
        </div>
    </li>
</template>

<script>
    export default {
     props: ['user','message']
    }
</script>

<style scoped>

</style>