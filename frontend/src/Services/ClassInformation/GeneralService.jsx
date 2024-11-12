import response from "../../Utils/response";
import api from "../api"

export const getTodayClass = async () => {

    try {
        const resp = await api.get('/class_information/today');
        return response(true, resp.data.data);

    } catch (error) {
        return response(false, error, 
            error?.response?.data?.message || 'Erro ao buscar aula de hoje',
            error?.status || 500,
        )
    }
}

export const getByDay = async (day) => {

    try {
        const resp = await api.get(`/class_information/getByDay?day=${day}`, );
        return response(true, resp.data.data);

    } catch (error) {
        return response(false, error, 
            error?.response?.data?.message || 'Erro ao buscar aula',
            error?.status || 500,
        )
    }
}