<template>
    <div id="proposal">
        <v-app>
            <h1>Создание заявки</h1>
            <v-form
                    ref="form"
                    v-model="valid"
                    lazy-validation
            >
                <v-text-field
                        v-model="subject"
                        label="Тема сообщения"
                        :rules="subjectRules"
                        required
                ></v-text-field>

                <v-textarea
                        v-model="message"
                        label="Сообщение"
                ></v-textarea>

                <v-text-field
                        v-model="name"
                        label="Имя клиента"
                        :rules="nameRules"
                        required
                ></v-text-field>


                <v-text-field
                        v-model="email"
                        :rules="emailRules"
                        label="Email клиента"
                        required
                ></v-text-field>
                <div>
                    <v-file-input v-model="file" label="Прикрепите файл">

                    </v-file-input>
                </div>
                <v-btn
                        color="success"
                        class="mr-4"
                        @click="create"
                        :disabled="!valid"
                >
                    Создать заявку
                </v-btn>

            </v-form>
        </v-app>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                valid: false,
                name: '',
                file: '',
                email: '',
                message: '',
                subject: '',
                emailRules: [
                    v => !!v || 'E-mail is required',
                    v => /.+@.+\..+/.test(v) || 'E-mail must be valid',
                ],
                nameRules: [
                    v => !!v || 'Name is required',
                    v => (v && v.length <= 10) || 'Name must be less than 10 characters',
                ],
                subjectRules: [
                    v => !!v || 'Subject is required',
                    v => (v && v.length >= 5) || 'Subject must be less than 5 characters',
                ],
                lazy: false,
            }
        },
        methods: {
            create: function () {
                if (this.$refs.form.validate()){
                    var proposal = {
                        name: this.name,
                        email: this.email,
                        subject: this.subject,
                        message: this.message
                    };
                    let formData = new FormData();
                    formData.append('data', JSON.stringify(proposal));
                    formData.append('file', this.file);

                    axios.post('/proposal/create', formData,
                    {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    }).then(function (response) {
                        console.log('success');
                        console.log(response);
                    }).catch(function (error) {
                        console.log('error');
                        console.log(error);
                    })
                }
            },
            reset () {
                this.$refs.form.reset()
            },

        }
    }
</script>

<style scoped>

</style>