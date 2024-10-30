import { createContext, useEffect, useState } from "react";
import { useNavigate } from "react-router-dom";
import { CheckAuthentication, loginStudent } from "../Services/AuthService";
import LoadPage from "../Components/LoadPage";

export const AuthContext = createContext();

export const AuthProvider = ({ children }) => {

    const [isLogged, setIsLogged] = useState(false);
    const [user, setUser] = useState(null);
    const [loadAuth, setLoadAuth] = useState(true);

    const navigate = useNavigate();

    useEffect(() => {

        const token = localStorage.getItem('token');

        if (token) {
            CheckAuthentication().then(resp => {
                if (resp.check) {
                    setUser(resp.user);
                    setIsLogged(true);
                    console.log('logado')
                } else {
                    console.log('incorreto token');
                    setUser(null);
                    setIsLogged(null);
                    localStorage.removeItem('token');
                    navigate('/entrar');
                }

                setLoadAuth(false);
            });

        } else {
            setLoadAuth(false);
            console.log('nao tem token');
            setUser(null);
            setIsLogged(null);
        }
    }, [navigate]);

    const login = async (email, password) => {
        const resp = await loginStudent(email, password);

        if(resp.data?.token){
            localStorage.setItem('token', resp.data.token)
            setIsLogged(true);
            setUser(resp.data.user);
        }
       
        return resp;
    }

    const logout = async () => {
        localStorage.removeItem('token');
        setUser(null);
        setIsLogged(false);
        navigate('/entrar');
    }

    if (loadAuth) return (<LoadPage open={loadAuth} />);

    return (
        <AuthContext.Provider value={{ isLogged, user, login, logout }}>
            {children}
        </AuthContext.Provider>
    )
}

