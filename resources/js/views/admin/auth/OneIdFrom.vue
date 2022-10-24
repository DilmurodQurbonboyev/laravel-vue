<template>
    One Id
</template>
<script>
import i18n from "../../../i18n";

export default {
    name: 'OneIdFrom',
    components: {},
    data() {
        return {
            url: `https://sso.egov.uz/sso/oauth/Authorization.do?`,
            protocol: location.protocol,
            host: location.host,
            lang: i18n.global.locale,
        }
    },
    methods: {
        to_link() {
            window.location.href = `${this.url}response_type=one_code&client_id=test.epmty.uz&redirect_uri=${this.protocol}//${this.host}/${this.lang}/oneIdTo&scope=legal&state=12`;
        }
    },
    mounted() {
        this.to_link()
    },
    computed: {},
}
</script>
