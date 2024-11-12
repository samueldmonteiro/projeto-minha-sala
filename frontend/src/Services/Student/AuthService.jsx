import response from "../../Utils/response";
import api from "../api"

export const loginRequest = async (RA) => {
    try {
        const resp = await api.post('/auth/login/student', { RA });
        return response(true, resp.data.data);

    } catch (error) {
        console.log(error);
        return response(
            false,
            error,
            error?.response?.data?.message || 'Houve um erro inesperado na aplicação, tente novamente',
            error?.status || 500,
            error?.response?.data?.type || 'error'
        )
    }
}


export const registerRequest = async (name, RA, course, semester) => {
    try {
        const resp = await api.post('/student/register', { name, RA, course, semester });
        return response(true, resp.data.data, resp.data.message);

    } catch (error) {
        console.log(error);
        return response(
            false,
            error,
            error?.response?.data?.message || 'Houve um erro inesperado na aplicação, tente novamente',
            error?.status || 500,
            error?.response?.data?.type || 'error'
        )
    }
}

