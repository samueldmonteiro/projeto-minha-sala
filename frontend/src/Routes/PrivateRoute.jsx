

import React from 'react'
import { Navigate } from 'react-router-dom';
import useAuth from '../Hooks/useAuth';

const PrivateRoute = ({ children }) => {

    const { isLogged } = useAuth();

    if (!isLogged) {
        return <Navigate to="/entrar" />
    }

    return children;
}

export default PrivateRoute;