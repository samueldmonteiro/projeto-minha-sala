import { useContext } from "react";
import { AuthContext } from "../Context/AuthContext";

const useAuth = () => useContext(AuthContext);

export default useAuth;