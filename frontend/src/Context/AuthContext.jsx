import { createContext, useEffect, useState } from "react";
import { useNavigate } from "react-router-dom";
import { CheckAuthentication, getToken, removeToken, setToken } from "../Services/AuthMainService";
import LoadPage from "../Components/LoadPage";

export const AuthContext = createContext();

export const AuthProvider = ({ children }) => {

    const navigate = useNavigate();
    const [loadAuth, setLoadAuth] = useState(true);
    const [isLogged, setIsLogged] = useState(false);
    const [user, setUser] = useState(null);

    const removeUserFull = () => {
        setUser(null);
        setIsLogged(null);
        removeToken();
    }

    useEffect(() => {
        const handleAuth = async () => {
            const token = getToken();

            if (!token) {
                removeUserFull();
                setLoadAuth(false);
                return;
            }

            const { check, user } = await CheckAuthentication();

            if (!check) {
                removeUserFull();
                setLoadAuth(false);
                navigate('/entrar');
                return;
            }

            setUser(user);
            setIsLogged(true);
            setLoadAuth(false);
        }

        handleAuth();
    }, [navigate]);


    const login = (token, user) => {
        setToken(token);
        setUser(user);
        setIsLogged(true);
    }

    const logout = () => {
        removeToken();
        setUser(null);
        setIsLogged(false);
    }

    if (loadAuth) return (<LoadPage open={loadAuth} />);

    return (
        <AuthContext.Provider value={{ isLogged, user, setUser, setIsLogged, login, logout }}>
            {children}
        </AuthContext.Provider>
    )
}