import api from "./api"

export const getUserVisits = async () => {
    try {
        const resp = await api.get('logs/visits');
        return resp.data;

    } catch (error) {
        return error.response.data;
    }
}