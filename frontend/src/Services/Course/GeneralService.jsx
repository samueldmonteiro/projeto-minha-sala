import response from "../../Utils/response";
import api from "../api"

export const getAllCourses = async () => {
    try {
        const resp = await api.get('/course/all');
        return response(true, resp.data.data);

    } catch (error) {
        return response(false, null,
            error?.response?.data?.message || error.message
        )
    }
}