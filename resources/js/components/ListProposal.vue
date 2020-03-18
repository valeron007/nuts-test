<template>
    <div id="list-proposal">
        <h1>List</h1>
    </div>
</template>

<script>
    export default {
        name: "ListProposal",
        data () {
            return {
                proposal:[]
            }
        },
        methods: {

        },
        beforeCreate() {
            axios.post('/proposal/list')
                .then(function (response) {
                    console.log(response);
                }).catch(function (error) {
                    console.log(error);
            });
        }
    }
</script>

<style scoped>

</style>