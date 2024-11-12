import { useState } from "react";
import { MessageContainer } from "../Pages/Auth/Login/styles";
import { Alert } from "@mui/material";


const useMessage = () => {

    const [content, setContent] = useState(null);
    const [type, setType] = useState('warning');

    const setMessage = (msg, type = 'warning') => {
        setContent(msg);
        setType(type);
    };

    const Message = !content ? null : (
        <MessageContainer>
            <Alert severity={type}>{content}</Alert>
        </MessageContainer>
    );

    return { setMessage, Message, content, type };
}


export default useMessage;