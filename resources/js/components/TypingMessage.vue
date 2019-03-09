<template>
    <li class="left clearfix">
        <div class="chat-body clearfix">
            <div class="header">
                <strong class="primary-font pull-left">
                    {{ user.name }}
                </strong>
            </div>
            <i> Typing message ... </i>
        </div>
    </li>
</template>

<script>
    export default {
     props: ['user']
    }
</script>

<style scoped>

</style>