import api from "./api"

export const getUserVisits = async () => {
    try {
        const resp = await api.get('visits/all');
        return resp.data;

    } catch (error) {
        return error.response.data;
    }
}