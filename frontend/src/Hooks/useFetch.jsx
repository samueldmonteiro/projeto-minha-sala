import { useState } from "react";

const useFetch = () => {

    const [data, setData] = useState(null);
    const [loading, setLoading] = useState(false);
    const [error, setError] = useState(false);

    const request = async (url, method = 'GET', body = null, headers = {}) => {

        let response;
        let json;

        try {
            setLoading(true);

            response = await fetch(url, {
                method: method,
                body: body,
                headers: { ...{ 'Content-Type': 'Application/json', 'Accept': 'Application/json' }, ...headers }
            });

            if (!response.ok) {
                throw new Error('Erro na requisição');
            }

            setData(await response.json());
            setError(null);

        } catch (error) {
            setError("Erro na Requisição");

        } finally {
            setLoading(false);
            return { data: json, response }
        }
    }

    return { request, data, loading, error };
}

export default useFetch