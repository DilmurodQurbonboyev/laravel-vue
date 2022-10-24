<template>
    <div class="hold-transition login-page">
        <div class="login-box">
            <div class="d-flex pb-2">
                <img width="100%" src="http://uzgasoil.realtest.uz/img/uzinfocom-admin.png" alt="">
            </div>
            <div class="card">
                <div class="card-body login-card-body">
                    <div class="social-auth-links text-center mb-3">
                        <a class="btn btn-block btn-primary btn-social btn-dropbox" data-toggle="collapse"
                           data-target="#login" aria-expanded="true">
                            <i class="fa fa-lock"></i>
                            Кириш </a>
                        <br>
                        <div id="login" class="collapse in" aria-expanded="true" style="">
                            <div class="row">
                                <p>
                                    <br>
                                    Aгар сиз шу пайтга қадар id.egov.uz ишлаётганига ишончингиз комил бўлса, илтимос,
                                    қуйидаги ҳавола билан авторизациядан ўтинг <br><br>
                                    <router-link :to="{ name: 'OneIdFrom' }" class="register_square">
                                        <img src="http://uzgasoil.realtest.uz/img/oneId.png" alt="oneId">
                                    </router-link>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'LoginOneId',
    components: {},
    data() {
        return {}
    },
    methods: {},
    mounted() {},
    computed: {},
}
</script>
