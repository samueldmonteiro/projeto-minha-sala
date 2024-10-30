import api from "./api"


export const CheckAuthentication = async () => {
    try {
        const resp = await api.get('/auth/check');
        return { check: true, user: resp.data.data.user }

    } catch (error) {
        return { check: false, user: null }
    }
}


export const loginStudent = async (email, password) => {

    try {
        const resp = await api.post('/auth/login/student', {email, password});

        return resp.data;

    } catch (error) {
        return error.response.data;
    }
}