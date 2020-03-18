<template>
    <div id="error">
        <div>
            <v-alert
                    dense
                    outlined
                    type="error"
            >
                I'm a dense alert with the <strong>outlined</strong> prop and a <strong>type</strong> of error
            </v-alert>

            <v-alert
                    outlined
                    type="success"
                    text
            >
                Заявка создана
            </v-alert>
        </div>
    </div>
</template>

<script>
    import {eventEmitter} from "../app";

    export default {
        name: "ErrorComponent",
        data() {
            return {
                isVisibleError: true,
                isVisibleSuccess: true
            }
        },
        created() {
            // eventEmitter.
        }

    }
</script>

<style scoped>

</style>