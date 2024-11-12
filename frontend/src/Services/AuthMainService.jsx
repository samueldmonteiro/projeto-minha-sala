import api from "./api"

export const CheckAuthentication = async () => {
    try {
        const resp = await api.get('/auth/check');
        return { check: true, user: resp.data.data.user }

    } catch (error) {
        return { check: false, user: null }
    }
}

export const getToken = () => {
    return localStorage.getItem('token');
}

export const setToken = (token) => {
    localStorage.setItem('token', token);
}

export const removeToken = () => {
    localStorage.removeItem('token');
}
