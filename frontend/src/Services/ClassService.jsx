import api from "./api"

export const getTodayClass = async () => {

    try {
        const resp = await api.get('/class_informations/today');
        return resp.data;

    } catch (error) {
        return error.response.data;
    }
}

export const getByDay = async (day) => {

    try {
        const resp = await api.post('/class_informations/getByDay', { day });
        return resp.data;

    } catch (error) {
        return error.response.data;

    }
}