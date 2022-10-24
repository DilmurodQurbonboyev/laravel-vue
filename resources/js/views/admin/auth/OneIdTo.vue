<template>
    <p>One Id To</p>
    <p>{{ user }}</p>
</template>

<script>
import axios from 'axios';
import {mapActions} from 'vuex';
import router from '../../../routes';

export default {
    name: "idto",
    components: {},
    data() {
        return {
            url: `https://sso.egov.uz/sso/oauth/Authorization.do?`,
            access_data: {
                grant_type: "one_authorization_code",
                client_id: "test.epmty.uz",
                client_secret: "As9d1Gu6fa/0q5yw+Zwfgw==",
                redirect_uri: '',
                code: this.$route.query.code,
            },
            user_data: {
                grant_type: 'one_access_token_identify',
                client_id: 'test.epmty.uz',
                client_secret: 'As9d1Gu6fa/0q5yw+Zwfgw==',
                access_token: '',
                scope: 'legal'
            },
            user: null,
        };
    },
    methods: {
        ...mapActions(['set_user_action']),
        set_user() {
            this.set_user_action(this.user);
            router.push({name: 'profile'});
        },
        user_get() {
            const data = new FormData();
            for (const key in this.user_data) {
                data.append(key, this.user_data[key]);
            }
            axios
                .post(this.url, data)
                .then((response) => {
                    this.user = response.data;
                    this.set_user();
                })
                .catch((error) => {
                    console.log(error);
                })
        },
        access_get() {
            const data = new FormData();
            for (const key in this.access_data) {
                data.append(key, this.access_data[key]);
            }
            axios
                .post(this.url, data)
                .then((response) => {
                    this.user_data.access_token = response.data.access_token;
                    this.user_get();
                })
                .catch((error) => {
                    console.log(error);
                });
        },
    },
    mounted() {
        this.access_get();
    },
};
</script>
