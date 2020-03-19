<template>
    <div id="list-proposal">
        <h1>Список заявок</h1>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">№</th>
                <th scope="col">Subject</th>
                <th scope="col">Message</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Url file</th>
                <th scope="col">Data create</th>
                <th scope="col">Mark</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(proposal, index) in proposals" :data-id="`${proposal.id}`" :data-index=index>
                <th>{{index+1}}</th>
                <td>{{proposal.subject}}</td>
                <td>{{proposal.message}}</td>
                <td>{{proposal.name}}</td>
                <td>{{proposal.email}}</td>
                <!--<td><a :href="`${proposal.url_file}`" @click.prevent="downloadFile">Download document</a></td>-->
                <td><a :href="`${proposal.url_file}`" target="_blank">Download document</a></td>
                <td>{{proposal.data_create_proposal}}</td>
                <!--<td>{{proposal.mark}}</td>-->
                <td>

                    <input type="checkbox"
                           id="mark"
                          :checked=proposal.mark
                           @click="checkMark">
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        name: "ListProposal",
        data () {
            return {
                proposals:[]
            }
        },
        methods: {
            checkMark: function (event) {
                if(!event.target.checked){
                    return;
                }

                var index = event.path[2].getAttribute('data-index');

                axios.post('/proposal/update', this.proposals[index])
                    .then(function (response) {
                        that.proposals = response.data.slice();
                    }).catch(function (error) {
                    console.log(error);
                });

            }
        },
        beforeCreate() {
            let that = this;
            axios.post('/proposal/list')
                .then(function (response) {
                    that.proposals = response.data.slice();
                }).catch(function (error) {
                    console.log(error);
            });
        },


    }
</script>

<style scoped>

</style>