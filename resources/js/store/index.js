import { createStore } from 'vuex'
import createPersistedState from 'vuex-persistedstate'

export default createStore({
    state: {
        user: null,
        step: 1,
    },
    getters: {
        login: state => !!state.user,
    },
    mutations: {
        set_user_mutation(state, user) {
            state.user = user;
        },
        log_out_mutation(state) {
            state.user = null;
        },
        next_mutation(state) {
            state.step = state.step + 1;
        },
        prev_mutation(state) {
            state.step = state.step - 1;
        },
    },
    actions: {
        async set_user_action({ commit }, user) {
            commit('set_user_mutation', user);
        },
        async log_out_action({ commit }) {
            commit('log_out_mutation');
        },
        async next_action({ commit }) {
            commit('next_mutation');
        },
        async prev_action({ commit }) {
            commit('prev_mutation');
        },
    },
    modules: {
    },
    plugins: [createPersistedState()]
})
